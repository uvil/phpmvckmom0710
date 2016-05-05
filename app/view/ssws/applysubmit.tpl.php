		<header>
		</header>
<div class="headersubBan">Okej!</div>
<div class="container">
		
			<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				<div class="panel panel-default " style="padding: 30px; margin-bottom: 50px;">

            <h2 class="text-center">Användaren <strong><?=$acro?></strong> har skapats.
                 </h2>
         
          <form action="loginsubmit" method="post">
              <input type="hidden" name="loginname" value="<?=$acro?>">
              <input type="hidden" name="password" value="<?=$pass?>">
              <div class="text-center" style="margin:30px;">
            <input type="submit" class="btn btn-lg btn-orange" value="Logga in">
          </div>
          </form>

        </div>
      </div>
</div>