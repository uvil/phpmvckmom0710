<?php

namespace Anax\Users;


 
/**
 * Model for Users.
 *
 */
class User extends \Anax\UVC\CDatabaseModel
{
  /**
  * Check if acronym is taken.
  *
  * @return  true - if the acroym is used/taken 
  *          or 
  *          false - if available
  */
  public function acronymExists($acronym)
  {
    
     $this->db->select('count(*) as posts')
              ->from($this->getSource())
              ->where("acronym = ?");

     $this->db->execute([$acronym]);
     
     $res = $this->db->fetchOne();
       
     if($res->posts==1)
       return true;
     else
       return false;
     
  }
  
  
  public function getMostActiveUsers($limit)
  {
 
    
    $sql = <<<SQL
          SELECT 
            *,
            COALESCE(repliescount,0) as repliescount, 
            COALESCE(commentscount,0) as commentscount, 
            COALESCE((questioncount+repliescount+commentscount),0) as sum 
           FROM
            (SELECT
              user.id,
              name, 
              count(user_question.user) as questioncount
            FROM user
            LEFT JOIN user_question 
            ON user.id=user_question.user 
            GROUP BY user.id)
          AS A
          LEFT JOIN 
            (SELECT userid,COUNT(userid) as repliescount FROM replies GROUP BY userid)
          AS B
          ON
            A.id=B.userid
          LEFT JOIN 
            (SELECT userid,COUNT(userid) as commentscount FROM comments GROUP BY userid)
          AS C
          ON
            A.id=C.userid
          ORDER BY sum DESC 
          LIMIT $limit
          
            
SQL;
    
   
    $this->db->execute($sql);
    return $this->db->fetchAll();

  }

 
}
