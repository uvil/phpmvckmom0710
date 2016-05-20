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
  
     public function getBySlug($slug)
     {
       $this->db->select('*')->from('questions')->where("slug=?");
       $this->db->execute([$slug]);
       $qs = $this->db->fetchOne();
       return $qs;
     }
     
     public function getByUserId($id){
       
        $this->db->select()->from('questions')->leftJoin("user_question","question=questions.id")->leftJoin('user','user=user.id')->where('user=?');
        
        
        $this->db->execute([$id]);
        $res = $this->db->fetchAll();
        
        return $res;
     }
  
     public function getAll() {
       $this->db->select('heading,text,questions.created,name,email,slug')->from('questions')->leftJoin('user_question','questions.id=question')->leftJoin('user','user=user.id');
       
       //echo $this->db->getSQL(). "<br>";
       
       $this->db->execute();
       $qs = $this->db->fetchAll();
      
       //var_dump($qs);
       return $qs;
     }
     
     public function saveQuestion($values=[],$u_id){
       
      //add slug
      $values['slug']=$this->slugify($values['heading']);
       
      parent::save($values);
      
      //save relation
      $q_id = $this->db->lastInsertId(); 
      $this->db->execute("INSERT INTO user_question(user,question) VALUES (?,?)",[$u_id,$q_id]);
      
      echo "Fråga tillagd...";
     }
     
     public function saveReply($data)
     {
       $this->db->execute("INSERT INTO replies(text, userid, questionid) VALUES (?,?,?)",$data);
     }
     
     public function getReplies($questionid){
       
       $this->db->select('questionid,text,name,email')->from('replies')->leftJoin('user','userid=user.id')->where('questionid=?');
       $this->db->execute([$questionid]);
       $res = $this->db->fetchAll();
       return $res;
       
     }
     
     /**
 * Create a slug of a string, to be used as url.
 *
 * @param string $str the string to format as slug.
 * @returns str the formatted slug. 
 */
     private function slugify($str) {
        $str = mb_strtolower(trim($str));
        $str = str_replace(array('å','ä','ö'), array('a','a','o'), $str);
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = trim(preg_replace('/-+/', '-', $str), '-');
        return $str;
      }
  
   
}

