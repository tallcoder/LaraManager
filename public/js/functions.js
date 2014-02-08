function submitSubscription(form)
{
	$.ajax({
		url: $(form).attr('action'),
		type: $(form).attr('method')
		//data: { type: $('subType').value, id: $('subId').value },
		//dataType: "json"
	})
		.done(function(msg) {
			$('#container').prepend(msg);
			$('#subscribe button').text('Subscribed');
		});
}
