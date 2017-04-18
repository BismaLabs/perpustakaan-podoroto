
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title ?>
            <small>Web Applications</small>
        </h1>
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo $this->session->flashdata('notif') ?>
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-info-circle"></i> Tentang Aplikasi</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p style="text-align: center">
                            <img src="<?php echo base_url() ?>resources/images/logo.png" style="width: 150px">
                        </p>
                        <p>
                            <b><span style="font-size: 16px">CV. Bisma Labs - Professional Web Apps Solutions</span></b>
                        </p>
                        <p>
                            Kami menghadirkan sebuah aplikasi yang kita namakan Perpus Desa, dimana dengan
                            aplikasi ini apapun kegiatan pengelolaan perpustakaan desa akan termudahkan, memonitor kondisi buku-buku di perpus, serta mengenalkan ke masyarakat luas bahwa untuk meminjam buku di perpustakaan desa Anda sekarang sangatlah mudah karena Aplikasi ini.
                        </p>
                        <p>
                            <b><span style="font-size: 16px">jika punya pertanyaan bisa hubungi kami melalui :</span></b>
                        </p>
                        <p>
                            <i class="fa fa-envelope"></i> support@bismalabs.co.id<br><br>
                            <i class="fa fa-whatsapp"></i> +62 857-3059-4359 <br>  <span style="margin-left: 16px">+62 857-0699-0927</span><br><br>
                            <i class="fa fa-globe"></i> http://bismalabs.co.id
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
