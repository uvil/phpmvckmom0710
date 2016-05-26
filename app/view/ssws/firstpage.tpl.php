<div class="panel panel-default">
<div class="panel-body">
<div class="mypanel color1">
    

  <div class="width20 pull-left nopad fullheight backimg1"></div>

  <div class="marginleft20">

  	<h3 >Senaste frågor</h3>
    
    <?php foreach ($latestquestions as $question):?>
    <a href="<?=$slugurl.'/'.$question->slug?>" style="text-decoration: none;">
  	<div class="post">
  		<h4 class="post-header"><?=$question->heading?></h4>
     
        <?php $tags = explode(',',$question->tags);?>
        <p>
          <?php foreach($tags as $tag):?>
      <span class="label label-default"><?=$tag?></span>
          <?php endforeach;?>
     
          <span class="pull-right">Av <?=$question->name?> den <?=$question->time?>
          </span></p>
       
  	</div>
     </a>
    <?php endforeach; ?>
  

  

 </div>

</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-body">
<div class="mypanel color1">

  <div class="width20 pull-right nopad fullheight backimg2"></div>
  
  <div class="nomargin left20" style="border: 1px solid #ddd; height: 559px;">

  	<h3 >Aktivaste användare</h3>
    
    <?php foreach ($activeusers as $active):?>
    
     <a href="<?=$userurl .'/'.$active->id?>" style="text-decoration: none;">
  	<div class="post">
        <h4 class="post-header"><?=ucfirst($active->name)?></h4>
      <p>
          <strong><?=$active->sum?> aktiviteter</strong> 
          <span class="small">(<?=$active->questioncount?> frågor, <?=$active->repliescount?> 
              svar och <?=$active->commentscount?> kommentarer)</span>.</p>
  	</div>
     </a>
    <?php endforeach; ?>
  
  	
 </div>

</div>

</div>
</div>

<div class="panel panel-default">
<div class="panel-body">
<div class="mypanel color1">

   <div class="width20 pull-left nopad fullheight backimg3"></div>

    <div class="marginleft20">

  	<h3 >Populäraste taggar</h3>
    
    <?php 
    foreach ($frequenttags as $key=>$tag):?>
    
    <a href="<?=$tagsurl.'/'.$tag->id?>" style="text-decoration: none;">
  	<div class="post tag-post" >
        <h4 class="autowidth"><?=$key+1?>:</h4> <div class="btn-orange btn-lg nomargin autowidth" ><?=$tag->tag?></div>
  		<span><?=$tag->count?> förekomster</span>
  	</div>
    
    <?php endforeach; ?>

  
 </div>
 
</div>
</div>
</div>



