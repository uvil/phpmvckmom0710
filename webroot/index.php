<?php

require __DIR__.'/config_with_app.php'; 

$app->url->setBaseUrl($app->request->getBaseUrl());
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

$app->navbar->configure(ANAX_APP_PATH . 'config/navbar.php');  
$app->theme->configure(ANAX_APP_PATH . 'config/theme.php');


$usr = new \Anax\UVC\CUserBase('user');
$usr->setDI($di);
$app->theme->setVariable('userinfo', $usr->getUserInfo());

//landing page---------------------------------------------------------------------------
$app->router->add('', function() use ($app,$di) {
  
  //set title
  $app->theme->setVariable('title', "Start");
  
  //is user authorised?
  $usr = new \Anax\UVC\CUserBase('user');
  $usr->setDI($di);
  $auth = $usr->isAuthorised();
  
  if($auth){
    $app->views->add('ssws/firstpage');
  }
  else{
  $app->theme->addStylesheet('css/start.css');
  $app->theme->setVariable('hidenav',true);
 
  $login =$app->url->create("login");
  $apply =$app->url->create("apply");

  $app->views->add('ssws/start',['loginlink'=>$login,'applylink'=>$apply]);
  }
});

//login page-----------------------------------------------------------------------------
$app->router->add('login',function() use($app){
  $app->theme->setVariable('title', "Logga in");
  $app->theme->setVariable('hidenav',true);
  
  $return = $app->url->create();
  $apply =$app->url->create("apply");
  
  $message="";
  $m = $app->request->getGet('m');
  if($m=="err")
    $message="Nope. Inte inloggad. Felaktigt användarnamn eller lösenord.";
  
  
  $app->views->add('ssws/login',['returnlink'=>$return,'applylink'=>$apply,'message'=>$message]);
});

//apply for new account page-------------------------------------------------------------
$app->router->add('apply',function() use($app){
  $app->theme->setVariable('title', "Nytt konto");
  $app->theme->setVariable('hidenav',true);
  
   $message="";
  $m = $app->request->getGet('m');
  if($m=="taken")
  $message = "Akronymet upptaget, vänligen välj ett annat.";
  
  $return =$app->url->create();
  $app->views->add('ssws/apply',['returnlink'=>$return,'message'=>$message]);
});

// route used when login submit----------------------------------------------------------
$app->router->add('applysubmit', function() use ($app, $di) {
  $app->theme->setVariable('title', "Registration process");
  $app->theme->setVariable('hidenav',true);
  
 
  $acro = $app->request->getPost('usracronym');
  $pass = $app->request->getPost('usrpass');
  
  
  $usr = new \Anax\UVC\CUserBase('user');
  $usr->setDI($di);
  
  if($usr->acronymExists($acro)) //if acronym i used
  {
    $app->redirectTo("apply?m=taken");
  }
  else
  {
      $now = gmdate("Y-m-d H:i:s");
      
      $data = [
          'acronym'   => $acro,
          'email'     => $app->request->getPost('usrmail'),
          'name'      => $app->request->getPost('usrname'),
          "password"  =>  password_hash($pass, PASSWORD_DEFAULT),
          "created"   => $now,
          "active"    => $now
      ];
      
      $res = $usr->saveuser($data);
 
      $app->theme->addStylesheet('css/applysubmit.css');
      
      if($res)
        $app->views->add('ssws/applysubmit',['acro'=>$acro,'pass'=>$pass]);
  }
  
  
  
  
});

$app->router->add('user_info', function() use ($app, $di) {
  $app->theme->setVariable('title', "User Info");
  
  $usr = new \Anax\UVC\CUserBase('user');
  $usr->setDI($di);
  
  ob_start();
  
  var_dump($usr->getUserInfo());
  $html = "<h4>getUserInfo:</h4><p><pre>" . ob_get_clean(). "</pre>";
  $html .= "<hr><p>&nbsp;</p>";
  
  var_dump($usr->isAuthorised());
  $html .= "<h4>isAuthorised:</h4><p><pre>" . ob_get_clean() . "</pre>";
  
  $html .= "<hr><p>&nbsp;</p>"; 
  
  $app->theme->setVariable('main',$html);
});

// route used when login submit----------------------------------------------------------
$app->router->add('loginsubmit', function() use ($app, $di) {
  $app->theme->setVariable('title', "Login process");
  $app->theme->setVariable('hidenav',true);
  
  $usr = new \Anax\UVC\CUserBase('user');
  $usr->setDI($di);
  
  $pass = $app->request->getPost('password');
  $name = $app->request->getPost('loginname');

  //check login and give feedback
  $res = null;
  if($usr->login($name,$pass)){
    $app->redirectTo("");
  }
  else{
    $app->redirectTo("login?m=err");
  } 
});

//use this rotue when logging out--------------------------------------------------------
$app->router->add('logout', function() use ($app, $di) {
  $app->theme->setVariable('title', "Logout");
  
  $usr = new \Anax\UVC\CUserBase('user');
  $usr->setDI($di);
  
  $usr->logout();
  
  $app->redirectTo("");
});



  
$app->router->add('redovisning', function() use ($app) {
  
  // Prepare the page content
  $app->theme->setVariable('title', "Redovisningar");

  $content = $app->fileContent->get('report.md');
  $content = $app->textFilter->doFilter($content,'markdown');
  
  $byline  = $app->fileContent->get('byline.md');
  $byline = $app->textFilter->doFilter($byline,'markdown');
  
  $app->views->add('me/report', ['content'=>$content,'byline'=>$byline]);
           
});
 
$app->router->add('source', function() use ($app) 
{
  $app->theme->addStylesheet('css/source.css');
  $app->theme->setVariable('title', "Källkod");
  
  $source = new \Mos\Source\CSource(['secure_dir' => '..', 'base_dir' => '..', 
      'add_ignore' => ['.htaccess'] ]);
    
  $h1 = "<h1>Visa källkod</h1>";
  $content = $source->View(); 
  
  $app->views->add('me/source', ['h1'=>$h1,'content'=>$content]);
});




 
$app->router->handle();
$app->theme->render();

