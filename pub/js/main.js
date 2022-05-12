$(document).ready(function() {
	$('#username').select();

	$('#previewsubmit').click( function () {
		$( "#formcomment" ).submit();
	});
	$('#sort').on('change', function () {
		var selected = $('#sort option:selected').val();
		$.ajax({
			url: '/testimonials/sort/',
			type: 'post',
			data: { sort: selected},
			dataType: 'json',
			success: function(data) {
				$('#sortlist').html(data.sortview);
			},
			error: function(data, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

	$('#preview').click( function () {
		var input = $('#username')[0];
		if (input.checkValidity() === false){
			input.reportValidity();
			return;
		}
		input = $('#phone')[0];
		if (input.checkValidity() === false){
			input.reportValidity();
			return;
		}
		input = $('#email')[0];
		if (input.checkValidity() === false){
			input.reportValidity();
			return;
		}
		input = $('#comment')[0];
		if (input.checkValidity() === false){
			input.reportValidity();
			return;
		}
		$.ajax({
				url: '/testimonials/preview/',
				type: 'post',
				data: $("#formcomment").serialize(),
				dataType: 'json',
				success: function (data) {
					$('#commentform').toggleClass('d-none');
					$('#commentpreview .comment-body').html(data.preview);
					$('#commentpreview').toggleClass('d-none');
				},
				error: function (data, textStatus, errorThrown) {
					alert(errorThrown);
				}
		});
	});

	$('#back').click( function () {
		$('#commentform').toggleClass('d-none');
		$('#commentpreview').toggleClass('d-none');
	});

	$('#phone').on('input', function () {

		var matrix = this.placeholder,
			i = 0,
			def = matrix.replace(/\D/g, ""),
			val = this.value.replace(/\D/g, "");

		def.length >= val.length && (val = def);
		matrix = matrix.replace(/[_\d]/g, function(a) {
			return val.charAt(i++) || "_"
		});
		this.value = matrix;
		i = matrix.lastIndexOf(val.substr(-1));
		i < matrix.length && matrix != this.placeholder ? i++ : i = matrix.indexOf("_");
		this.focus();

		if (this.setSelectionRange) {
			this.setSelectionRange(i, i);
		} else if (this.createTextRange) {
			var range = this.createTextRange();
			range.collapse(true);
			range.moveEnd("character", i);
			range.moveStart("character", i);
			range.select()
		}

	});

	var picture = $('#picture');
	picture.on('change', function() {
		var fileToUpload = picture[0].files[0];
		if(picture[0].files.length != 0) {
			var objfileToUpload = URL.createObjectURL(fileToUpload);
			$('#thumbnail').html('<img class="" src="' + URL.createObjectURL(fileToUpload) + '" alt="Picture">')
			$('#pictureTmp').val(objfileToUpload);
			$('#filename').html(fileToUpload.name);
			$('#fileclear').css('display', 'block');
		}
	});
	$('#fileclear').click( function (e) {
		e.preventDefault();
		$('#picture').val('');
		$('#pictureTmp').val('');
		$('#thumbnail').html('')
		$('#filename').html('Файл не выбран');
		$('#fileclear').css('display', 'none');
	});
});