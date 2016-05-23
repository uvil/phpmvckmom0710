<?php

namespace Phpmvc\Question;

class QuestionController implements \Anax\DI\IInjectionAware {
  
  use \Anax\DI\TInjectable;
  
  public function initialize(){
       
  }
  
  public function indexAction(){
    $this->viewAction();
  }
  
 
  
  public function slugAction($params=null){
    $res = $this->Questions->getBySlug($params);
    $this->viewAction($res);
  }
  
  private function viewAction($res=null){
    
    
    //save user reply?
    if($this->request->getPost("replysubmit")=="Skicka svar"){
      
      $data = [ 'text'=>$this->request->getPost("reply"),
                'userid'=>$this->request->getPost("userid"),
                'questionid'=>$this->request->getPost("questionid")];
      
      $this->Questions->saveReply($data);
      
    }
    
    $userid = $this->user->getUserInfo()->id;
    
    $this->theme->setTitle('Visa fråga');
    $this->theme->addStylesheet("css/viewone.css");
    
    
    
    if($res==null)
     $this->views->add('question/noone');
    else
    {
      //get answers
      $replies = $this->Questions->getReplies($res->id);
      $this->theme->addJavaScript('js/viewone.js');
      $this->views->add('question/viewone',['question'=>$res,'userid'=>$userid,'replies'=>$replies]);
    }
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
      
      $question = ['heading' => $heading,'text' => $text,'created'=>gmdate("Y-m-d H:i:s")];
      $res = $this->Questions->saveQuestion($question,$u_id);
      
      
      $tags = explode(" ", trim($tags));
      foreach ($tags as $tag) {
        
        $this->Tags->newTag($tag,$res['id']);
  
      }
      
      $url = $this->url->create('question/slug') . "/" . $res['slug'];
      $this->views->add('question/added',['url'=>$url]);
      
      
      
      
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
  
  public function tagAction($params=null){
    
    if($id=intval($params)==0)
      die("Tagid (int) required as param");
    
    $res = $this->Questions->getByTagId($params);
     
    
    $this->db->execute('Select * from tags where id=?',[$params]);
    $tag = $this->db->fetchOne(); 
    $title = "Alla frågor med taggen <strong>{$tag->tag}</strong>";
  
    $this->allAction($res,$title);
  }
  
  public function userAction($params=null){
   
    
    if($id=intval($params)==0)
      die("Userid (int) required as param");
    
    $res = $this->Questions->getByUserId($params);
    
    $this->db->execute('Select * from user where id=?',[$params]);
    $user = $this->db->fetchOne(); 
    $title = "<strong>{$user->name}:s</strong> frågor";
  
    $this->allAction($res,$title);
  }
  
  public function allAction($questionsToDisplay=null, $headline=null){
   
     $url =$this->url->create("question/slug");
     $allusersview =$this->url->create("view_users");
     
 
       
    if(is_array($questionsToDisplay) && count($questionsToDisplay)==0)
    {
      $questions = [];
      $replycount = 0;
    }
    else if($questionsToDisplay==null)
    {
      $questions = $this->Questions->getAll();
      $replycount = $this->Questions->getQuestionCount();
      $headline = "Visar alla frågor";
    }
    else
    {
      $questions = $questionsToDisplay;
      $replycount = $this->Questions->getQuestionCount();
    }
    
    $this->theme->addStylesheet("css/questions.css");
    $this->theme->setTitle('Alla frågor');
    $this->views->add('question/viewall',['headline'=>$headline,'questions'=>$questions,'replycount'=>$replycount,'url'=>$url,'allusersview'=>$allusersview]);
  }
  
  
  
 
  

  
}
