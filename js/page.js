$(document).ready(function() {
	var index;
	var Renkler = ["#2098d1","#ff731f","#e1201a","#ac26c0"];
	$(".sayfa:gt(0)").hide();
	$(".menu").click(function(event) {
		index = $(this).index();
		$(".sayfa").hide();
		$(".menu").css('background-color','rgba(17, 139, 100, 0.68)')
		$(".menu:eq("+(index-1)+")").css('background',Renkler[(index-1)]);
		$("#"+index).slideDown(500);

	});
	
	var optimize = function(){
		
		var width = $(window).width();
			$(".sayfa").each(function(index,el){
				var style = $(".sayfa:eq("+index+")").attr('style');
			if(width<1000){

			$(".sayfa:eq("+index+")").addClass('panel').addClass('panel-body').addClass('shadow');
			$(".sayfa").children('.shadow').removeClass('panel').removeClass('panel-body').removeClass('shadow');
		}else{
			$(".sayfa:eq("+index+")").removeClass('panel').removeClass('panel-body').removeClass('shadow');			
			$(".sayfa:eq("+index+")").children('div:eq(0)').addClass('panel').addClass('panel-body').addClass('shadow').removeAttr('style');
		}
			});
		
	}
	setInterval(optimize,100);
});