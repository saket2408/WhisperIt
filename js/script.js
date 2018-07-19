$(document).ready(function(){
    $("#likes").click(function(){
        $("#likes").text("Liked");
    });

    $(".delete").click(function(e){

        var response = confirm("Are you sure?");
     	
     	if(!response) {
     		e.preventDefault();
     	}	

    });

});