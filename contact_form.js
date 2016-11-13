$(document).ready(function() {
	$("#submit").click(function() {
	var name = $("#name").val();
	var email = $("#email").val();
	var message = $("#message").val();
	$("#returnmessage").empty();
	if (name == '' || email == '' || message =='') {
		alert("All fields required !");
	} else {
		$.post("contact_form.php", {
			name1: name,
			email1: email,
			message1: message
		}, function(data) {
			$("#returnmessage").append(data);
			if (data == "Your message has been sent !") {
				$("#form")[0].reset();
			}
		});
	}
	});
});