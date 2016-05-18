<?php

namespace Phpmvc\Question;

class QuestionController implements \Anax\DI\IInjectionAware {
  
  use \Anax\DI\TInjectable;
  
  public function initialize(){
       
  }
  
  public function indexAction(){
    $this->viewAction();
  }
  
  public function viewAction($params=null){
    
    $res = $this->Questions->getBySlug($params);
    
    $this->theme->setTitle('Visa fråga');
    $this->theme->addStylesheet("css/viewone.css");
    
    if($params==null || $res==null)
     $this->views->add('question/noone');
    else
      $this->views->add('question/viewone',['question'=>$res]);
  }
  
  public function newAction(){
    
    //get post data from form
    $heading = $this->request->getPost('heading');
    $text = $this->request->getPost('text');
    $tags = $this->request->getPost('tags');
    $u_id = $this->request->getPost('userid');
    
    //if sent - save to DB
    if($heading!=null && $text!=null && $tags!=null && $u_id!=null)
    {
      $tags = explode(" ", trim($tags));
      foreach ($tags as $tag) {
        $this->Tags->newTag($tag);
      }
      
      
      $question = ['heading' => $heading,'text' => $text,'created'=>gmdate("Y-m-d H:i:s")];
      $this->Questions->saveQuestion($question,$u_id);
      


       //redirect to questions 
      
      
      
    }
    else
    {
      $usr = new \Anax\UVC\CUserBase('user');
      $usr->setDI($this->di);
      $userid = $usr->getAllUserInfo()->id;
  
      $this->theme->setTitle('Ny fråga');
      $this->views->add('question/newquestion',['userid'=>$userid]);
    }
    
    
    
  }
  
  public function allAction(){
    
    $questions = $this->Questions->getAll();
    
    $this->theme->addStylesheet("css/questions.css");
    $this->theme->setTitle('Alla frågor');
    $this->views->add('question/viewall',['questions'=>$questions]);
  }
  
  
  
 
  

  
}
