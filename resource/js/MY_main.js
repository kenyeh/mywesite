
$(function(){
	//寫登入JS 上上下下左右左右AB
	var login_code=new Array(38,38,40,40,37,39,37,39,65,66);
    var now_code_key=0;
    
	$(window).keydown(function(event){
	    
	    if(event.keyCode==login_code[now_code_key])
	    {
	        now_code_key++;
	    }else
	    {
	        now_code_key=0;
	    }
	    
	    
	    if(now_code_key==10)
	    {
	    	document.getElementById("signin_id").focus();
	        $('#login_modal').modal('show');
	        
	    }
	    
	   
    });
    
    $("#btn_signin").click(function(){
        $('#login_modal').modal('hide');
	    var options = {'id' : $("#signin_id").val(),'pw' : $("#signin_password").val()};
        $.post(location.protocol+"//"+location.host+"/blog/login", options, function(data) {
            //alert(data);
            if(data==='success')
			{
			    window.location.reload();
			}else
			{
			    $('#login_alert').modal('show');
			}
        });
    });
    
    $("#Blog_signout_link").click(function(){
        
        $.post(location.protocol+"//"+location.host+"/blog/logout", {}, function(data) {
            //alert(data);
            window.location.reload();
        });
	    
    });
    
    $('.tip').tooltip();
    
    //--back to top 
    $("#btn_back_top").click(function (){
        $('html, body').animate({
            scrollTop: $("#Blog_index_link").offset().top
        }, 1000);
    });
    
});