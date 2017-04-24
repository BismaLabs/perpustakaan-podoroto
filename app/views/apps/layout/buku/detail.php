
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
            <div class="col-md-4">
                <div class="box box-success">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <img src="<?php echo base_url() ?>resources/images/buku/<?php echo $data_buku['foto'] ?>" style="width: 100%">
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">DETAIL BUKU</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> JUDUL BUKU</strong>

                        <p class="text-muted">
                            <?php echo $data_buku['judul_buku'] ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-folder margin-r-5"></i> KATEGORI</strong>


                        <p class="text-muted">
                            <?php
                            foreach($select_kat->result_array() as $row)
                            {
                                if($row['id_kategori']== $data_buku['kategori_id'])
                                {
                                    ?>
                                    <?php echo $row['nama_kategori']; ?>
                                    <?php
                                }
                            }
                            ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> PENGARANG</strong>

                        <p class="text-muted"><?php echo $data_buku['pengarang'] ?></p>

                        <hr>

                        <strong><i class="fa fa-user-circle-o margin-r-5"></i> PENERBIT</strong>

                        <p class="text-muted"><?php echo $data_buku['penerbit'] ?></p>

                        <hr>

                        <strong><i class="fa fa-calendar margin-r-5"></i> TAHUN TERBIT</strong>

                        <p class="text-muted"><?php echo $data_buku['tahun_terbit'] ?></p>

                        <hr>

                        <strong><i class="fa fa-list-ul margin-r-5"></i> NO. ISBN</strong>

                        <p class="text-muted"><?php echo $data_buku['no_isbn'] ?></p>

                        <hr>

                        <strong><i class="fa fa-database margin-r-5"></i> JUMLAH BUKU</strong>

                        <p class="text-muted"><?php echo $data_buku['jumlah_buku'] ?></p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Deskripsi Buku</strong>

                        <p><?php echo $data_buku['deskripsi'] ?></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            </div>
        </div>

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->