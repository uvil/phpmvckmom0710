<?php

namespace Phpmvc\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class Comments extends \Anax\UVC\CDatabaseModel
{ 

    /**
     * Delete all comments.
     *
     * @return void
     */
    public function deleteAll()
    {
      $this->db->delete('comments');
      return $this->db->execute();
    }
    
    public function getByQuestionId($questionid)
    {
      $this->db->select()->from('comments')->leftJoin('user','userid=user.id')->where('questionid=?');
      
      //$this->query()->where('questionid=?');
      return $this->execute([$questionid]);
      //return $this->db->fetchAll();
    }
    
  
   
}
