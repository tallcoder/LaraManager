$(function() {

	$('#create_project').validate({
		rules: {
			name: {required:true},
			client_name: {required:true},
			budget: {min: "0", max: "500001"},
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

    tinymce.init({selector:"textarea.tiny"});

    $('.timer-btn').click(function() {
        var x = new Date();
	      var sH; var sM; var eH; var eM;
	    if($('input[name="start_time"]').val() == "" || $('input[name="stop_time"]').val() == "") {
		    if($('input[name="start_time"]').val() == "") {
			    $('input[name="start_time"]').val(x.getHours() + ":" + pad2(x.getMinutes()));
			    localStorage.sH = x.getHours(); localStorage.sM = x.getMinutes();
		    }
		    else {
			    $('input[name="stop_time"]').val(x.getHours() + ":" + pad2(x.getMinutes()));
			    eH = x.getHours(); eM = x.getMinutes();
			    $('input[name="time"]').val(getTotalTime(localStorage.sH, eH, localStorage.sM, eM));
		    }
	    }
	    return false;
    });

	function getTotalTime(sH, eH, sM, eM) {
		var t = (eH - sH) * 60 + (eM - sM);
		console.log(t);
		return t;
	}

	function pad2(number) {
		return (number < 10 ? '0' : '') + number
	}
});