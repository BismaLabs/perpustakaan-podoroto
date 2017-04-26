<div id="main" style="padding-top: 20px">
            <div class="container">
                <div class="row">
                    <?php
                    if($data_buku != NULL) :
                    ?>
                    <div class="col-md-8 widget content-area" style="background-color: white;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);    margin-bottom: 30px;">
                        <div id="content" class="site-content">
                            <div class="service-page">
                                <h1 class="entry-title">
                                    Detail Buku
                                </h1>
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
                                                $data_buku->nama_kategori
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
                                    <strong><i class="fa fa-database margin-r-5"></i> JUMLAH BUKU</strong>
                                    <p class="text-muted"><?php echo $data_buku->jumlah_buku ?></p>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Deskripsi Buku</strong>
                                    <p><?php echo $data_buku->deskripsi ?></p>

                                </div>
                                </div>
                                </div><!-- end entry-content -->
                            </div><!-- end service page -->
                        </div><!-- end #content -->
                    </div>


                    <div id="secondary" class="col-md-4">
                        <div id="search-2" class="widget widget_search">
                            <div class="widget-title-outer">
                                <h3 class="widget-title">Cari Buku</h3>
                            </div>
                            <div class="searchform">
                                <form>
                                    <input type="text" class="txt" name="s" placeholder="Type Keywords">
                                    <input type="submit" value="search" class="btn btn-sm">
                                </form>
                            </div><!-- end searchform -->
                        </div><!-- end search widget -->
                            <div class="widget widget_categories">
                                <div class="widget-title-outer">
                                    <h3 class="widget-title">Kategori Buku</h3>
                                </div>
                                <ul>
                                <?php foreach($data_kategori->result() as $hasil){ ?>
                                    <li>
                                        <a class="pull-left" href="<?php echo base_url() ?>kategori/<?php echo $hasil->slug ?>/"><?php echo $hasil->nama_kategori ?></a>

                                        <span class="pull-right"> <?php echo $this->db->where("kategori_id", $data_buku->kategori_id)->count_all_results("tbl_buku") ?></span>

                                    </li>
                                    <?php } ?>
                                </ul>
                            </div><!-- end widget -->
                    </div><!-- end #secondary -->
                    <?php
            else:
        ?>
        <?php endif; ?>
            </div><!-- end container -->
        </div>
        </div>

