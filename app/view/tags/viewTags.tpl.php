
<div class="clearfix">
    
    <div class="col-sm-12">
        <div class="panel panel-default" style="margin:10px 0px;">
        <div class="panel-body">
            
            <div class="mypanel">
                
                    <div class="row"><h3>Visar alla taggar</h3></div>
                    
                    <?php foreach ($tags as $tag):?>
                    <div class="col-sm-2 pull-left">
                        <div class="tagcard">
                            <div class="tagname"><span class="fa fa-tags pull-left small"></span> <?=$tag->tag?></div>
                        <div class="tagdescription"><?=$tag->description?></div>
                        <div class="taglink text-center"><a href="<?=$url?>/<?=$tag->id?>" class="btn btn-orange">Visa frågor</a></div>
                        </div>
                    </div>
                    <?php endforeach;?>                   
            
            </div>
        </div>
        </div>
    </div>
    

</div>