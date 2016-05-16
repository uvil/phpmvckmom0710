<?php

namespace Phpmvc\Question;

class QuestionController implements \Anax\DI\IInjectionAware {
  
  use \Anax\DI\TInjectable;
  
  public function initialize(){
       
  }
  
  public function indexAction(){
    $this->viewAction();
  }
  
  public function viewAction(){
    $this->theme->setTitle('Visa fråga');
    $this->views->add('question/viewone');
  }
  
  public function newAction(){
    
    //get post data from form
    $heading = $this->request->getPost('heading');
    $text = $this->request->getPost('text');
    $tags = $this->request->getPost('tags');
    
    //if sent - save to DB
    if($heading!=null && $text!=null && $tags!=null)
    {
      $tags = explode(" ", trim($tags));
      foreach ($tags as $tag) {
        $this->Tags->newTag($tag);
      }
      
      
      $question = ['heading' => $heading,'text' => $text];
      /*if($this->Questions->save($question)){
        echo "Ny fråga sparad";
      }*/
      
    }
    else
    {
      $this->theme->setTitle('Ny fråga');
      $this->views->add('question/newquestion');
    }
    
    
    
  }
  
  public function allAction(){
    $this->views->add('question/viewall');
  }
  
  
  
 
  

  
}
