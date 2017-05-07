$(document).ready(function () {	
	//Обработка брони номера
	$("form").submit(function () {
		// Получение ID формы
		var formID = $(this).attr('id');
		// Добавление решётки к имени ID
		var formNm = $('#' + formID);
		$.ajax({
			type: "POST",
			url: '/room-reserve.php',
			data: formNm.serialize(),
			success: function (data) {
				// Вывод текста результата отправки
				$(formNm).html(data);
			},
			error: function (jqXHR, text, error) {
				// Вывод текста ошибки отправки
				$(formNm).html(error);
			}
		});
		return false;
	});
});