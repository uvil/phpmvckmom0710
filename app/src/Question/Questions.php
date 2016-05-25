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
  
     public function getLatest($limit)
     {
       $this->db->select('*,questions.created as time,GROUP_CONCAT(tag) as tags')->from('questions')->orderBy('questions.created DESC')->limit($limit)->leftJoin('user_question','questions.id=question')->leftJoin('user','user=user.id')->leftJoin('tag_question','tag_question.questionid=questions.id')->rightJoin('tags','tag_question.tagid=tags.id')->groupBy('questions.id');
       $this->db->execute();
       return $this->db->fetchAll();
    
     }
          
  
     public function getBySlug($slug)
     {
       
       $this->db->select('questions.id as id,heading,text,questions.created,name,email,slug,GROUP_CONCAT(tag) as tags')->from('questions')->leftJoin('user_question','questions.id=question')->leftJoin('user','user=user.id')->leftJoin('tag_question','tag_question.questionid=questions.id')->rightJoin('tags','tag_question.tagid=tags.id')->groupBy('questions.id')->where('slug=?');
       
       
       $this->db->execute([$slug]);
       $qs = $this->db->fetchOne();
       
       
       return $qs;
     }
     
     public function getByTagId($tagid)
     {
     
       $this->db->select('questions.id as id,heading,text,questions.created,name,email,slug,GROUP_CONCAT(tag) as tags')->from('questions')->leftJoin('user_question','questions.id=question')->leftJoin('user','user=user.id')->leftJoin('tag_question','tag_question.questionid=questions.id')->rightJoin('tags','tag_question.tagid=tags.id')->groupBy("questions.id having GROUP_CONCAT(tags.id) LIKE '%{$tagid}%'");
       
 
        $this->db->execute();
        $res = $this->db->fetchAll();
     
        return $res;
       
     }
     
     public function getByUserId($id){
       
        
        $this->db->select('questions.id as id,heading,text,questions.created,name,email,slug,GROUP_CONCAT(tag) as tags')->from('questions')->leftJoin('user_question','questions.id=question')->leftJoin('user','user=user.id')->leftJoin('tag_question','tag_question.questionid=questions.id')->rightJoin('tags','tag_question.tagid=tags.id')->groupBy('id')->where('user=?');
        
        
        $this->db->execute([$id]);
        $res = $this->db->fetchAll();
        
        return $res;
     }
  
     public function getAll() {
       
       $this->db->select('questions.id as id,heading,text,questions.created,name,email,slug,GROUP_CONCAT(tag) as tags')->from('questions')->leftJoin('user_question','questions.id=question')->leftJoin('user','user=user.id')->leftJoin('tag_question','tag_question.questionid=questions.id')->rightJoin('tags','tag_question.tagid=tags.id')->groupBy('id');
       
       
       //echo $this->db->getSQL(). "<br>";
       
       $this->db->execute();
       $qs = $this->db->fetchAll();
      
       //var_dump($qs);
       return $qs;
     }
     
     public function getQuestionCount()
     {
       $this->db->select('questionid as id,count(*) as count')->from('replies')->groupBy('questionid');
       $this->db->execute();
       $qs = $this->db->fetchAll();
       
       $res = null;
       foreach ($qs as $q)
        $res[$q->id]=$q->count;
       
        return $res;
     }
     
     public function saveQuestion($values=[],$u_id){
       
      //add slug
      $values['slug']=$this->slugify($values['heading']);
       
      parent::save($values);
      
      //save relations
      $q_id = $this->db->lastInsertId(); 
      $this->db->execute("INSERT INTO user_question(user,question) VALUES (?,?)",[$u_id,$q_id]);
      
      $res = ['id'=>$q_id,'slug'=>$values['slug']];
      
      return $res;
     }
     
     public function saveReply($data)
     {
       $this->db->execute("INSERT INTO replies(text, userid, questionid) VALUES (?,?,?)",$data);
     }
     
     public function getReplies($questionid){
       
       $this->db->select('replies.id as id,questionid,text,name,email')->from('replies')->leftJoin('user','userid=user.id')->where('questionid=?');
       
 
       $this->db->execute([$questionid]);
       $res = $this->db->fetchAll();
       return $res;
       
     }
     
     public function getRepliesComments($questionid){
  
   
       
       $this->db->execute('Select name, replyid ,group_concat(comment) as com from comments join user on user.id=comments.userid where replyid in(select id from replies where questionid=?) group by replyid',[$questionid]);
       
       $res = null;
       while($r = $this->db->fetchOne())
       {  
         $res[$r->replyid]['coms']=$r->com;
         $res[$r->replyid]['name']=$r->name;
       }
      
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

