<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Histori Cuaca
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-tambah-data" data-mode="tambah"><i class="fa fa-plus"></i> Tambah Data</button>
					</span>
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="dp-awal" id="dp-awal" placeholder="Tanggal Awal">
									<span class="input-group-addon">To</span>
									<input type="text" class="form-control dpd2" name="dp-akhir" id="dp-akhir" placeholder="Tanggal Akhir">
								</div>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<button type="button" class="btn btn-primary" id="btn-cari-data"><i class="fa fa-search"></i> Cari</button>
							</section>
						</div>
					</div>
					<hr>
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-cuaca">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Event</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Tanggal</th>
									<th>Event</th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>

<div class="modal fade " id="mdl-tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Cuaca</h4>
			</div>
			<div class="modal-body">
				<form id="frm-tambah-data" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" name="aksi" id="aksi" value="<?php echo e_url('modules/controller/data/histori_cuaca.php'); ?>">
					<input type="hidden" class="form-control" name="apa" id="apa" value="tambah-cuaca">
					<div class="form-group">
						<input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tanggal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="maxtemp" name="maxtemp" placeholder="Suhu Maksimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="meantemp" name="meantemp" placeholder="Suhu Rata - Rata">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="mintemp" name="mintemp" placeholder="Suhu Minimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="dewpoint" name="dewpoint" placeholder="Suhu Titik Pengembunan (Dew Point)">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="meandew" name="meandew" placeholder="Rata - Rata Suhu Titik Pengembunan">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="mindew" name="mindew" placeholder="Suhu Titik Pengembunan Minimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="maxhumid" name="maxhumid" placeholder="Kelembaban Maksimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="meanhumid" name="meanhumid" placeholder="Kelembaban Rata - Rata">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="minhumid" name="minhumid" placeholder="Kelembaban Minimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="maxsealevel" name="maxsealevel" placeholder="Ketinggian Permukaan Air Laut Maksimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="meansealevel" name="meansealevel" placeholder="Rata - Rata Ketinggian Permukaan Air Laut">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="minsealevel" name="minsealevel" placeholder="Ketinggian Permukaan Air Laut Minimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="maxvisibility" name="maxvisibility" placeholder="Jarak Pandang Maksimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="meanvisibility" name="meanvisibility" placeholder="Rata - Rata Jarak Pandang">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="minvisibility" name="minvisibility" placeholder="Jarak Pandang Minimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="maxwind" name="maxwind" placeholder="Kecepatan Angin Maksimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="meanwind" name="meanwind" placeholder="Rata - Rata Kecepatan Angin">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="maxgust" name="maxgust" placeholder="Kecepatan Hembusan Angin Maksimal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="precip" name="precip" placeholder="Curah Hujan">
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="cloudcover" name="cloudcover" placeholder="Sebaran Awan">
					</div>
					<div class="form-group">
						<select class="form-control" id="event" name="event">
							<option value="1">Cerah</option>
							<option value="2">Hujan</option>
							<option value="3">Berawan / Badai Petir</option>
							<option value="4">Hujan Disertai Badai Petir</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control number" id="winddirection" name="winddirection" placeholder="Arah Angin (Dalam Derajat)">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan">Simpan Data</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade " id="mdl-detail-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Detail Data Cuaca</h4>
			</div>
			<div class="modal-body">
				<table class="display table table-bordered table-striped" id="tabel-detail">
					<thead>
						<tr>
							<th>Parameter</th>
							<th>Value</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
					<tfoot></tfoot>
				</table>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		$('.number').number(true,0,'.');
        $('#dp-awal').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$('#dp-akhir').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$('#tgl').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
	};
	
	function showDetailCuaca(id){
		$.ajax({
			url: "./",
			method: "POST",
			cache: false,
			data: {"aksi":"<?php echo e_url('modules/controller/data/histori_cuaca.php'); ?>", "apa":"get-detail", "id":id},
			success: function(html){
				$('#tabel-detail tbody').empty();
				$('#tabel-detail tbody').append(html);
				console.log(html);
			},
			error: function(err){
				console.log("HTML error in request: " + err);
				alert('Gagal terkoneksi dengan server..');
			}
		});
	};
	
	var tabelcuaca = $('#tabel-cuaca').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/data/histori_cuaca.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-cuaca"});
            aoData.push({"name": "tglAwal", "value": $('#dp-awal').val()});
            aoData.push({"name": "tglAkhir", "value": $('#dp-akhir').val()});
        }
    });
	
	$('#btn-cari-data').click(function(ev){
		tabelcuaca.fnReloadAjax();
	});
	
	$('#btn-tambah-data').click(function(ev){
		ev.preventDefault();
		$('#mdl-tambah-data').modal();
	});
	
	$('#tabel-cuaca').on('click', '#btn-show-detail', function(ev){
		ev.preventDefault();
		$('#mdl-detail-data').modal();
		var id = $(this).data('id');
		showDetailCuaca(id);
	});
	
	$('#btn-simpan').click(function(ev){
		ev.preventDefault();
		var formData = $('#frm-tambah-data').serialize();
		
		if (confirm('Simpan data ?')) {
			$('#btn-simpan').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: formData,
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
					} else {
						alert(eve.msg);
					}
					$('#btn-simpan').removeClass('disabled').html('Simpan Data');
				},
				error: function(err){
					console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
					alert('Gagal terkoneksi dengan server..');
				}
			});
		}
	});
	
	$('#tabel-cuaca').on('click', '#btn-hapus-data', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		
		if (confirm('Hapus data ?')) {
			$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i>');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi":"<?php echo e_url('modules/controller/data/histori_cuaca.php'); ?>", "apa":"hapus-cuaca", "id":id},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						tabelcuaca.fnReloadAjax();
					} else {
						alert(eve.msg);
					}
				},
				error: function(err){
					console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
					alert('Gagal terkoneksi dengan server..');
				}
			});
		}
	});
	
});
</script>