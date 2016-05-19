<div class="clearfix">
 
    <div class="col-sm-12">
        <div class="panel panel-default" style="margin:10px 0px;">
        <div class="panel-body">
            
            <div class="mypanel">
                
                <div class="row"><h3>Alla användare </h3></div>
                
                <div class="row">
                    <?php foreach ($users as $user):?>
                        <div class="col-md-3 col-lg-2">
            <div class="card">
                <div class="header-bg"></div>
                <div class="avatar">
                    <?php $src="http://www.gravatar.com/avatar/". md5(strtolower(trim($user->email))). "?s=122&amp;d=identicon"; ?>
                    <img src="<?=$src?>" alt="användarens gravatar" />
                </div>
                <div class="content">
                    <h4><?=$user->name?></h4>
                       <p><?=$user->subtitle?></p>
                    <p><a href="question/user/<?=$user->id?>" class="btn btn-orange">Visa frågor</a></p>
                </div>
            </div>
        </div>

                    <?php endforeach;?>
                  
                </div>
                
                
            </div>
        </div>
        </div>
    </div>
</div>