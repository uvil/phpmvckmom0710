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

// route used when creating a new user ---------------------------------------------------------
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
          "password"  => password_hash($pass, PASSWORD_DEFAULT),
          "created"   => $now,
          "active"    => $now,
          "webbpage"  => "http://dbwebb.se/",
          "title"     => "Webbprogrammerare",
          "subtitle"  => "Student vid Blekinge tekniska högskola (BTH)",
          "facebook"  => "https://www.facebook.com/",
          "twitter"   => "https://twitter.com/",
          "hobbies"   => "Webbutveckling, Heminredning, Fysisk träning, Resor, Filmer",
          "skills"    => "Tala 65%\nLäsa 90%\nSkriva 85%\nSova 70%"
          
      ];
      
      $res = $usr->saveuser($data);
 
      $app->theme->addStylesheet('css/applysubmit.css');
      
      if($res)
        $app->views->add('ssws/applysubmit',['acro'=>$acro,'pass'=>$pass]);
  }
  
  
  
  
});

//view all users  ---------------------------------------------------------------------
$app->router->add('view_users', function() use ($app, $usr) {
  $users =  $usr->getAllUsers();
  $app->theme->setVariable('title', "Alla användare");
  $app->theme->addStylesheet('css/users.css');
  $app->views->add('ssws/viewallusers',['users'=>$users]);
});

//view user profile ---------------------------------------------------------------------
$app->router->add('profile', function() use ($app, $usr) {
  $userinfo = $usr->getAllUserInfo();
  $app->theme->setVariable('title', "Användarprofil");
  $app->theme->addStylesheet('css/profile.css');
  $app->views->add('ssws/viewprofile',['userinfo'=>$userinfo]);
});

//edit user profile ---------------------------------------------------------------------
$app->router->add('editprofile', function() use ($app, $usr) {
  $userinfo = $usr->getAllUserInfo();
  $app->theme->setVariable('title', "Användarprofil");
  $app->theme->addStylesheet('css/profile.css');
  $app->views->add('ssws/editprofile',['userinfo'=>$userinfo]);
});


//save user profile ---------------------------------------------------------------------
$app->router->add('saveprofile', function() use ($app, $usr) {

  $now = gmdate("Y-m-d H:i:s");
      
      $data = [
          'id'        => $app->request->getPost('id'),
          'acronym'   => $app->request->getPost('akronym'),
          'email'     => $app->request->getPost('email'),
          'name'      => $app->request->getPost('name'),
          "updated"    => $now,
          "webbpage"  => $app->request->getPost('webbpage'),
          "title"     => $app->request->getPost('title'),
          "subtitle"  => $app->request->getPost('subtitle'),
          "facebook"  => $app->request->getPost('facebook'),
          "twitter"   => $app->request->getPost('twitter'),
          "hobbies"   => $app->request->getPost('hobbies'),
          "skills"    => $app->request->getPost('skills'),
          
      ];
           
      $res = $usr->updateuser($data);
      $usr->updateSession($data[acronym]);
      
      $app->redirectTo("profile");
 
});

//edit user password ---------------------------------------------------------------------
$app->router->add('editpassword', function() use ($app, $usr) {
  $msg = $app->request->getGet('m');
  $userinfo = $usr->getAllUserInfo();
  $app->theme->setVariable('title', "Användarprofil");
  $app->theme->addStylesheet('css/profile.css');
  $app->views->add('ssws/editpassword',['userinfo'=>$userinfo,'msg'=>$msg]);
});

//save new user password --------------------------------------------------------------
$app->router->add('savenewpassword', function() use ($app, $usr) {
 
  $id = $app->request->getPost('id');
  $oldpass = $app->request->getPost('oldpass');
  $newpass = $app->request->getPost('newpass');
  $newpass2 = $app->request->getPost('newpass2');
   
  if($newpass != $newpass2)
  {
     $app->redirectTo("editpassword?m=Nytt lösenord matchar inte upprepningen. <br/>Var vänlig och försök igen!");
  }
  else if(!$usr->verifyPassword($oldpass,$id))
  {
    $app->redirectTo("editpassword?m=Föregående lösenord matchar inte. <br/>Du tillåts därför inte att ange ett nytt.<br/>Försök igen?");
  }
  else
  {
    $data = ['id' => $id,'password' => password_hash($newpass, PASSWORD_DEFAULT)]; 
    $res = $usr->updateuser($data);  
    $app->redirectTo("editpassword?m=Nytt lösenord sparat!");
  }
 
});

// view information about me and this website --------------------------------
$app->router->add('about',function() use($app){
  
  // Prepare the page content
  $app->theme->addStylesheet('css/aboutme.css');
  $app->theme->setVariable('title', "Om webbplatsen");

  $site = $app->fileContent->get('aboutsite.md');
  $site = $app->textFilter->doFilter($site,'markdown');
  $content = $app->fileContent->get('aboutme.md');
  $content = $app->textFilter->doFilter($content,'markdown');
  $byline  = $app->fileContent->get('byline.md');
  $byline = $app->textFilter->doFilter($byline,'markdown');
 
  $app->views->add('ssws/about', ['img'=>'uv.png','site'=>$site, 'content'=>$content,'byline'=>$byline]);

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

