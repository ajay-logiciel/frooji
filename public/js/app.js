$(function() {

	$('body').on('hidden.bs.modal', '.modal', function () {
	  	$(this).removeData('bs.modal');
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
