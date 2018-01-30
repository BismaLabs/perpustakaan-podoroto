<div class="blog-section" style="padding-top: 20px">
    <div class="container">
        <div class="row">
            <!-- blogs-title -->
            <div class="col-md-12" style="margin-bottom: 20px">
                <?php echo $this->session->flashdata('notif') ?>
                <div class="search-events" style="text-align: center">
                    <form method="GET" action="<?php echo base_url('berita/search');?>" style="margin-top: 10px">
                        <div class = "input-group">
                            <input type = "text" name = "q" class = "form-control input-lg" placeholder="Masukkan Judul Berita dan Enter" autocomplete="off" id="articles" minlength="3" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <span class = "input-group-btn">
                                  <button class = "btn btn-default btn-lg" type = "submit">
                                     <i class="fa fa-search"></i> Search
                                  </button>
                               </span>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            if($berita!= NULL):
            foreach($berita->result() as $hasil):

                //check lenght title
                if(strlen($hasil->judul_berita)<40)
                {
                    $judul = '<a href="'. base_url().'berita/detail/'.$hasil->slug.'/" style="color:#4c4a45">
                            '.$hasil->judul_berita.'
                          </a>';
                }else{
                    $judul = '<a href="'. base_url().'berita/detail/'.$hasil->slug.'/" title="'.$hasil->judul_berita.'" style="color:#4c4a45">
                            '. substr($hasil->judul_berita, 0, 40).'....
                          </a>';
                }

                ?>

                <div class="col-md-3">
                    <img src="<?php echo base_url() ?>resources/images/berita/<?php echo $hasil->gambar ?>" alt="" style="object-fit: cover; width:100%; height:200px;">
                    <div class="inner" style="padding:10px;background-color: #ffffff;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                    <?php echo $hasil->gambar ?>
                        <div class="entry-header">
                            <time class="published"  title="<?php echo $this->apps->tgl_indo_lengkap($hasil->created_at) ?>" style="color: #4c4a45">
                                <?php echo $this->apps->tgl_indo_lengkap($hasil->created_at) ?></time>

                            <h6 class="post-title entry-title wrap-berita">
                                <?php echo $judul ?>
                            </h6>

                        </div><!-- end entry-header -->
                        <div class="entry-content">
                            <p class="wrap-berita" style="color: #333"><?php echo substr($hasil->descriptions, '0', '90') ?>.....</p>
                        </div>
                    </div><!-- end inner -->
                </div><!-- end col -->


                <?php
                    endforeach;
                ?>

        </div><!-- end row -->
        <div class="row" style="text-align: center">
            <?php echo $paging ?>

            <?php else : ?>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <span style="font-size: 20px"> <i class="fa fa-info-circle"></i> Maaf, tidak ada hasil yang ditemukan berdasarkan permintaan pencarian Anda</span>
                    </div>
                    <div class="reload" style="text-align: center;margin-bottom: 7px">
                        <a  href="<?php echo base_url('berita?source=reload&utf8=✓') ?>" class="btn btn-md btn-default" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Reloading..."><i class="fa fa-repeat"></i> Muat Ulang Halaman</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div><!-- end container -->
</div>