function submitAjax(form)
{
	$.ajax({
		url: $(form).attr('action'),
		type: $(form).attr('method')
		//data: { type: $('subType').value, id: $('subId').value },
		//dataType: "json"
	})
		.done(function(msg) {
			$('#container').prepend(msg);
		});
}

function getTotalTime(sH, eH, sM, eM) {
	var t = (eH - sH) * 60 + (eM - sM);
	console.log(t);
	return t;
}

function pad2(number) {
	return (number < 10 ? '0' : '') + number
}