$(function () {
	scrollModule.init();
});

/**
 * Module scrollToTopModule implement Revealing Module Pattern
 */
var scrollModule = (function () {
	var scrollToTopElement = $(".scrollToTop");
	var OFFSET = 400;

	var init = function () {
		windowScrollEventListener();
		scrollToTopEventListener();
	};

	// Check to see if the window is top if not then display button
	var windowScrollEventListener = function () {
		$(window).scroll(function () {
			($(this).scrollTop() > OFFSET) ? scrollToTopElement.fadeIn() : scrollToTopElement.fadeOut();
		});
	};

	// Click event to scroll to top
	var scrollToTopEventListener = function () {
		scrollToTopElement.on("click", function () {
			$("html,body").animate({scrollTop: 0}, 'slow');
			return false;
		});
	};

	return {
		init: init
	};
})();



/*********** *********** Authentication *********** ***********/
$(function () {
	$('#loginForm').submit(function (event) {
		loginAction($(this));
		event.preventDefault();
	});

	$('#registerForm').submit(function (event) {
		registerAction($(this));
		event.preventDefault();
	});

	$('#resetPasswordForm').submit(function (event) {
		resetPasswordAction($(this));
		event.preventDefault();
	});

	// Toggle tag register
	$('.help-block a[href="#register"]').click(function () {
		$('.nav-tabs a[href="#register"]').tab('show');
		return false;
	});

	// Toggle tag reset password
	$('.help-block a[href="#resetpassword"]').click(function () {
		$('.nav-tabs a[href="#resetpassword"]').tab('show');
		return false;
	});
});

function loginAction($form) {
	var $btnSubmit = $('#loginBtnSubmit').button('loading');
	var $errorMessage = $form.find('.text-danger');

	$.ajax({
		url: $form.attr('action'),
		type: $form.attr('method'),
		dataType: 'json',
		data: $form.serialize()
	}).done(function (data) {
		// similar behavior as an HTTP redirect
		window.location.replace(data.redirect);
	}).fail(function (data) { // catch HttpResponseException
		var $response = data.responseJSON;

		$.each($response, function (i, value) {
			$errorMessage.html(value);
		});
		$btnSubmit.button('reset');
	});
}

function registerAction($form) {
	var $btnSubmit = $('#registerBtnSubmit').button('loading');
	var $message = $form.find('.text-danger');

	$.ajax({
		url: $form.attr('action'),
		type: $form.attr('method'),
		dataType: 'json',
		data: $form.serialize()
	}).done(function (data) {
		$message.html(data.message);
	}).fail(function (data) { // catch HttpResponseException
		var $response = data.responseJSON;

		$.each($response, function (i, value) {
			$message.html(value);
		});
		$btnSubmit.button('reset');
	});
}

function resetPasswordAction($form) {
	var $btnSubmit = $form.find('.btn-info').button('loading');
	var $message = $form.find('.text-danger');

	$.ajax({
		url: $form.attr('action'),
		type: $form.attr('method'),
		dataType: 'json',
		data: $form.serialize()
	}).done(function (data) {
		$message.html(data.message);
		$btnSubmit.button('reset');
	}).fail(function (data) { // catch HttpResponseException
		var $response = data.responseJSON;

		if ($response.email) {
			$message.html($response.email[0]);
		} else if ($response.message) {
			$message.html($response.message);
		}
		$btnSubmit.button('reset');
	});
}