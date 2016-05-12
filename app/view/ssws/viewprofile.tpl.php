
<div class="panel panel-default">
	<div class="panel-body">
		<div class="mypanel">
			<div class="row">
				<h3>Visar användarprofil</h3>
			</div>


				<div class="col-lg-4 userbackfill">

					<div class="row userback">
						<img class="icon-size-mm" src="http://www.gravatar.com/avatar/<?php md5(strtolower(trim("doe@dbwebb.se")));?>?s=200&amp;d=mm">
					</div>
					<div class="row row1 text-center"><h2><?=$userinfo->name?></h2></div>
					<div class="row text-center"><h4><?=$userinfo->title?></h4></div>
					<div class="row text-center"><h5><?=$userinfo->subtitle?></h5></div>
					<div class="row text-center">
					
              <a class="btn btn-orange" href="editprofile"> Editera profil</a>	
              <a class="btn btn-orange" href="editpassword">Byt lösenord</a>	
						
					</div>
					<div class="row lastrow text-center"><a href="http://sv.gravatar.com/">Uppdatera gravatar</a></div>

				</div>

				
				<form class="form-horizontal" method="post" action="#">
				
				<div class="col-lg-4">

					<div class="form-group">
							<label for="name" class="control-label">Namn</label>
							<div class="cols-sm-10">
							    <p class="infotext greyback"><?=$userinfo->name?></p>
							</div>
						</div>

					<div class="form-group">
							<label for="name" class="control-label">Titel</label>
							<div class="cols-sm-10">
								<p class="infotext greyback"><?=$userinfo->title?></p>
							</div>
						</div>

					<div class="form-group">
							<label for="name" class="control-label">Undertitel</label>
							<div class="cols-sm-10">
								<p class="infotext greyback"><?=$userinfo->subtitle?></p>
							</div>
						</div>

					

					<div class="form-group">
							<label for="username" class="control-label">Akronym</label>
							<div class="cols-sm-10">
								<p class="infotext greyback"><?=$userinfo->acronym?></p>
							</div>
						</div>

					<div class="form-group">
							<label for="email" class="control-label">E-post</label>
							<div class="cols-sm-10">
								<p class="infotext greyback"><?=$userinfo->email?></p>
							</div>
						</div>



					<div class="form-group">
							<label for="name" class="control-label">Kunskaper</label>
							
							<div class="cols-sm-10 skillbars">
                  
                <?php 
                  $skills = explode("\n",$userinfo->skills);
                  
                  foreach ($skills as $skill): ?>
                  <?php $skillparts = explode(" ",$skill);?>
                  <div class="skillbar clearfix " data-percent="<?=trim($skillparts[1])?>">
                    <div class="skillbar-title" ><span><?=$skillparts[0]?></span></div>
                    <div class="skillbar-bar" ></div>
                    <div class="skill-bar-percent"><?=$skillparts[1]?></div>
                  </div>
                  
                <?php endforeach;?>

								
							</div>
						</div>

						
				
				</div>

				<div class="col-lg-4">

					<div class="form-group">
							<label for="email" class="control-label">Twitter</label>
							<div class="cols-sm-10">

								<p class="infotext greyback">
									<a href="<?=$userinfo->twitter?>" class="btn btn-primary btn-social"><i class="fa fa-twitter fa-2x"></i></a>
								</p>
							</div>
						</div>

					<div class="form-group">
							<label for="email" class="control-label">Facebook</label>
							<div class="cols-sm-10">
							<p class="infotext greyback">
								<a href="<?=$userinfo->facebook?>" class="btn btn-primary btn-social"><i class="fa fa-facebook fa-2x"></i></a>
							</p>
							</div>
						</div>

					<div class="form-group">
							<label for="email" class="control-label">Hemsida</label>
							<div class="cols-sm-10">
								<p class="infotext greyback">
								<a href="<?=$userinfo->webbpage?>" class="btn btn-primary btn-social"><i class="fa fa-home fa-2x"></i></a>
							</p>
							</div>
						</div>
					
					

					<div class="form-group">
							<label for="name" class="control-label">Hobbyintressen</label>
							<div class="cols-sm-10">
								<p class="infotext intrests greyback">
                    
                   <?php 
                  $hobbies = explode(", ",$userinfo->hobbies);
                  foreach ($hobbies as $hobbie): ?>
                    <span class="label label-default"><?=$hobbie?></span>
                  <?php endforeach ?>
				
							</p>
							</div>
						</div>

				</div>

				</form>
		
		</div>
	</div>
</div>