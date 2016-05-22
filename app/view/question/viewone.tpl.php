<div class="clearfix">
    
    <div class="col-sm-12">
        <div class="panel panel-default" style="margin:10px 0px;">
        <div class="panel-body">
            
            <div class="mypanel">
                
              <div class="jumbotron uvtron">
                  <h2><?=$question->heading?></h2>
                  <p><?=$question->text?></p>
                  
                  <div class="pull-right col-sm-2 writtenby text-center">
                      Skriven av: <?=$question->name?>
                      <?php $src="http://www.gravatar.com/avatar/". md5(strtolower(trim($question->email))). "?s=16&amp;d=identicon"; ?>
                        <img class="gravatar" src="<?=$src;?>"> 
                  </div>
                  
                  <div class="tags" style="margin-left: 20px;">
                             <?php 
                             $tags = explode(',',$question->tags);
                             foreach($tags as $tag):?>
                            <span class="label label-default"><?=$tag?></span>
                             <?php endforeach;?>
                        </div>
                  
                  
              </div>
                
              <div class="row addcomment">Lägg till kommentar</div>
              <div class="comment-field-div"><textarea class="form-control" rows="5" placeholder="Skriv din kommentar här..."></textarea></div>
                
                
           </div>
        </div>
        </div>
    </div>
           
    <div class="col-sm-12">
        <div class="panel panel-default" style="margin:10px 0px;">
        <div class="panel-body">
            
            <div class="mypanel">
  
                <div class="row" style="margin-bottom:15px"><h3>Svar</h3></div>
               
              <?php              
                if($replies!=null)
                  foreach($replies as $reply):
      
                  ?> 
                
               
                <div class="row reply">
                    <div><?=$reply->text?></div>
                    <div class="col-sm-2 col-sm-offset-10 col-xs-6 col-xs-offset-6 text-center replyinfo">Skrivet av: <strong><?=$reply->name?></strong>   
                     <?php $src="http://www.gravatar.com/avatar/". md5(strtolower(trim($reply->email))). "?s=16&amp;d=identicon"; ?>
                        <img class="gravatar" src="<?=$src;?>"> 
                        
                        
                    </div>
                  </div>
                
                <div class="row addcomment">Lägg till kommentar</div>
                <div class="comment-field-div"><textarea class="form-control" rows="5" placeholder="Skriv din kommentar här..."></textarea></div>
                <hr style="margin-top:5px;">
              <?php endforeach;?>
              
            </div>
        </div>
        </div>
    </div>
    
    <div class="col-sm-12">
        <div class="panel panel-default" style="margin:10px 0px;">
        <div class="panel-body">
            
            <div class="mypanel">
                
                <div class="row"><h3>Ditt svar</h3></div>
                
                
                <div class="row">
                    <form method="post" class="replyform">   
                        <input type="hidden" name="userid" value="<?=$userid?>">
                        <input type="hidden" name="questionid" value="<?=$question->id?>">
         
                        <div class="form-group">
                         
                            <textarea class="form-control" id="reply" rows="15" name="reply" placeholder="Skriv ditt svar här..."></textarea>

                        
                            <div class="text-center"><input type="submit" name="replysubmit" value="Skicka svar" class="btn btn-orange"></div>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
        </div>
    </div>
</div>



</script>