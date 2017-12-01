$(document).ready(function() {
		$("#hide").click(function(){
			$("img").hide(500,function(){alert("Đã ẩn")});
		});
		$("#show").click(function(){
			$("img").show(500);
		});
		$("#toggle").click(function(){
			$("img").toggle(500);
		});
});