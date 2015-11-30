$(document).ready(function() {

	$("#getlasttwentyfive").click(function() {
		
		var $this = $(this);
    	$this.button('loading'); //set button to disabled

		var successFunction = function($x) {
			if($x == 1){
				console.log($x);
				$("#getlasttwentyfive").notify(
					"Wahoo! It worked!", 
				 	{ position:"bottom left", className: 'success' }
				); //alert success
			} else{
				$("#getlasttwentyfive").notify(
					"Ruh oh. Something went wrong.", 
			 		{ position:"bottom left", className: 'error' }
				); //alert fail
			}
		}
		var errorFunction = function(){
			$("#getlasttwentyfive").notify(
				"Ruh oh. Something went wrong.", 
			 	{ position:"bottom left", className: 'error' }
			); //alert fail
		}
		var alwaysFunction = function(){
			$this.button('reset'); //reset button to its original status once ajax is done
		}

		var promise = $.ajax({
		  url: "/getcommits/last/25"
		}); //call ajax ws to get last 25 commits
		  
		promise.done(successFunction);
		promise.fail(errorFunction);
		promise.always(alwaysFunction);
	});
});