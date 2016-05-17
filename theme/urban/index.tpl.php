<!doctype html>
<html class='no-js' lang='<?=$lang?>'>
<head>
<meta charset='utf-8'/>
<title><?=$title . $title_append?></title>
<?php if(isset($favicon)): ?><link rel='icon' href='<?=$this->url->asset($favicon)?>'/><?php endif; ?>


<?php foreach($stylesheets as $stylesheet): ?>
<link rel='stylesheet' type='text/css' href='<?=$this->url->asset($stylesheet)?>'/>
<?php endforeach; ?>

<?php if(isset($style)): ?><style><?=$style?></style><?php endif; ?>
<script src='<?=$this->url->asset($modernizr)?>'></script>
</head>

<body>
    

<div id='wrapper'>
        
    
<div class="headerban clearfix">
   <div class="navbar" role="navigation">
       <div class="container">
       
           <a class="pull-left logo" style="width:300px;" href="./">Svenska <span class="orange">StarWars</span>Sällskapet</a> 
    
  
    
<?php if ($this->views->hasContent('navbar') && !isset($hidenav)):?>
   
      
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
          
       <nav class="sswsnav navbar-collapse navbar-right collapse">
           
           <ul class="display-sm">   
              <li><a href="#">Användarprofil</a></li>      
              <li><a href="#">Användarstatistik </a></li>      
              <li><a href="./logout">Logga ut </a></li>
           </ul>
         
           <ul class="usermenu">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        <strong><?=$userinfo->acronym?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu user-dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">  
                                    <img class="icon-size" src="http://www.gravatar.com/avatar/<?php md5(strtolower(trim($userinfo->email)));?>?s=90&amp;d=identicon">
                                           
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-center"><strong><?=$userinfo->name?></strong></p>
                                        <p class="text-center small"><?=$userinfo->email?></p>
                                        <p class="text-left">
                                            <a href="./profile" class="btn btn-primary btn-block btn-sm">Användarprofil</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider navbar-login-session-bg"></li>
                         
            
            <li><a href="#">Användarstatistik <span class="glyphicon glyphicon-stats pull-right"></span></a></li>      
            <li class="divider"></li>
            <li><a href="./logout">Logga ut <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                    </ul>
                </li>
            </ul>
       </nav>
          
     
        <?php $this->views->render('navbar');?>
             
          
<?php endif;?>
    
    </div><!-- end container --> 
    </div><!-- end navbar --> 
    
</div> 
    
    
    


<div id='main'>
<?php if(isset($main)) echo $main?>
<?php $this->views->render('main')?>
</div>

<div id='footer'>
<?php if(isset($footer)) echo $footer?>
<?php $this->views->render('footer')?>
</div>

</div>

   
<?php if(isset($jquery)):?><script src='<?=$this->url->asset($jquery)?>'></script><?php endif; ?>

<?php if(isset($javascript_include)): foreach($javascript_include as $val): ?>
<script src='<?=$this->url->asset($val)?>'></script>
<?php endforeach; endif; ?>

<?php if(isset($google_analytics)): ?>
<script>
  var _gaq=[['_setAccount','<?=$google_analytics?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>


</body>
</html>
