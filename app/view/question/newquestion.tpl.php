
<div class="clearfix">
    
    <div class="col-sm-8">
        <div class="panel panel-default" style="margin:10px 0px;">
        <div class="panel-body">
            <div class="mypanel" style="height: auto; height: 700px;">
            
             <form method="post">
            
                <div class="row">
              <h3>Ny fråga</h3>
            </div>
             
                 <input type="hidden" name="userid" value="<?=$userid;?>">
             
              <div class="form-group" style="margin-top: 20px;">
							<label for="name" class="control-label">Frågerubrik</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-question-circle fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="heading" id="heading" required="required" autofocus="autofocus" value="Redux App Structure - Where to place services / business logic?"/>
								</div>
							</div>
						</div>
              
           
            <div class="form-group">
							<label for="name" class="control-label">Text</label>
							<div class="cols-sm-10 addmargin">
								<div class="input-group">
									<span class="input-group-addon vertical-align-top"><i class="fa fa-file-text" aria-hidden="true"></i></span>
									<textarea style="height:300px" class="form-control" name="text" id="text" required="required" />
I'm writing my first Redux app and doing the initial rounds like choosing the boilerplate and understanding its structure. I've found a very good one called react-redux-starter-kit.

I'll need to write a notification client, fed by an API (in every X minutes it queries the API for notifications - it might be replaced by a websocket solution later). It won't have route specific visibility - it'll be always seen in the header bar. Considering the starter kit above, where would be the best to place its codebase? I'm coming from a Symfony2 world and I'd put the business logic in a class called Notification into a src/services folder:
									</textarea>
								</div>
							</div>
						</div>

            <div class="form-group">
                <label for="name" class="control-label">Taggar <span class="small">(mellanslag indigerar ny tagg, använd bindestreck för att binda samman)</span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="tags" id="tags" required="required" value="javascript redux directory-structure"/>
								</div>
							</div>
						</div>
                
            <div class="form-group text-center">
											<input type="submit" class="btn btn-orange autowidth" value="Skicka fråga och vänta på att få svar!">
										</div>
              
             </form>
          </div>
        </div>
      </div>      
    </div>
    
    
    
    <div class="col-sm-4" style=" margin:10px 0px;">
        
        <div class="panel panel-default">
            <div class="panel-body">
            <div class="mypanel" style="height: 698px;">
              
                <img src="../img/chewbacca-fathead.png" style="height: 695px; display:block; margin:0 auto;" >

            </div>
        </div>
       </div>
    </div>
</div>