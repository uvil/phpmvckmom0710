
<div class="panel panel-default">
	<div class="panel-body">
		<div class="mypanel">
			<div class="row">
				<h3>Uppdatera användarprofil</h3>
			</div>


				<div class="col-lg-4 userbackfill">

					<div class="row userback">
						<img class="icon-size-mm  " src="http://www.gravatar.com/avatar/<?php md5(strtolower(trim("doe@dbwebb.se")));?>?s=200&amp;d=mm">
					</div>
					<div class="row row1 text-center"><h2><?=$userinfo->name?></h2></div>
					<div class="row text-center"><h4><?=$userinfo->title?></h4></div>
					<div class="row text-center"><h5><?=$userinfo->subtitle?></h5></div>
					<div class="row text-center">
              <form method="post" class="form-horizontal" action="saveprofile">
							<input class="btn btn-orange" type="submit" name="update" value="Spara och uppdatera profil">	
						
					</div>
          
          <input type="hidden" name="id" value="<?=$userinfo->id?>">	
          
					<div class="row lastrow text-center"><a href="#">&nbsp</a></div>

				</div>

				
				
				
				<div class="col-lg-4">

					<div class="form-group">
							<label for="name" class="control-label">Namn</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  value="<?=$userinfo->name?>" required="required" />
								</div>
							</div>
						</div>

					<div class="form-group">
							<label for="name" class="control-label">Titel</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user-md fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="title" id="title" value="<?=$userinfo->title?>" required="required"/>
								</div>
							</div>
						</div>

					<div class="form-group">
							<label for="name" class="control-label">Undertitel</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">
                      <i class="fa fa-child fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="subtitle" id="subtitle" value="<?=$userinfo->subtitle?>" required="required"/>
								</div>
							</div>
						</div>

					

					<div class="form-group">
							<label for="username" class="control-label">Akronym</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="akronym" id="akronym" value="<?=$userinfo->acronym?>" required="required" />
								</div>
							</div>
						</div>

					<div class="form-group">
							<label for="email" class="control-label">E-post</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email" value="<?=$userinfo->email?>" required="required"  />
								</div>
							</div>
						</div>



					<div class="form-group">
							<label for="name" class="control-label">Kunskaper <span class="small">(fyra rader med procentvärden)</span> </label>
							<div class="cols-sm-10 addmargin">
								<div class="input-group">
									<span class="input-group-addon vertical-align-top"><i class="fa fa-certificate " aria-hidden="true"></i></span>
									<textarea style="height:200px" class="form-control" name="skills" id="skills" required="required" />
<?=$userinfo->skills?>
									</textarea>
								</div>
							</div>
						</div>

						
				
				</div>

				<div class="col-lg-4">

					<div class="form-group">
							<label for="email" class="control-label">Twitter</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-twitter fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="twitter" id="twitter" value="<?=$userinfo->twitter?>" />
								</div>
							</div>
						</div>

					<div class="form-group">
							<label for="email" class="control-label">Facebook</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-facebook fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="facebook" id="facebook" value="<?=$userinfo->facebook?>" />
								</div>
							</div>
						</div>

					<div class="form-group">
							<label for="email" class="control-label">Hemsida</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-home fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="webbpage" id="webbpage" value="<?=$userinfo->webbpage?>"  />
								</div>
							</div>
						</div>
					
					

					<div class="form-group">
							<label for="name" class="control-label">Hobbyintressen</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon vertical-align-top"><i class="fa fa-cogs" aria-hidden="true"></i></span>
									<textarea style="height:348px" class="form-control" name="hobbies" id="hobbies" />
<?=$userinfo->hobbies?>
									</textarea>
								</div>
							</div>
						</div>

				</div>

				</form>
		
		</div>
	</div>
</div>
