$('#subscribe button').click(function(e) {
	submitAjax($('#subscribe'));
	e.preventDefault();
});

$('#complete button').click(function(e) {
	submitAjax($('#complete'));
	e.preventDefault();
});

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

$('#deleteTask').submit(function(e) {
	e.preventDefault();
	if(window.confirm('Are you SURE you want to delete this task?'))
	{	submitAjax($(this), false); }
});

$('th').click(function() {
	$('tr.description').hide();
});