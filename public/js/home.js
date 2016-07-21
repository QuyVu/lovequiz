$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

$('button#accept').click(function() {
	makeDecision('accept');
});

$('button#deny').click(function() {
	makeDecision('deny');
});

function makeDecision(choice) {
	$.ajax({
		type : "POST",
		url : "quiz/decide",
		timeout : 100000,
		data : {
			decision : choice
		},
		success : function(result) {
		},
		error : function(result) {
			alert(result);
		}
	});
	window.location.reload();
}

$('button#continue').click(function() {
	window.location.href = '/quiz/playing';
});

$('button#new').click(function() {
	$.ajax({
		type : "POST",
		url : "create-new",
		timeout : 100000,
		success : function(result) {
		},
		error : function(result) {
			alert(result);
		}
	});
	window.location.href = '/';
});