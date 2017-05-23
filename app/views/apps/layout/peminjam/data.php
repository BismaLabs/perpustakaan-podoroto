<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title ?>
            <small>Web Applications</small>
        </h1>
    </section>

    <div class="content">
        <div class="row">
        <!-- Layout Buku -->
        <div class="col-md-6">
            <div class="box box-success">
             <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-book"></i> Data Buku</h3>

                <form method="GET" action="<?php echo base_url('apps/peminjaman/search1');?>" style="margin-top: 10px">
                    <div class = "input-group">
                        <input type = "text" name = "q" class = "form-control input-md" placeholder="Masukkan Judul Buku dan Enter" autocomplete="off" id="articles">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <span class = "input-group-btn">
                          <button class = "btn btn-default btn-md" type = "submit">
                             <i class="fa fa-search"></i> Search
                          </button>
                       </span>
                    </div>
                </form>
                <div class="row" style="padding-top: 10px">
                    <div class="col-md-6">
                        <!-- /.box-header -->
                            <strong><i class="fa fa-book margin-r-5"></i> JUDUL BUKU</strong>
                            <p class="text-muted">
                                BUKU AJAIB JAGO MENULIS HURUF BESAR PAUD & TK                                        </p>
                            <hr>
                            <strong><i class="fa fa-folder margin-r-5"></i> KATEGORI</strong>
                            <p class="text-muted">
                                Buku Anak                                        </p>
                            <hr>
                            <strong><i class="fa fa-pencil margin-r-5"></i> PENGARANG</strong>
                            <p class="text-muted">BismaLabs</p>
                            <hr>
                            <strong><i class="fa fa-user margin-r-5"></i> PENERBIT</strong>
                            <p class="text-muted">BismaLabs</p>
                            <hr>
                        <!-- /.box-body -->
                    </div>
                        <div class="col-md-6">
                            <strong><i class="fa fa-calendar margin-r-5"></i> TAHUN TERBIT</strong>
                            <p class="text-muted">2017</p>
                            <hr>
                            <strong><i class="fa fa-list-ul margin-r-5"></i> NO. ISBN</strong>
                            <p class="text-muted">1123</p>
                            <hr>
                            <strong><i class="fa fa-database margin-r-5"></i> BUKU TERSEDIA</strong>
                            <p class="text-muted">20</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Layout Anggota -->
        <div class="col-md-6">
            <div class="box box-success">
             <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-male"></i> Data Anggota</h3>

                <form method="GET" action="<?php echo base_url('apps/peminjaman/search2');?>" style="margin-top: 10px">
                    <div class = "input-group">
                        <input type = "text" name = "q" class = "form-control input-md" placeholder="Masukkan No Anggota dan Enter" autocomplete="off" id="articles">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <span class = "input-group-btn">
                          <button class = "btn btn-default btn-md" type = "submit">
                             <i class="fa fa-search"></i> Search
                          </button>
                       </span>
                    </div>
                </form>
                <div class="row" style="padding-top: 10px">
                    <div class="col-md-6">
                        <!-- /.box-header -->
                            <strong><i class="fa fa-database margin-r-5"></i> NO. ANGGOTA</strong>
                            <p class="text-muted">20</p>
                            <hr>
                            <strong><i class="fa fa-user margin-r-5"></i> NAMA LENGKAP</strong>
                            <p class="text-muted">
                                BUKU AJAIB JAGO MENULIS HURUF BESAR PAUD & TK                                        </p>
                            <hr>
                            <strong><i class="fa fa-intersex margin-r-5"></i> JENIS KELAMIN</strong>
                            <p class="text-muted">
                                Buku Anak                                        </p>
                            <hr>
                            <strong><i class="fa fa-map-marker margin-r-5"></i> TEMPAT LAHIR</strong>
                            <p class="text-muted">BismaLabs</p>
                            <hr>
                            
                        <!-- /.box-body -->
                    </div>
                        <div class="col-md-6">
                            <strong><i class="fa fa-calendar margin-r-5"></i> TANGGAL LAHIR</strong>
                            <p class="text-muted">BismaLabs</p>
                            <hr>
                            <strong><i class="fa fa-map-o margin-r-5"></i> ALAMAT</strong>
                            <p class="text-muted">2017</p>
                            <hr>
                            <strong><i class="fa fa-phone margin-r-5"></i> NO. HP</strong>
                            <p class="text-muted">1123</p>
                            <hr>
                        </div>
                </div>
            </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="box box-success">
             <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-male"></i> Data Pinjaman</h3>

                <form method="GET" action="<?php echo base_url('apps/peminjaman/search3');?>" style="margin-top: 10px">
                    <div class = "input-group">
                        <input type = "text" name = "q" class = "form-control input-md" placeholder="Masukkan Kode Anggota atau Nama Anggota dan Enter" autocomplete="off" id="articles">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <span class = "input-group-btn">
                          <button class = "btn btn-default btn-md" type = "submit">
                             <i class="fa fa-search"></i> Search
                          </button>
                       </span>
                    </div>
                </form>
                <div class="content">
                <div class="row" style="padding-top: 10px">
                <div class="box box-success">
                <div class="col-md-4">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-book"></i> Data Buku</h3>
                    </div>

                    <strong> JUDUL BUKU</strong>
                    <p class="text-muted">
                        BUKU AJAIB JAGO MENULIS HURUF BESAR PAUD & TK </p>
                    <hr>
                    <strong> KATEGORI</strong>
                    <p class="text-muted">
                        Buku Anak</p>
                    <hr>
                </div>
                <div class="col-md-4">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-male"></i> Data Anggota</h3>
                    </div>

                    <strong> NAMA ANGGOTA</strong>
                    <p class="text-muted">
                        BUKU AJAIB JAGO MENULIS HURUF BESAR PAUD & TK</p>
                    <hr>
                    <strong> NO ANGGOTA</strong>
                    <p class="text-muted">
                        Buku Anak</p>
                    <hr>
                </div>
                <div class="col-md-4">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-handshake-o"></i> Data Peminjam</h3>
                    </div>
                     <?php
                        $attributes = array('id' => 'frm_login');
                        echo form_open_multipart('apps/peminjaman/save?source=header&utf8=✓', $attributes)
                        ?>
                         <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" class="form-control" name="tgl_pinjam" placeholder="Tanggal Pinjam" required>
                        </div>
                         <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" class="form-control" name="tgl_kembali" placeholder="Tanggal Kembali" required>
                        </div>
                        <hr>
                </div>
                 <div class="col-md-12">
                    <div class="submit" style="margin-bottom: 7px">
                    <button type="submit" class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-save"></i> Tambah</button>
                    <button type="reset" class="btn bg-orange btn-flat btn-fill"><i class="fa fa-repeat"></i> Hapus</button>
                     <button type="submit" class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-save"></i> Simpan</button>
                    <button type="reset" class="btn bg-orange btn-flat btn-fill"><i class="fa fa-repeat"></i> Batal</button>
                </div>
                </div>
                        <?php echo form_close(); ?>
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div> 