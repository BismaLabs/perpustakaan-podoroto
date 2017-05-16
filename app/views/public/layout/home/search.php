<div class="blog-section" style="padding-top: 20px">
    <div class="container">
        <div class="row">
            <!-- blogs-title -->
            <div class="col-md-12" style="margin-bottom: 20px">
                <?php echo $this->session->flashdata('notif') ?>
                <div class="search-events" style="text-align: center">
                    <form method="GET" action="<?php echo base_url('Seacrh/');?>" style="margin-top: 10px">
                        <div class = "input-group">
                            <input type = "text" name = "q" class = "form-control input-lg" placeholder="Cari Buku" autocomplete="off" id="articles" minlength="3" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <span class = "input-group-btn">
                                  <button class = "btn btn-default btn-lg" type = "submit">
                                     <i class="fa fa-search"></i> Cari
                                  </button>
                               </span>
                        </div>
                    </form>
                </div>
            </div>

             <?php
            if($data_buku != NULL):
            foreach($data_buku ->result() as $hasil):

                //check lenght title
                if(strlen($hasil->judul_buku)<30)
                {
                    $judul = '<a href="'. base_url().'buku/'.$hasil->slug.'/" style="color:#4c4a45">
                            '.$hasil->judul_buku.'
                          </a>';
                }else{
                    $judul = '<a href="'. base_url().'buku/'.$hasil->slug.'/" title="'.$hasil->judul_buku.'" style="color:#4c4a45">
                            '. substr($hasil->judul_buku, 0, 20).'....
                          </a>';
                }

                ?>

                 <div class="col-md-3">
                    <img src="<?php echo base_url() ?>resources/images/buku/<?php echo $hasil->foto ?>" alt="" style="object-fit: cover; width:100%; height:200px;">
                    <div class="inner" style="padding:10px;background-color: #ffffff;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                        <div class="entry-header">
                            <time class="published"  title="'.$this->apps->tgl_indo_lengkap($hasil->created_at).'" style="color: #4c4a45">
                                <?php echo $this->apps->tgl_indo_lengkap($hasil->created_at) ?></time>
                            <h6 class="post-title entry-title wrap-berita">
                                <?php echo  $judul  ?>
                            </h6>
                        </div><!-- end entry-header -->
                        <div class="entry-content">
                            <p class="wrap-berita" style="color: #333"><?php echo substr($hasil->deskripsi, "0","90") ?>.....</p>
                        </div>
                    </div><!-- end inner -->
                </div>

                <?php
                    endforeach;
                ?>

        </div><!-- end row -->
        <div class="row" style="text-align: center">
            <?php echo $paging ?>

            <?php else : ?>
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <span><b> Warning! </b> Data tidak ada didatabase </span>
                </div>
                <div class="reload" style="text-align: center;margin-bottom: 7px">
                    <a  href="<?php echo base_url('berita?source=reload&utf8=✓') ?>" class="btn btn-danger btn-reset btn-fill" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Reloading..."><i class="fa fa-repeat"></i> Reload Page</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div><!-- end container -->
</div>