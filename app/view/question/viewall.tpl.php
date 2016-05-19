<div class="clearfix">
    
    <div class="col-sm-12">
        <div class="panel panel-default" style="margin:10px 0px;">
        <div class="panel-body">
            
            <div class="mypanel">
                <?php if(count($questions)==0):?>
                <div class="row questionrow">
                  <div class="jumbotron uvtron">
                    <h2 class="text-center">Frågorna du söker saknas.
                        <div class="small" style="margin-top: 10px;"> (Har användaren ställt några frågor?)</div></h2> 
                </div>    
              <?php else: ?>
                    
                <div class="row"><h3>Alla frågor 
                        <span class="small">(Varje rad/fråga är en klickbar länk)</span></h3>
                </div>
                
              
                <?php foreach ($questions as $question):?>
                <?php 
                    $timestamp = strtotime($question->created);
                    $month = date('M',$timestamp); 
                    $day = date('d',$timestamp); 
                    $year = date('Y',$timestamp); 
                ?>
                <a href="slug/<?=$question->slug?>">
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
                        <div class="nr">21</div>
                        <div class="divide">---</div>
                        <div class="txt">Rank</div>
                        <div class="nr">13</div>
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