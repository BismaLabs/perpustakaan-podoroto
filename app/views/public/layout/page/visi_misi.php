<div id="main" style="padding-top: 20px">
            <div class="container">
                <div class="row">
                    <div id="primary" class="widget content-area">
                        <div id="content" class="site-content">
                        <?php foreach ($data_page->result() as $hasil) { ?>
                            <div class="service-page">
                                <h1 class="entry-title">
                                    <a href="#"><?php echo $hasil->judul_page ?></a>
                                </h1>
                                <div class="entry-content">
                                <p>
                                   <?php echo $hasil->isi_page ?>
                                </p>       
                                </div><!-- end entry-content -->

                            </div><!-- end service page -->

                        </div><!-- end #content -->
                         <?php } ?>
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
                                        <a class="pull-left" href="#"><?php echo $hasil->nama_kategori ?></a>
                                        <span class="pull-right"></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div><!-- end widget -->
                    </div><!-- end #secondary -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div>

