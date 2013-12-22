$(function() {

	$('#create_project').validate({
		rules: {
			name: {required:true},
			client_name: {required:true},
			budget: {min: "0", max: "50001"},
			description: {required:true}
		},
		messages: {
			name: "Please name the project!",
			client_name: "Please enter the client's name!",
			budget: "Please give a budget less than 50000!",
			description: "Please give the project a description!"
		}
	});

	$('#new_user').validate({
		rules: {
			password: {minlength: 6},
			email: {email:true, required:true}
		},
		messages: {
			password: "We don't know what your password is, but it must be at least 6 characters long!",
			email: "Please enter your email address"
		}
    });

    $('#timer').click(function() {
        console.log('clicked');
        var x = new Date();
        if($('input[name="start_time"]').val() == "") {
            $('input[name="start_time"]').val(x.getHours() + ":" + x.getMinutes());
        }

        else {
            var x = new Date();
            $('input[name="stop_time"]').val(x.getHours() + ":" + x.getMinutes());
        }
    });
});