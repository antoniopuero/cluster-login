(function (document, window, $) {
	var container = $('#container');
	var renderActionRows = function (fileList) {
		var html = '';
		$.each(fileList, function (i, filename) {
			var login = filename.split('+')[0];
			html += App.Templates.actionRow({
				filename: filename,
				login   : login
			});
		});
		return html;
	};
	var renderTable = function (fileList) {
		var html = App.Templates.userList({renderRows: renderActionRows, userList: fileList});
		container.html(html);
	};

	$.ajax({
		url: './rest/users_list.php',
		type: 'GET',
		dataType: 'json',
		success: renderTable,
		error: function () {
			console.log('error');
		}
	});

	var removeInfoRow = function (login) {
		if (typeof login === "string") {
			$('[data-for=' + login + ']').detach();
		} else if (login.detach) {
			login.detach();
		}
	};

	var gotSomeTroubles = function (data) {
		alert("Huston, we got a problem with connection");
		console.log(data);
	};

	container.delegate('.get-info .btn', 'click', function (e) {

		var self = $(this),
			closestRow = self.closest('tr'),
			filename = closestRow.data('file');

		if (self.hasClass('btn-warning')) {
			self.removeClass('btn-warning').addClass('btn-info');
			removeInfoRow(closestRow.next('.user-additional-info'));
		} else {

			container.find('.get-info .btn').removeClass('btn-warning').addClass('btn-info');
			removeInfoRow(container.find('.user-additional-info'));

			$.ajax({
				url: './rest/user_information.php',
				type: 'post',
				data: {
					filename: filename
				},
				dataType: 'json',
				success: function (data) {
					var newTable = App.Templates.userInform(data);
					closestRow.after(newTable);
					self.removeClass('btn-info').addClass('btn-warning');
				},
				error: gotSomeTroubles
			});
		}

	});

	container.delegate('.delete-user .btn', 'click', function (e) {

		var self = $(this),
			closestRow = self.closest('tr'),
			filename = closestRow.data('file');
		if (confirm("Are you 100% sure?")) {

			$.ajax({
				url: './rest/delete_user.php',
				type: 'post',
				data: {
					filename: filename
				},
				dataType: 'text',
				success: function (data) {
					console.log(data);
					removeInfoRow(closestRow.data('login'));
					removeInfoRow(closestRow);
				},
				error: gotSomeTroubles
			});

		}

	});

	container.delegate('.add-user .btn', 'click', function (e) {

		var self = $(this),
			closestRow = self.closest('tr'),
			login = closestRow.data('login'),
			dataFields = $('[data-for=' + login + '] input'),
			result = {filename: closestRow.data('file')};
		dataFields.each(function () {
			result[this.name] = this.value;
		});
		$.ajax({
			url: './rest/add_user.php',
			type: 'post',
			data: result,
			dataType: 'text',
			success: function (data) {
				console.log(data);
				removeInfoRow(login);
				removeInfoRow(closestRow);
			},
			error: gotSomeTroubles
		});

	});
})(document, window, jQuery);
