<?php

namespace Phpmvc\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CommentController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;
    
    
       public function initialize()
   {
       $this->comments = new \Phpmvc\Comment\Comments();
       $this->comments->setDI($this->di);
   }
   
  
    
    /**
     * Edit a comment.
     *
     * @return void
     */
    public function editAction()
    {
      //echo "Dags att editera kommentar ";
      $this->theme->addStylesheet('css/comment.css'); 
      $this->theme->setTitle("Editera kommentar");
      
      //get values for edit
      $id = $this->request->getPost('id');
      $redirect = $this->request->getPost('redirect');
     
     
      $this->comments = new \Phpmvc\Comment\Comments();
      $this->comments->setDI($this->di);
        
      //load comment post 
      $res = $this->comments->find($id);
        
      //generate form
      $f = new \Anax\Comment\CFormComment($this->comments,$this->comments->topicID,$redirect);
        
      // Check the status of the form
      $res = $f->Check();
        
      // If form was submitted
      if($res['status'] === true) 
      {  
       $url = $this->url->create($res['redirect']);
       $this->response->redirect($url);

      }
        
      //display form
      $this->theme->setTitle("Kommentar");
      $form = $f->getHTML();
      $this->views->add('comment/newform',['header'=>'Editera kommentar','form'=>$form,'redirect'=>$redirect]);
   
    }
    
    /**
     * Remove a comment.
     *
     * @return void
     */
    public function deleteAction()
    {
      $comments = new \Phpmvc\Comment\Comments();
      $comments->setDI($this->di);
      
      $id = $this->request->getPost('id');
      
      $comments->delete($id);
      
      $this->response->redirect($this->request->getPost('redirect'));
    }
    
    /**
     * Add code generated comments.
     *
     * @return void
     */
    public function addDefaultCommentsAction()
    {
      
      $comments = new \Phpmvc\Comment\Comments();
      $comments->setDI($this->di);
      
      $this->db->dropTableIfExists('comments')->execute();
 
    $this->db->createTable(
        'comments',
        [
            'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
            'topicID' => ['integer'],
            'comment' => ['varchar(255)'],
            'name' => ['varchar(80)'],
            'web' => ['varchar(80)'],
            'mail' => ['varchar(80)'],
            'timestamp' => ['datetime'],
            'ip' => ['varchar(80)']  
        ]
    )->execute();
    
     $this->db->insert('comments',['comment','topicID', 'name', 'web', 'mail', 'timestamp','ip']);
      
     $this->db->execute(["Krigets första offer är sanningen.",
            1,
            "Aiskylos",
            "?",
            "ais@greek.old",
            time(),
            $this->request->getServer('REMOTE_ADDR'),
        ]);
      
      
     $this->db->execute(["Aldrig har så många haft så få att tacka för så mycket.",
            1,
            "Winston Churchill",
            "?",
            "winston@home.en",
            time(),
            $this->request->getServer('REMOTE_ADDR'),
        ]);
     
      $this->db->execute(["Veni, vidi, vici!",
            2,
            "Cesar",
            "?",
            "cessar@rome.old",
            time(),
            $this->request->getServer('REMOTE_ADDR'),
        ]);
      
      $this->db->execute(["Antingen hittar vi en väg, eller så gör vi en.",
            2,
            "Hannibal",
            "?",
            "hannibal@karthago.old",
            time(),
            $this->request->getServer('REMOTE_ADDR'),
        ]);
      
     
      $this->response->redirect($this->request->getPost('redirect'));
    }
    
     

    /**
     * Add a comment.
     *
     * @return void
     */
    public function addAction()
    {
      //get values for view
      $comment = $this->request->getPost('comment');
      $questionid = $this->request->getPost('questionid');
      $replyid = $this->request->getPost('replyid');
      
      //if values not supplied - display error message for user
      if(!isset($comment))
      {
        die("Comment must be set");
      }
      else if(!isset($questionid))
      { 
        die("Questionid must be set");
      }
      else if(!isset($replyid))
      {
        die("Replyid must be set");
      }
      else{
         $this->db->insert('comments',['comment','questionid','replyid','timestamp','ip']);
      
          $this->db->execute([$comment,$questionid,$replyid,time(),$this->request->getServer('REMOTE_ADDR')]);
       
      }
      
      
    }
    


    /**
     * Remove all comments.
     *
     * @return void
     */
    public function removeAllAction()
    {
     
        $isPosted = $this->request->getPost('doRemoveAll');
        
        if (!$isPosted) {
            $this->response->redirect($this->request->getPost('redirect'));
        }

        $comments = new \Phpmvc\Comment\Comments();
        $comments->setDI($this->di);

        $comments->deleteAll();

        $this->response->redirect($this->request->getPost('redirect'));
       
    }
}
