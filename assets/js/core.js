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

	$('body').on('click', '.dropdown-menu li', function(e) {
		var baseurl = window.location.protocol + "//" + window.location.host + "/";
		var pathArray = window.location.pathname.split( '/' );
		var newPathname = "";
		for (i = 0; i < pathArray.length-2; i++) {
		  newPathname += "/";
		  newPathname += pathArray[i];
		}
		newPathname += "/enroll/";
		var newURL = baseurl + newPathname;

		$.post(newURL, {
			 id: e.currentTarget.id,
			 studentid: e.currentTarget.title
		},
		function(result){
			$("#dropdownMenu1").addClass("alert alert-success");
			$("#dropdownMenu1").text("Course added!");
			console.log("RESULT: " + result);
		})
    });

    $('body').on('click', '.update-student', function(e) {
		var baseurl = window.location.protocol + "//" + window.location.host + "/";
		var pathArray = window.location.pathname.split( '/' );
		var newPathname = "";
		for (i = 0; i < pathArray.length-2; i++) {
		  newPathname += "/";
		  newPathname += pathArray[i];
		}
		newPathname += "/edit_student/";
		var newURL = baseurl + newPathname;

		// must prevent form from being submitted
		e.preventDefault();
		// console.log($('#studentid').val())

		$.post(newURL, {
			 studentid: $('#studentid').val(),
			 firstname: $('#firstname').val(),
			 middlename: $('#middlename').val(),
			 lastname: $('#lastname').val()
		},
		function(result){
			var json = JSON.parse(result);
			$("#success").addClass("alert alert-success");
			$("#success").text('Updated: ' + json.firstname + ' ' + json.middlename + ((json.firstname==='') ? '' : ' ') + json.lastname);
			//console.log("RESULT: " + result);
			//console.log("firstname: " + json.firstname);
		})

		return false;

    });
});

