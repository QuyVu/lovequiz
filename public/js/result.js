$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

$('button#go-home').click(function() {
	window.location.href = '/';
});

$('button#create-new').click(function() {
	$.ajax({
		type : "POST",
		url : "/create-new",
		timeout : 100000,
		success : function(result) {
		},
		error : function(result) {
			alert(result);
		}
	});
	window.location.href = '/';
});