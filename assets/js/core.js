$(document).ready(function() { 
/*place jQuery actions here*/
	$('#popover').popover({ 
	    html : true,
	    //trigger: 'hover',
	    title: function() {
	      return $("#popover-head").html();
	    },
	    content: function() {
	      return $("#popover-content").html();
	    }
	});


	//below code is only relevant if we're in the student/view/<student_id> view
	var baseurl = window.location.protocol + "//" + window.location.host + "/";
	var pathArray = window.location.pathname.split( '/' );
	var newPathname = "";
	for (i = 0; i < pathArray.length-2; i++) {
	  newPathname += "/";
	  newPathname += pathArray[i];
	}
	newPathname += "/enroll/";
	var newURL = baseurl + newPathname;
	var studentid =  pathArray.length-1;
	//

	$('body').on('click', '.dropdown-menu li', function(e) {
		$.post(newURL+studentid, {
			 id: e.currentTarget.id,
			 name: e.currentTarget.title
		},
		function(result, status){
				console.log("RESULT: " + result);
				console.log("STATUS: " + status);
		})
    });
});

