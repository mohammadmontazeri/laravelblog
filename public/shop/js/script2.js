$(document).ready(function(){
   
    $(window).resize(function(){
		var w=$(window).width();
		var h=$(window).height();
		$(".viewports").html(w+" * "+h);
 
    
})