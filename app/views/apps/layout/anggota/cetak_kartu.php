<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cetak Nomor Anggota</title>
  	<link rel="stylesheet" href="<?php echo base_url() ?>resources/backend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/backend/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/backend/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/backend/dist/css/toastr.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/backend/dist/css/skins/_all-skins.min.css">
</head>
<body>
<div class="panel panel-heading">
<table class="table table-condensed">
	<thead>
		<tr>
		<td colspan="1" style="text-align: center; border-bottom: 3px solid #1b809e;">
		<img src="<?php echo base_url() ?>resources/images/logoperpus.png">
		</td>

		<td colspan="3" style="border-bottom: 3px solid #1b809e;">
			<h5 style="font-weight: bold;font-size:14px;box-sizing: border-box;width: 150px;height:100px;
		    padding-top:10px;">KARTU ANGGOTA
		PERPUSTAKAAN
		 <br>
		PODOROTO KESAMBEN JOMBANG
		<br>
		<br>
		</h5>
		<p style="font-size: 12px">Jl Raya Pasar Garu No.1 Telp 0321 - 533 853</p>
		</td>
		</tr>
	</thead>
	<br>
	<tbody>
		<tr>
		<td style="box-sizing: border-box;
		    width: 150px;
		    height: 100px;
		    padding: 5px;
		    ">No
		<br>Nama Anggota
		<br>Alamat Lengkap			
		</td>
		<td colspan="2" style="box-sizing: border-box;
		    width: 150px;
		    height: 100px;
		    padding: 5px;">: <?php echo $detail_anggota['no_anggota'] ?>
		<br>
		: <?php echo $detail_anggota['nama_lengkap'] ?>
		<br>
		: <?php echo $detail_anggota['alamat'] ?>
		<br>
		<!-- <img style="width:50px; height:50px" src="<?php echo base_url() ?>resources/images/anggota/<?php echo $detail_anggota['foto'] ?>"> -->
		</td>
		<td style="box-sizing: border-box;
		    width: 300px;
		    height: 100px;
		    padding: 5px;
		    font-size: 10px">
			<ol>
			<h5 style="font-weight: bold; font-size: 14px">PERHATIAN</h5> 
				<li>Kartu ini diterbitkan oleh Perpustakaan Desa Podoroto Kesamben Jombang, Segala penggunaan kartu diatur oleh Perpustakaan Desa Podoroto sesuai ketentuan dan syarat yang berlaku.</li>
				<li>
					Kartu Anggota ini tidak boleh dialih pinjamkan.
				</li>
				<li>
					
				Bila menemukan kartu ini mohon dikembalikan ke Perpustakaan Desa Podoroto.

				</li>
			</ol>
		</td>
		</tr>
	</tbody>
	<tfoot class="table table-condensed">
		<tr>
    		<th colspan="4" style="text-align: center; 
    			border: 2px solid #1b809e;
			    padding: 10px;
			    border-radius: 25px;
			    "><span style="background-color : #ce4844;">www.perpustakaan.podoroto.desa.id</span></th>
    	</tr>
	</tfoot>
</table>
</div>
</body>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>resources/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>resources/backend/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>resources/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>resources/backend/plugins/fastclick/fastclick.js"></script>
<!-- Highcharts -->
<script src="<?php echo base_url() ?>resources/backend/dist/js/highcharts.js"></script>
<script src="<?php echo base_url() ?>resources/backend/dist/js/exporting.js"></script>
<script src="<?php echo base_url() ?>resources/backend/dist/js/visitor.js"></script>
<!-- CKeditor -->
<script src="<?php echo base_url() ?>resources/backend/plugins/ckeditor/ckeditor.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>resources/backend/dist/js/app.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url() ?>resources/backend/dist/js/toastr.min.js"></script>
<script src="<?php echo base_url() ?>resources/backend/dist/js/ajax_validation.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>resources/backend/dist/js/demo.js"></script>
</html>
