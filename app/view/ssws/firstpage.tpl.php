<div class="panel panel-default">
<div class="panel-body">
<div class="mypanel color1">
 

  <div class="width20 pull-left nopad fullheight backimg1"></div>

  <div class="marginleft20">

  	<h3 >Senaste frågor</h3>
    
    <?php foreach ($latestquestions as $question):?>
    <a href="<?=$slugurl.'/'.$question->slug?>" style="text-decoration: none;">
  	<div class="post">
  		<h4><?=$question->heading?></h4>
     
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
  
    <div class="nomarginleft20">

  	<h3 >Aktivaste användare</h3>

  	<div class="post">
  		<h4>Abigail Giraff</h4>
  		<p>123 inlägg, 45 svar</p>
  	</div>
  
  	<div class="post">
  		<h4>Bo Ko</h4>
  		<p>53 inlägg, 35 svar</p>
  	</div>
  
  	<div class="post">
  		<h4>Anna Stefansson</h4>
  		<p>33 inlägg, 23 svar</p>
  	</div class="post">
  	
  	<div class="post">
  		<h4>Jamal Össtyrmen</h4>
  		<p>13 inlägg, 15 svar</p>
  	</div>

  	<div class="post">
  		<h4>Hentai Felamosz</h4>
  		<p>3 inlägg, 5 svar</p>
  	</div>
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

  	<div class="post tag-post">
  		<h4 class="autowidth">1:</h4> <div class="btn-orange btn-lg nomargin autowidth">Rouge</div>
  		<span>245 förekomster</span>
  	</div>
  <div class="post tag-post">
  		<h4 class="autowidth">2:</h4> <div class="btn-orange btn-lg nomargin autowidth">Obi</div>
  		<span>113 förekomster</span>
  	</div>
  <div class="post tag-post">
  		<h4 class="autowidth">3:</h4> <div class="btn-orange btn-lg nomargin autowidth">Darth</div>
  		<span>49 förekomster</span>
  	</div>
  <div class="post tag-post">
  		<h4 class="autowidth">4:</h4> <div class="btn-orange btn-lg nomargin autowidth">Jedi</div>
  		<span>25 förekomster</span>
  	</div>
  <div class="post tag-post">
  		<h4 class="autowidth">5:</h4> <div class="btn-orange btn-lg nomargin autowidth">Galacticrepublic</div>
  		<span>5 förekomster</span>
  	</div>
  
 </div>
 
</div>
</div>
</div>



