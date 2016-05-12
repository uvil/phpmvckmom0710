

<div class="panel panel-default">
	<div class="panel-body">
		<div class="mypanel">
			<div class="row">
				<h3>Byt lösenord</h3>
			</div>


				<div class="col-lg-4 userbackfill">

					<div class="row userback">
						<img class="icon-size-mm" src="http://www.gravatar.com/avatar/<?php md5(strtolower(trim("doe@dbwebb.se")));?>?s=200&amp;d=mm">
					</div>
					<div class="row row1 text-center"><h2><?=$userinfo->name?></h2></div>
					<div class="row text-center"><h4><?=$userinfo->title?></h4></div>
					<div class="row text-center"><h5><?=$userinfo->subtitle?></h5></div>
					<div class="row text-center">
						<form method="post" style="visibility: hidden;">
							<input class="btn btn-orange" type="submit" name="updatepass" value="Spara nytt lösenord">	
						</form>
					</div>
					<div class="row lastrow text-center" style="visibility: hidden;"><a href="http://sv.gravatar.com/">Uppdatera gravatar</a></div>

				</div>

				<?php if(isset($msg) && $msg=="Nytt lösenord sparat!"):?>
           <div class="col-lg-4">
            <h2 class="text-center" style="padding-top: 20px;"><?=$msg?></h2>
            <div class="text-center">
                <a class="btn btn-orange" href="./profile">Återvänd till profilen</a>
          </div>
           </div>
        <?php else: ?>
				<form class="form-horizontal" method="post" action="./savenewpassword">
            
            <input type="hidden" name="id" id="id" value="<?=$userinfo->id?>" />
				
				<div class="col-lg-4">

					<div class="form-group">
							<label for="name" class="control-label">Föregående lösenord</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="oldpass" id="oldpass" required="required" />
								</div>
							</div>
						</div>

					<hr />

					<div class="form-group">
							<label for="name" class="control-label">Nytt lösenord</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user-md fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="newpass" id="newpass" required="required"/>
								</div>
							</div>
						</div>

					<div class="form-group">
							<label for="name" class="control-label">Upprepa nytt lösenord</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-child fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="newpass2" id="newpass2" required="required"/>
								</div>
							</div>
						</div>

					<hr />

					

					<div class="form-group text-center">
						<input class="btn btn-orange" type="submit" name="updatepass" value="Spara nytt lösenord">
          </div>  
          
          <?php if(isset($msg)):?>
            <p class="text-center" style="color:red; padding-top: 20px;"><?=$msg?></p>
          <?php endif; ?>
            
           
          </div>
         <?php endif; ?>   
            
					



						
				
				

				<div class="col-lg-4 passimg">
					<img src="img/yoda.jpg">
				</div>

				</form>
		
		</div>
	</div>
</div>
