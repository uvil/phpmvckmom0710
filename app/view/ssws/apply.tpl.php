		<header>
		</header>
                
<div class="headersubBan">Skapa nytt konto</div>

<div style="text-align: center; color:red;"><?=$message?></div>
<div class="container">
		
			<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				<div class="panel panel-default " style="padding: 30px; margin-bottom: 50px;">
					
					
						<form role="form" id="applyForm"  action="applysubmit" method="POST">
							
								<div class="row" style="padding-bottom:20px;">
									<div class="center-block">
										
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1">
										<div class="form-group">
											<div class="input-group-adon">
												<label for='usrname'>Användarnamn*</label>
												<input class="form-control input-size-3" placeholder="" name="usrname" type="text" required="required" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group-adon">
												<label for='usrpass'>Akronym</label>
												<input class="form-control" placeholder="" name="usracronym" type="text" value="">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group-adon">
												<label for='usrpass'>Lösenord*</label>
												<input class="form-control" placeholder="" name="usrpass" type="password" value="" required="required">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group-adon">
												<label for='usrpass'>E-post*</label>
												<input class="form-control" placeholder="" name="usrmail" type="email" value="" required="required">
											</div>
										</div>
										
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-orange btn-block" value="Registrera">
										</div>
									</div>
								</div>

								<div class="row" style="margin-top:20px; margin-bottom:10px;">
                    <div class="col-sm-4 col-md-4  col-md-offset-1"><p><a href="<?=$returnlink?>">Återvänd till startsidan</a></p></div>
								</div>


							
						</form>
					
					
                </div>
			</div>

			<script>

				 setTimeout(function(){document.getElementById("applyForm").reset();}, 40);
				
			</script>
		
	</div>