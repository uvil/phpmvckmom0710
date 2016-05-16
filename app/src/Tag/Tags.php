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
    
  
  
  public function newtag($tagname)
  {
    if($this->tagExists($tagname))
      return false;
    else{
      echo "Dags att spara $tagname <br>";
      $r = $this->create(['tag'=>$tagname]);
      var_dump($r);
      return true;
    }
  }
}
