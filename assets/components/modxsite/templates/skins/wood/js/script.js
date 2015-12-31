jQuery.fn.equalHeights = function() {
	var currentTallest = 0;
	jQuery(this).each(function(){
		if (jQuery(this).height() > currentTallest) { currentTallest = jQuery(this).height(); }
	});
	jQuery(this).css({'min-height': currentTallest});
	return this;
};

$(document).ready(function(){
	alertify.set('notifier', 'position', 'top-right');

	$('.send_callorder').on('click',function(){
		var f=$(this).parent().parent().find('form');
		$.ajax({
			url: 'ajax',
			type: "post",
			data: f.serialize(),
			dataType:'json',
			success: function (data) {
				if(data.success){
					alertify.notify('Ваше сообщение отправлено.','success',3);
					f.trigger("reset");
					f.find('input').parent().removeClass('has-danger');
					$('#callorder').modal('hide');
				}
				else{
					f.find('input').parent().removeClass('has-danger');
					data.errors.forEach(function(e){
						f.find('input[name="'+ e.id+'"]').parent().addClass('has-danger');
					});
				}
			},
		});
		return false;
	});
});