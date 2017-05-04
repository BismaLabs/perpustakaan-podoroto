<div id="main" style="padding-top: 30px">
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
                                    <strong><i class="fa fa-database margin-r-5"></i> JUMLAH BUKU</strong>
                                    <p class="text-muted"><?php echo $data_buku->jumlah_buku ?></p>
                                </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Deskripsi Buku</strong>
                                    <p><?php echo $data_buku->deskripsi ?></p>
                                </div>

                                </div><!-- end entry-content -->
                                </div><!-- end inner -->
                        </div><!-- end #content -->
                         <div class="related-content">
                                <h2>Buku Terkait</h2>
                                <div class="row">
                                <?php if (buku_terkait($data_buku->kategori_id, $data_buku->slug) != NULL) {
                                    foreach (buku_terkait($data_buku->kategori_id, $data_buku->slug) as $param) {
                                   ?>
                                    <div class="col-md-4">
                                        <figure>
                                            <img src="<?php echo base_url() ?>resources/images/buku/<?php echo $param->foto ?>" style="width: 100%; height: auto; object-fit: cover;">
                                        </figure>
                                        <div class="related-title">
                                            <h3><a href="<?php echo base_url() ?>buku/<?php echo $param->slug ?>"><?php echo $param->judul_buku ?></a></h3>
                                        </div>
                                    </div> <!-- end column -->
                                    <?php  }
                                } ?>
                                    </div> <!-- end row -->
                            </div> <!-- end related-content -->
                    </div><!-- end #primary -->

                    <div id="secondary" class="col-md-4">

                        <div id="search-2" class="widget widget_search">
                            <div class="widget-title-outer">
                                <h3 class="widget-title">Pencarian</h3>
                            </div>
                            <div class="searchform">
                                <form>
                                    <input type="text" class="txt" name="s" placeholder="Type Keywords">
                                    <input type="submit" value="search" class="btn btn-sm">
                                </form>
                            </div><!-- end searchform -->
                        </div><!-- end search widget -->

                        <div class="widget post-type-widget">
                            <div class="widget-title-outer">
                                <h3 class="widget-title">Berita Terbaru</h3>
                            </div>
                            <ul>
                                                            <li>
                                    <span class="post-category">
                                        <a href="#">Wisata Kuliner</a>
                                    </span>
                                    <figure class="post-thumbnail">
                                        <a href="45"><img src="http://tambahrejo.desa.id/upload/image/thumb/thumb_Screenshot_10.png.jpg" alt="" width="110px" height="80px" style="object-fit: cover;"></a>
                                    </figure>
                                    <h2 class="post-title">
                                        <a href="45">
                                        Mahasiswa PKPM Darmajaya Ajak Warga Berwirausaha Bakso Jamur Tiram</a>
                                    </h2>
                                </li>
                                                                <li>
                                    <span class="post-category">
                                        <a href="#">Berita</a>
                                    </span>
                                    <figure class="post-thumbnail">
                                        <a href="44"><img src="http://tambahrejo.desa.id/upload/image/thumb/thumb_IMG_20160821_065402.jpg" alt="" width="110px" height="80px" style="object-fit: cover;"></a>
                                    </figure>
                                    <h2 class="post-title">
                                        <a href="44">
                                        Jalan Sehat </a>
                                    </h2>
                                </li>
                                                                <li>
                                    <span class="post-category">
                                        <a href="#">Ekonomi</a>
                                    </span>
                                    <figure class="post-thumbnail">
                                        <a href="43"><img src="http://tambahrejo.desa.id/upload/image/thumb/thumb_P_20160813_115752_1_p.jpg" alt="" width="110px" height="80px" style="object-fit: cover;"></a>
                                    </figure>
                                    <h2 class="post-title">
                                        <a href="43">
                                        Sarasehan Mahasiswa PKPM IBI Darmajaya</a>
                                    </h2>
                                </li>
                                                                <li>
                                    <span class="post-category">
                                        <a href="#">Berita</a>
                                    </span>
                                    <figure class="post-thumbnail">
                                        <a href="42"><img src="http://tambahrejo.desa.id/upload/image/thumb/thumb_20160701sideka.jpg" alt="" width="110px" height="80px" style="object-fit: cover;"></a>
                                    </figure>
                                    <h2 class="post-title">
                                        <a href="42">
                                        Kemenkominfo Minati Pengembangan Aplikasi SIDesa Darmajaya</a>
                                    </h2>
                                </li>
                                                                <li>
                                    <span class="post-category">
                                        <a href="#">Berita</a>
                                    </span>
                                    <figure class="post-thumbnail">
                                        <a href="41"><img src="http://tambahrejo.desa.id/upload/image/thumb/thumb_P_20160629_105419.jpg" alt="" width="110px" height="80px" style="object-fit: cover;"></a>
                                    </figure>
                                    <h2 class="post-title">
                                        <a href="41">
                                        Langsung dari Kementerian Kominfo</a>
                                    </h2>
                                </li>
                                                            </ul>
                            </div><!-- end widget -->

                            <div class="widget widget_categories">
                                <div class="widget-title-outer">
                                    <h3 class="widget-title">Kategori Berita</h3>
                                </div>
                                <ul>
                                    <li>
                                        <a class="pull-left" href="#">Politik</a>
                                        <span class="pull-right">17</span>
                                    </li>
                                    <li>
                                        <a class="pull-left" href="#">Bisnis</a>
                                        <span class="pull-right">14</span>
                                    </li>
                                    <li>
                                        <a class="pull-left" href="#">Ekonomi</a>
                                        <span class="pull-right">10</span>
                                    </li>
                                    <li>
                                        <a class="pull-left" href="#">Pemerintahan</a>
                                        <span class="pull-right">8</span>
                                    </li>
                                    <li>
                                        <a class="pull-left" href="#">Hiburan</a>
                                        <span class="pull-right">6</span>
                                    </li>
                                </ul>
                            </div><!-- end widget -->

                            <div class="widget">
                                <div class="widget-title-outer">
                                    <h3 class="widget-title">Tag Berita</h3>
                                </div>
                                <div class="tagcloud">
                                    <a href="#">politik</a>
                                    <a href="#">pemerintahan</a>
                                    <a href="#">bisnis</a>
                                    <a href="#">ekonomi</a>
                                    <a href="#">hiburan</a>
                                    <a href="#">olahraga</a>
                                    <a href="#">pengumuman</a>
                                </div>
                            </div><!-- end widget -->

                    </div><!-- end #secondary -->
                    
                </div><!-- end row -->

            </div><!-- end container -->
        </div>
<?php
                            else:
                                     ?>
                            <?php endif; ?>