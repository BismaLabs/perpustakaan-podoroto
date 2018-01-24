<div id="main" style="padding-top: 20px">
    <div class="container">
        <div class="row">
            <?php
                if($detail_berita != NULL) :
            ?>
            <div id="primary" class="widget content-area" style="margin-bottom:20px;background-color: white;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                <div id="content" class="site-content">
                    <div class="service-page">
                        <h1 class="entry-title">
                            <a href="<?php echo base_url() ?>berita/<?php echo $detail_berita->slug ?>/"><?php echo $detail_berita->judul_berita ?></a>
                        </h1>
                        <i class="fa fa-calendar"></i> <?php echo $this->apps->tgl_indo_lengkap($detail_berita->created_at) ?>  <i class="fa fa-user"></i> <?php echo $detail_berita->nama_user ?>  <i class="fa fa-eye"></i> Dilihat <?php echo $detail_berita->views ?> Kali
                        <hr>
                        <a href='http://www.facebook.com/share.php?u=<?php echo base_url() ?>berita/<?php echo $detail_berita->slug ?>/' target ='_BLANK' class="btn waves-effect waves-light" style="background-color:#3B5998;margin:1px;border-radius: 25px" title="Share ke Facebbok"><i class="fa fa-facebook" style="color:#fff"></i> <span style="color:#fff">Facebook</span></a>
                        <a href='http://www.twitter.com/home/?status=<?php echo base_url() ?>berita/<?php echo $detail_berita->slug ?>/' target ='_BLANK' class="btn waves-effect waves-light" style="background-color:#55ACEE;margin:1px;;border-radius: 25px" title="Share ke Twitter"><i class="fa fa-twitter" style="color:#fff"></i> <span style="color:#fff">Twitter</span></a>
                        <a href='https://plus.google.com/share?url=<?php echo base_url() ?>berita/<?php echo $detail_berita->slug ?>/' target ='_BLANK' class="btn waves-effect waves-light" style="background-color:#DD4B39;margin:1px;;border-radius: 25px" title="Share ke Google+"><i class="fa fa-google-plus" style="color:#fff"></i> <span style="color:#fff">Google +</span></a>
                        <div class="entry-content">
                            <figure class="wp-caption">
                                <img src="<?php echo  base_url() ?>resources/images/berita/<?php echo $detail_berita->gambar ?>" alt="" style="width: 100%">
                                <figcaption class="wp-caption-text"><?php echo $detail_berita->judul_berita ?> </figcaption>
                            </figure>

                            <p>
                                <?php echo $detail_berita->isi_berita ?>
                            </p>
                            <ul class="list-unstyled list-inline blog-tags" style="margin-top: 30px">
                                <li>
                                    <span>
                                    <?php
                                    if($detail_berita->keywords != NULL):
                                        $tags = explode(",", $detail_berita->keywords);
                                        foreach($tags as $k => $v):
                                            ?>
                                            <button class="btn btn-sm btn-default" style="border-radius: 25px;font-weight: 300;text-transform: none;margin-bottom: 5px"><i class="fa fa-tags"></i> <?php echo $v ?></button>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </span>
                                </li>
                            </ul>
                        </div><!-- end entry-content -->

                    </div><!-- end service page -->

                </div><!-- end #content -->
                <hr>
                <h1 class="entry-title">
                    Komentar
                </h1>
                <?php //echo $disqus ?>
            </div>

            <div id="secondary" class="col-md-4">
                <div id="search-2" class="widget widget_search">
                    <div class="widget-title-outer">
                        <h3 class="widget-title">Cari Berita</h3>
                    </div>
                    <div class="searchform">
                        <form method="GET" action="<?php echo base_url('search/berita/');?>">
                            <input type="text" class="txt" name="q" placeholder="Type Keywords" minlength="3" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="submit" value="search" class="btn btn-sm">
                        </form>
                    </div><!-- end searchform -->
                </div><!-- end search widget -->
            </div><!-- end #secondary -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<?php
else:
    ?>
    <?php redirect('/') ?>
<?php endif; ?>
