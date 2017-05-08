<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="centered-title" style="padding-top: 10px">
                <h3>BUKU TERSEDIA</h3>
            </div>

            <div class="col-md-12" style="margin-bottom: 20px">
                <?php echo $this->session->flashdata('notif') ?>
                <div class="search-events" style="text-align: center">
                    <form method="GET" action="<?php //echo base_url('search/berita/');?>" style="margin-top: 10px">
                        <div class = "input-group">
                            <input type = "text" name = "q" class = "form-control input-lg" placeholder="Cari Buku" autocomplete="off" id="articles" minlength="3" required>
                            <input type="hidden" name="<?php //echo $this->security->get_csrf_token_name(); ?>" value="<?php //echo $this->security->get_csrf_hash(); ?>">
                            <span class = "input-group-btn">
                                  <button class = "btn btn-default btn-lg" type = "submit">
                                     <i class="fa fa-search"></i> Cari
                                  </button>
                               </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- blogs-title -->
            <?php
            if($data_kategori != NULL):
                foreach($data_kategori->result() as $hasil):
              //check lenght title
            if(strlen($hasil->nama_kategori)<40)
            {
                $judul = '<a href="'. base_url().'buku/'.$hasil->slug.'/">
                            '. $hasil->judul_buku.'
                          </a>';
            }else{
                $judul = '<a href="'. base_url().'buku/'.$hasil->slug.'/" title="'.$hasil->judul_buku.'">
                            '. substr($hasil->judul_buku, 0, 45).'....
                          </a>';
            }
            ?>
            <div class="col-md-3">
                <img src="<?php echo base_url() ?>resources/images/buku/<?php echo $hasil->foto; ?>" alt="" style="object-fit: cover; width:262px; height:auto;">
                <div class="inner" style="padding:10px">
                    <div class="entry-header">
                        <time class="published"  title="<?php echo $hasil->created_at ?>">
                        <?php echo $hasil->created_at ?></time>
                        <h6 class="post-title entry-title">
                            <?php echo $judul ?>
                        </h6>
                    </div><!-- end entry-header -->
                </div><!-- end inner -->
            </div><!-- end col -->
            <?php
            endforeach;
        ?>
            <?php endif; ?>

        </div><!-- end row -->
    </div><!-- end container -->
</div>