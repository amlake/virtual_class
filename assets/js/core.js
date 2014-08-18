$(document).ready(function() { 
/*place jQuery actions here*/
	var link = "<?php echo base_url();?>/index.php/"; // Url to your application (including index.php/)

	$("div.student form").submit(function() {
        // Get the product ID and the quantity 

        var firstname = $(this).find('input[name=firstname]').val();
         
        alert('First name:' + firstname);
         
        //return false; // Stop the browser of loading the page defined in the form "action" parameter.
    });
 
});