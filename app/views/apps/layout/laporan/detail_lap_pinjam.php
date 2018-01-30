
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
<?php echo $title ?>
<small>Web Applications</small>
</h1>
</section>
<div class="content">
<div class="box box-success">
<div class="row">
<?php
$attributes = array('id' => 'frm_login');
echo form_open_multipart('apps/laporan/download_r_pinjam?source=header&utf8=✓', $attributes)
?>
<!-- Layout Buku -->
<div class="col-md-4">
<div class="box-header with-border">
<div class="row" style="padding-top: 10px">
<div class="col-md-6">
<!-- /.box-header -->
<div class="form-group">
<label><i class="fa fa-calendar margin-r-5"></i> Tanggal Awal</label>
<input style="border-radius: 0px" type="date" class="typeahead form-control" name="tgl_awal" required="required">
</div>
<hr>
</div>
</div>
</div>
</div>
<!-- Layout Anggota -->
<div class="col-md-4">
<div class="box-header with-border">
<div class="row" style="padding-top: 10px">
<div class="col-md-6">
<div class="form-group">
<label><i class="fa fa-calendar margin-r-5"></i> Tanggal Akhir</label>
<input type="date" class="form-control" name="tgl_akhir" required="required">
</div>
<hr>
</div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="box-header with-border">
<div class="row" style="padding-top: 10px">
<div class="col-md-6">
<div class="form-group">
<label><i class="fa fa-calendar margin-r-5"></i>Cetak Data Peminjam</label>
<div class="submit">
<button type="submit" class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-download"></i> Download</button>
</div>
</div>
</div>
</div>
</div>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>