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
            echo form_open_multipart('apps/peminjaman/save?source=header&utf8=✓', $attributes)
            ?>
        <!-- Layout Buku -->
        <div class="col-md-4">
             <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-book"></i> Data Buku</h3>
                <hr>
                <div class="row" style="padding-top: 10px">
                    <div class="col-md-6">
                        <!-- /.box-header -->
                            <div class="form-group">
                            <input type="hidden" name="type" value="<?php echo $type ?>">
                            <label><i class="fa fa-book margin-r-5"></i> Judul Buku</label>
                            <input type="text" class="form-control" name="kode_buku" placeholder="Masukkan Judul Buku" required>
                            </div>
                            <hr>
                    </div>
                    </div>
                </div>
            </div>
        <!-- Layout Anggota -->
        <div class="col-md-4">
             <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-male"></i> Data Anggota</h3>
                <hr>
                <div class="row" style="padding-top: 10px">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label><i class="fa fa-barcode margin-r-5"></i> Nama Anggota</label>
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukan Nama Anggota" required>
                            </div>
                            <hr>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
             <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-handshake-o"></i> Data Pinjam</h3>
                <hr>
                <div class="row" style="padding-top: 10px">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label><i class="fa fa-calendar margin-r-5"></i> Tanggal Kembali</label>
                            <input type="date" class="form-control" name="tgl_kembali" required>
                            </div>
                        </div>
                </div>
                <div class="submit"">
                    <button type="submit" class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-save"></i> Simpan</button>
                    <button type="reset" class="btn bg-orange btn-flat btn-fill"><i class="fa fa-repeat"></i> Reset</button>
                    </div>
            </div>
        </div>
        </div>
        <?php echo form_close(); ?>
        </div>
    </div>
</div>