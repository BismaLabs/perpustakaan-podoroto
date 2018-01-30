<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<?php echo $title  ?>
			<small>Web Applications</small>
		</h1>
	</section>

	<div class="content">
        <div class="row">
            <div class="col-lg-4 col-xs-8">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><i class="fa fa-file-excel-o"></i></h3>

                        <p>Laporan Data Anggota</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo base_url() ?>apps/laporan/download_r_anggota/" class="small-box-footer">Cetak Data <i class="fa fa-download"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-8">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><i class="fa fa-file-excel-o"></i></h3>

                        <p>Laporan Data Buku</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo base_url() ?>apps/laporan/download_r_buku" class="small-box-footer">Cetak Data <i class="fa fa-download"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-8">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><i class="fa fa-file-excel-o"></i></h3>

                        <p>Laporan Data Peminjam</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo base_url() ?>apps/laporan/detail_lap_pinjam" class="small-box-footer">Detail Data <i class="fa fa-download"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>