$(document).ready(function() {
	
	$(".register-form,.overlay,.login-form,.search-form").hide();
	
    $(".register").click(function(){
		$(".register-form,.overlay").show();
	});
	
	    $(".close,.close-btn").click(function(){
		$(".register-form,.overlay").hide();
        
	});
	    $(".login").click(function(){
		$(".login-form,.overlay").show();
	});
	
	    $(".close,.close-btn").click(function(){
		$(".login-form,.overlay").hide();
	});
	 $(".search").click(function(){
		$(".search-form").toggle();
	});

  $('.parent-list').click(function(){
       $(".sub-menu-sidebar").slideToggle("slow");
  });

  $('.main-menu').slicknav();

});



