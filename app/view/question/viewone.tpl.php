<div class="clearfix">
    
    <div class="col-sm-12">
        <div class="panel panel-default" style="margin:10px 0px;">
        <div class="panel-body">
            
            <div class="mypanel">
                
                <div class="jumbotron uvtron">
                    <h2><?=$question->heading?></h2>
                    <p><?=$question->text?></p>
                </div>
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
                         
                            <textarea class="form-control" rows="15" name="reply" autofocus="autofocus"></textarea>

                        
                            <div class="text-center"><input type="submit" name="replysubmit" value="Skicka svar" class="btn btn-orange"></div>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
        </div>
    </div>
</div>