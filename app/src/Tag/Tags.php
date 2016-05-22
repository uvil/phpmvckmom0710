<?php
namespace Phpmvc\Tag;

class Tags extends \Anax\UVC\CDatabaseModel{
  
  public function tagExists($tagname){
    $this->query('tag')->where("tag=?");
    $res = $this->execute([$tagname]);
    if(count($res)>0)
      return true;
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
    if($this->tagExists($tagname))
      return false;
    else{
      //save tag
      $r = $this->create(['tag'=>$tagname,'description'=>"Detta är en standard-text för taggen. Som skapas automatiskt när taggen skapas. Den går för tillfället inte att ändra av andra än databasadministratören. Men den fungerar fint som utfyllnad ändå!"]);

      //save relation
      $tagid = $this->db->lastInsertId();
      $this->db->execute("INSERT INTO tag_question(tagid,questionid) VALUES(?,?)",[$tagid,$questionid]);
      
      return $tagid;
    }
  }
}
