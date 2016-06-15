$(function() {

	$('.coupon').on('click', '.use-coupon-link', function(e) {
		e.preventDefault();

		var $this = $(this);
		var id = $this.attr('data-id');
		//var url = Frooji.getUseCouponPopup;
		var url = '/products/get-coupon-popup/'+id;
		var $promise = $.ajax({
			url: url,
			type: 'get',
			beforeSend: function() {
				//$table_wrapper.find('.full-screen-loader').show();
			}
		});

		$promise.done(function(response) {

			var template = response.template;
			//$table_wrapper.find('.table-responsive').html(template);
		});

		$promise.fail(function(response) {
			//$table_wrapper.find('.full-screen-loader').hide();
		});

		$promise.always(function(response) {
			//$table_wrapper.find('.full-screen-loader').hide();
		});
	});

});

// alert message popup.
function alertBox(message, callback) {
    
    if($.isEmptyObject(callback)) {
        // add modal-open class to body when any modal open.
        var callback = checkOpenModal();
    }
    var title = Frooji.alert_title;
    var okBtn = Frooji.ok_btn;
    var data = bootbox.dialog({
        message: message,
        title: title,
        buttons: {
            ok: {
                label: okBtn,
                className: "btn-success",
                callback: callback
            }
        }
    });
}

function checkOpenModal() {
    setTimeout(function() {
        
        // add modal-open class to body when any modal open.
        if($('.modal.in').length > 0) {
            $('body').addClass('modal-open');
        }
    }, 500);
}

function confirmBox(message, okCallback, cancelCallback, title) {

	if(title == " " || title == null) {
		title = Frooji.confirm_title;
	}

	var okBtn = Frooji.ok_btn;
	var cancelBtn = Frooji.cancel_btn;
	var data = bootbox.dialog({
		message: message,
		title: title,
		buttons: {
			ok: {
				label: okBtn,
				className: "btn-success",
				callback: okCallback
			},
			cancel: {
				label: cancelBtn,
				className: "btn-default",
				callback: cancelCallback
			}
		}
	});
}
