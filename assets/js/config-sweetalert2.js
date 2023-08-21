const flashData_success = $('.flashdata-success').data('flashdata');

if (flashData_success) {
	Swal.fire({
		title: 'Berhasil',
		text: flashData_success + '!',
		icon: 'success'
	});
}

const flashData_failed = $('.flashdata-failed').data('flashdata');

if (flashData_failed) {
	Swal.fire({
		title: 'Gagal',
		text: flashData_failed + '!',
		icon: 'error'
	});
}


$('.btn-delete').on('click', function(e){
	e.preventDefault();

	const text = $(this).data('text');
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Data " + text + " akan terhapus!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Batal',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});


$('.btn-delete-dettrans').on('click', function(e){
	e.preventDefault();

	const text = $(this).data('text');
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: text + " akan terhapus!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Batal',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});


$('.btn-status').on('click', function(e){
	e.preventDefault();

	// const status1 = $(this).data('status1');
	// const status2 = $(this).data('status2');
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Status Panen diubah! ",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Batal',
		confirmButtonText: 'Ubah Status!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

$('.btn-tolak').on('click', function(e){
	e.preventDefault();

	// const status1 = $(this).data('status1');
	// const status2 = $(this).data('status2');
	// const form = $(this).attr('form');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Status Panen ditolak! ",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Batal',
		confirmButtonText: 'Tolak!'
	}).then((result) => {
		if (result.value) {
			form.submit();
		}
	});
});


$('form #btn-ok').click(function(e) {
	let $form = $(this).closest('form');

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false,
	})

	swalWithBootstrapButtons.fire({
		title: 'Are you  sure?',
		text: "Check plz",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'OK',
		cancelButtonText: 'Cancel',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			swalWithBootstrapButtons.fire(
				'Finished',
				'Success',
				'success',
				);                     
			$form.submit();
		} else if (
			result.dismiss === Swal.DismissReason.cancel
			) {
			swalWithBootstrapButtons.fire(
				'Canceled',
				'Do corrections and then retry :)',
				'error'
				);
		}
	});

});