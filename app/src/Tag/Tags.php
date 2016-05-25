<?php
namespace Phpmvc\Tag;

class Tags extends \Anax\UVC\CDatabaseModel{
  
  public function tagExists($tagname){
    $this->query('id,tag')->where("tag=?");
    $res = $this->execute([$tagname]);
    if(count($res)>0)
    {
      return $res[0]->id;
    }
    else
      return false;
  }
  
  public function getAll()
  {
    $this->query();
    $res = $this->execute();
    return $res;
    
  }
    
  
  
  public function newtag($tagname, $questionid)
  {
    if($tagid=$this->tagExists($tagname))
    {
      $this->db->execute("INSERT INTO tag_question(tagid,questionid) VALUES(?,?)",[$tagid,$questionid]);
    }
    else{
      //save tag
      $r = $this->create(['tag'=>$tagname,'description'=>"Detta är en standard-text för taggen. Som skapas automatiskt när taggen skapas. Den går för tillfället inte att ändra av andra än databasadministratören. Men den fungerar fint som utfyllnad ändå!"]);

      //save relation
      $tagid = $this->db->lastInsertId();
      $this->db->execute("INSERT INTO tag_question(tagid,questionid) VALUES(?,?)",[$tagid,$questionid]);
      
      return $tagid;
    }
  }
  
  
  public function getMostFrequent()
  {
    $sql = <<<SQL
           SELECT tags.id as id,tag, count(tagid) AS count FROM tags
           LEFT JOIN tag_question
           ON
           tags.id=tag_question.tagid
           GROUP BY tagid
           ORDER BY count DESC
SQL;
    
    $this->db->execute($sql);
    $res = $this->db->fetchAll();
    
    return $res;
    
  }
}
