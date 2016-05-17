<?php
namespace Phpmvc\Question;

class Questions extends \Anax\UVC\CDatabaseModel
{ 

    /**
     * Delete all comments.
     *
     * @return void
    
    public function deleteAll()
    {
      $this->db->delete('comments');
      return $this->db->execute();
    }
     */
  
     public function getAll($columns = '*') {
       $this->db->select('heading,text,questions.created,name,email')->from('questions')->leftJoin('user_question','questions.id=question')->leftJoin('user','user=user.id');
       
       //echo $this->db->getSQL(). "<br>";
       
       $this->db->execute();
       $qs = $this->db->fetchAll();
      
       //var_dump($qs);
       return $qs;
     }
     
     public function saveQuestion($values=[],$u_id){
       
      parent::save($values);
      
      //save realtion
      $q_id = $this->db->lastInsertId(); 
      $this->db->execute("INSERT INTO user_question(user,question) VALUES (?,?)",[$u_id,$q_id]);
      
      echo "Fråga tillagd...";
     }
  
   
}

