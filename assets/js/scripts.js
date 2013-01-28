
$(document).ready(function() {
	$(".menu-link").click(function() {
		$("body").toggleClass("body-lhs");
		$("nav .menu").toggle("");
		$("nav").toggleClass("nav-active");
		return false;
	});
});

