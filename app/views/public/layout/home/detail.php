<div id="main" style="padding-top: 30px; padding-bottom: 30px">
            <div class="container">
                <div class="row">
                    <div class="col-md-8" style="background-color: white;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                        <div id="content" class="widget">
                                <div class="service-page">
                                        <h1 class="entry-title">
                                    Detail Buku
                                    </h1>
                                    <?php
                                        if($data_buku != NULL) :
                                    ?>
                                    <div class="entry-content">
                                        <div class="row">
                                        <div class="col-md-4">
                                        <img style="width: 100%" src="<?php echo base_url() ?>resources/images/buku/<?php echo $data_buku->foto ?>">
                                        </div>
                                <div class="col-md-4">
                                    <div class="box box-success">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <strong><i class="fa fa-book margin-r-5"></i> JUDUL BUKU</strong>
                                        <p class="text-muted">
                                            <?php echo $data_buku->judul_buku ?>
                                        </p>
                                        <hr>
                                        <strong><i class="fa fa-folder margin-r-5"></i> KATEGORI</strong>
                                        <p class="text-muted">
                                            <?php
                                                echo $data_buku->nama_kategori
                                            ?>
                                        </p>
                                        <hr>
                                        <strong><i class="fa fa-pencil margin-r-5"></i> PENGARANG</strong>
                                        <p class="text-muted"><?php echo $data_buku->pengarang ?></p>
                                        <hr>
                                        <strong><i class="fa fa-user margin-r-5"></i> PENERBIT</strong>
                                        <p class="text-muted"><?php echo $data_buku->penerbit ?></p>
                                        <hr>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <strong><i class="fa fa-calendar margin-r-5"></i> TAHUN TERBIT</strong>
                                    <p class="text-muted"><?php echo $data_buku->tahun_terbit ?></p>
                                    <hr>
                                    <strong><i class="fa fa-list-ul margin-r-5"></i> NO. ISBN</strong>
                                    <p class="text-muted"><?php echo $data_buku->no_isbn ?></p>
                                    <hr>
                                    <strong><i class="fa fa-database margin-r-5"></i> BUKU TERSEDIA</strong>
                                    <p class="text-muted"><?php echo $data_buku->jumlah_buku ?></p>
                                </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Deskripsi Buku</strong>
                                    <?php echo $data_buku->deskripsi ?>
                                </div>
                                </div><!-- end entry-content -->
                                </div><!-- end inner -->
                        </div><!-- end #content -->
                         <div class="related-content">
                                <h2><i class="fa fa-book margin-r-5"></i> Buku Terkait</h2>
                                <div class="row">
                                <?php if (buku_terkait($data_buku->kategori_id, $data_buku->slug) != NULL) {
                                    foreach (buku_terkait($data_buku->kategori_id, $data_buku->slug) as $param) {
                                   ?>
                                    <div class="col-md-4">
                                        <figure>
                                            <img src="<?php echo base_url() ?>resources/images/buku/<?php echo $param->foto ?>" style="width: 100%; height: auto; object-fit: cover;">
                                        </figure>
                                        <div class="related-title">
                                            <h3><a href="<?php echo base_url() ?>buku/<?php echo $param->slug ?>" style="text-decoration: none;"><?php echo $param->judul_buku ?> <i class="fa fa-arrow-circle-right"></i></a></h3>
                                        </div>
                                    </div> <!-- end column -->
                                    <?php  }
                                } ?>
                                    </div> <!-- end row -->
                            </div> <!-- end related-content -->
                    </div><!-- end #primary -->

                    <div id="secondary" class="col-md-4">
                    <?php echo $this->session->flashdata('notif'); ?>
                        <div id="search-2" class="widget widget_search">
                            <div class="widget-title-outer">
                                <h3 class="widget-title">Pencarian</h3>
                            </div>
                            <div class="searchform">
                                <form method="GET" action="<?php echo base_url('search/');?>">
                            <input type="text" class="txt" name="q" placeholder="Type Keywords" minlength="3" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="submit" value="Cari" class="btn btn-sm">
                        </form>
                            </div><!-- end searchform -->
                        </div><!-- end search widget -->

                            <div class="widget widget_categories">
                                <div class="widget-title-outer">
                                    <h3 class="widget-title">Kategori Buku</h3>
                                </div>
                                <ul>
                                <?php if (kategori_header() != NULL ) {
                                    foreach (kategori_header() as $buku) {
                                   ?>
                                    <li>
                                        <a class="pull-left" href="<?php echo base_url() ?>kategori/<?php echo $buku->slug_kategori ?>/"><i class="fa fa-book margin-r-5"></i> <?php echo $buku->nama_kategori ?></a>
                                    </li>
                                    <?php  }
                                }   ?>
                                    <li>
                                        <a class="pull-left" href="<?php echo base_url() ?>kategori/">Lainnya...</a>
                                    </li>
                                </ul>
                            </div><!-- end widget -->

                    </div><!-- end #secondary -->
                    
                </div><!-- end row -->

            </div><!-- end container -->
        </div>
<?php
else:
?>
<?php endif; ?>