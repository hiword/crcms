jQuery(document).ready(function( $ ) { 
		
		//Flexslider
		function flexslider() {
			$(".flexslider").flexslider({
				animation: "fade",
				animationSpeed: 250
			});

			$(".flex-next").html('<i class="icon-chevron-right"></i>');
			$(".flex-prev").html('<i class="icon-chevron-left"></i>');
		}

		flexslider();
		
		
		//Fitvid
		function fitvids() {
			$(".fitvid").fitVids();	
		}
		
		fitvids();
		
		
		//Infinite Scroll
		if ((custom_js_vars.infinite_scroll) == 'disabled') { } else { 
			$(".posts").infinitescroll({
			      loading: {
			          msgText: "...loading more posts...",
			          finishedMsg: "- All posts loaded -"
			      },
			      nextSelector: '.post-nav-right a',
			      navSelector: '.post-nav',
			      itemSelector: 'article',
			      contentSelector: '.posts',
			      appendCallback: true
			},function () { 
				fitvids();
				flexslider();
			});		
		}
			
		
		//Hidden Toggle
		$("#drawer-inside").hide();
		$("#drawer-toggle,#drawer-toggle2").toggle(function () {
		
		    $("#drawer-inside").slideToggle(300);
		    
		    //Change Icon
		    $(".icon-windows").attr('class', 'icon-remove-sign');
		   
		    return false;
		    
		}, function () {
		    
		    $("#drawer-inside").slideToggle(300);
		    
		    //Change Icon
		    $(".icon-remove-sign").attr('class', 'icon-windows');
		    
		    return false;
		});
		
			
		//Responsive Menu
		$(".nav").mobileMenu();
				
        $("select.select-menu").each(function(){
            var title = $(this).attr('title');
            if( $("option:selected", this).val() != ''  ) title = $("option:selected",this).text();
            $(this)
                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                .after('<span class="select">' + title + '</span>')
                .change(function(){
                    val = $("option:selected",this).text();
                    $(this).next().text(val);
                    })
        });
        
        
        //Custom BG
        if ($("body").hasClass("custom-background")) {
        	$("body").removeClass("fixed-bg");
        }
        
        
        //Detect Android
        var ua = navigator.userAgent.toLowerCase();
		var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
		if(isAndroid) {
			$("body.fixed-bg").addClass("android-bg");
		}
        
});