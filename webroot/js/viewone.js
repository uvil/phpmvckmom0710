
$(function() {
    $(".addcomment").click(function(){
        
        shown = $(".display-field");
        next  = $(this).next(".comment-field-div");
        
        //console.log(shown);
        
        if(shown.is(next))
        {
            shown.toggleClass("display-field");
        }
        else
        {
            shown.removeClass("display-field");
            next.addClass("display-field");
            next.children('textarea').focus();
        }
        
            //obj.removeClass('display-field');
             
       
    });
});