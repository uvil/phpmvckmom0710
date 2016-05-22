
<div class="clearfix">
    
    <div class="col-sm-12">
        <div class="panel panel-default" style="margin:10px 0px;">
        <div class="panel-body">
            
            <div class="mypanel">
                
                    <div class="row"><h3>Visar alla taggar</h3></div>
                    
                    <?php foreach ($tags as $tag):?>
                    <div class="col-xs-2 pull-left tagcard">
                        <div class="tagname"><?=$tag->tag?></div>
                        <div class="tagdescription"><?=$tag->description?></div>
                        <div class="taglink text-center"><a href="<?=$url?>/<?=$tag->id?>" class="btn btn-orange">Visa tag id#<?=$tag->id?></a></div>
                    </div>
                    <?php endforeach;?>                   
            
            </div>
        </div>
        </div>
    </div>
    

</div>