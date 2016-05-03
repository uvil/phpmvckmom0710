	<header>
	</header>

    <div class="headersubBan">Logga in</div>
    
    <div style="text-align: center; color:red;"><?=$message?></div>
    <div class="container" >
		
			<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				<div class="panel panel-default" style="padding: 30px; margin-bottom: 50px;">
					
					
						<form role="form" action="loginsubmit" method="post">
							
								<div class="row" style="padding-bottom:20px;">
									<div class="center-block">
										
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user input-size-3"></i>
												</span> 
												<input class="form-control input-size-3" placeholder="Username" name="loginname" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-orange btn-block" value="logga in">
										</div>
									</div>
								</div>

								<div class="row" style="margin-top:20px; margin-bottom:10px;">
									<div class="col-sm-4 col-md-4  col-md-offset-1"><p><a href="<?=$returnlink?>">Återvänd till startsidan</a></p></div>
									<div class="col-sm-4 col-md-4  col-md-offset-2" style="text-align:right;"><a href="<?=$applylink?>">Skapa nytt konto</a></div>
								</div>


							
						</form>
					
					
                </div>
			</div>
		
	</div>



