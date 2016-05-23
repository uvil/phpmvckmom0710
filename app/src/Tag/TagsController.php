<?php

namespace Phpmvc\Tag;

class TagsController implements \Anax\DI\IInjectionAware {

  use \Anax\DI\TInjectable;
  
  public function initialize(){
       
  }
 
  public function indexAction()
  {
    $tags = $this->Tags->getAll();
    $url = $this->url->create('question/tag');
    $this->theme->setTitle('Alla taggar');
    $this->theme->addStylesheet('css/viewTags.css');
    $this->views->add('tags/viewTags',['tags'=>$tags,'url'=>$url]);
   
  }
  
}

