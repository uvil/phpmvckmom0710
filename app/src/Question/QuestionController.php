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
    $this->theme->setTitle('Ny fråga');
    $this->views->add('question/newquestion');
  }
  
  public function allAction(){
    $this->views->add('question/viewall');
  }
  
  
  
 
  

  
}
