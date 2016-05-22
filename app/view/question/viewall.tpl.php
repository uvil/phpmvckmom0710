<div class="clearfix">
    
    <div class="col-sm-12">
        <div class="panel panel-default" style="margin:10px 0px;">
        <div class="panel-body">
            
            <div class="mypanel" style="height:auto; min-height: 730px;">
                
                <div class="row"><h3><?= $headline ?> 
                        <span class="small">(Varje rad/fråga är en klickbar länk)</span></h3>
                </div>
                
                <?php if(count($questions)==0):?>
                <div class="row text-center">
                    <h2><span class="small" >Verkar inte ha ställt några frågor...</span></h2> 
                    
                </div>
                <hr>
                
                <div class="text-center" style="margin-bottom: 30px;"><a class="btn btn-orange" href="<?=$allusersview?>">Välj annan användare</a></div> 
                   
              <?php else: ?>

                <?php foreach ($questions as $question):?>
                
                <?php 
                    $timestamp = strtotime($question->created);
                    $month = date('M',$timestamp); 
                    $day = date('d',$timestamp); 
                    $year = date('Y',$timestamp); 
                
                    ?>
                <a href="<?=$url?>/<?=$question->slug?>">
           
                <div class="row questionrow">
                    <div class="col-xs-1 dateinfo">
                        <div class="date">
                        <div class="month"><?=$month?></div>
                        <div class="day"><?=$day?></div>
                        <div class="year"><?=$year?></div>
                        </div>
                    </div>
                    <div class="col-xs-1 rankinfo">
                        <div class="rank">
                        <div class="txt">Svar</div>
                        <div class="nr">
                          <?php
                              if($replycount!=null && array_key_exists($question->id,$replycount))
                                echo $replycount[$question->id]; 
                              else if(isset($question->question) && array_key_exists($question->question,$replycount))
                                echo $replycount[$question->question];
                              else
                                echo '0';
                        ?>  
                        </div>
                        <div class="divide">---</div>
                        <div class="txt">Rank</div>
                        <div class="nr">0</div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="title"><?=$question->heading?></div>
                        <div class="questiontext">
                            
                        <?php 
                        
                        $string = $question->text;
                        $your_desired_width = 300;
                        
                        if (strlen($string) > $your_desired_width) 
                        {
                            $string = wordwrap($string, $your_desired_width);
                            $string = substr($string, 0, strpos($string, "\n"));
                        }
                        echo $string."...";      
                                ?>
                           
                        </div>
                        
                       
                        <div class="tags">
                             <?php 
                             $tags = explode(',',$question->tags);
                             foreach($tags as $tag):?>
                            <span class="label label-default"><?=$tag?></span>
                             <?php endforeach;?>
                        </div>
                    
                    </div>
                    <div class="col-xs-2 pull-right gravatarinfo">
                        <?php $src="http://www.gravatar.com/avatar/". md5(strtolower(trim($question->email))). "?s=122&amp;d=identicon"; ?>
                        <div class="text-center"><img class="gravatar" src="<?=$src;?>"></div>
                        <div class="text-center"><?=$question->name?></div>
                        
                    </div>
                    
                   
                </div>
                    <hr>
                </a>
                <?php endforeach;?>
              <?php endif; ?> 
                
               
                
            </div>
        </div>
        </div>
    </div>
</div>