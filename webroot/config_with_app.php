<?php
/**
 * Config file for pagecontrollers, creating an instance of $app.
 *
 */

// Get environment & autoloader.
require __DIR__.'/config.php'; 

// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

$di->set('Questions', function() use ($di) {
    $c = new \Phpmvc\Question\Questions();
    $c->setDI($di);
    return $c;
});

$di->set('Tags', function() use ($di) {
    $c = new \Phpmvc\Tag\Tags();
    $c->setDI($di);
    return $c;
});

$di->set('Comments', function() use ($di) {
    $c = new \Phpmvc\Comment\Comments();
    $c->setDI($di);
    return $c;
});

$di->set('CommentsController', function() use ($di) {
    $c = new \Phpmvc\Comment\CommentController();
    $c->setDI($di);
    return $c;
});

$di->set('TagsController', function() use ($di) {
    $c = new \Phpmvc\Tag\TagsController();
    $c->setDI($di);
    return $c;
});


$di->set('QuestionController', function() use ($di) {
    $c = new \Phpmvc\Question\QuestionController();
    $c->setDI($di);
    return $c;
});

$di->set('user', function() use ($di) {
$usr = new \Anax\UVC\CUserBase('user');
$usr->setDI($di);
$usr->getUserInfo();
return $usr;
});

$di->set('User', function() use ($di) {
$u = new Anax\Users\User();
$u->setDI($di);
return $u;
});

$di->setShared('db', function() {
    $db = new \Anax\UVC\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php');
    $db->connect();
    return $db;
});


$di->setShared('TextFilter', function() {
    
    $t = new \Anax\UVC\CTextFilter();
    return $t;
});




//$app = new \Anax\Kernel\CAnax($di);

//bytte till CApplicationBasic enligt följande tips 
//http://dbwebb.se/kunskap/anvand-cform-tillsammans-med-anax-mvc#vidare

$app = new \Anax\MVC\CApplicationBasic($di);
