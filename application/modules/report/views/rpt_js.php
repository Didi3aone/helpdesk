<script>
	init_datepicker(".dates");

	$(".btns").on('click',function() {

		var start = $("#start").val();
		var end   = $("#end").val();
		var bagian = $("#bagian").val();
		if( start == "" || end == "" || bagian == "" || bagian == "0") {
			swal("Oops!!","All parameter is required","error");
		} else {
		var url = "<?= site_url("report/show_report"); ?>"+"?start_date="+start+ "&" +"end_date=" +end+ "&"+"bagian="+bagian;

			$("#bot").attr("href", url);
			// location.href = ;
		}
		// $.ajax({
		// 	url: 
		// 	type: 'GET',
		// 	success: function( data )
		// 	{
		// 		location.href
		// 	}
		// })
	});

	$(".btni").on('click',function() {

		var start = $("#start").val();
		var end   = $("#end").val();
		var bagian = $("#bagian").val();
		if( start == "" || end == "" || bagian == "") {
			swal("Oops!!","All parameter is required","error");
		} else {
		var url = "<?= site_url("report/show_excel"); ?>"+"?start_date="+start+ "&" +"end_date=" +end+ "&"+"bagian="+bagian;

			$("#boti").attr("href", url);
			// location.href = ;
		}
	});
</script>