<div class="blog-section">
    <div class="container">
        <div class="row" style="padding-top: 50px">
            <div class="col-md-12" style="margin-bottom: 20px">
                <?php echo $this->session->flashdata('notif') ?>
                <div class="search-events" style="text-align: center">
                    <form method="GET" action="<?php echo base_url('search/');?>" style="margin-top: 10px">
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
            <!-- blogs-title -->
            <?php
                foreach($data_buku->result_array() as $buku){
                            //check lenght title
            if(strlen($buku['judul_buku'])<50)
            {
                $judul = '<a href="'. base_url().'buku/'.$buku['slug'].'/">
                            '. $buku['judul_buku'].'
                          </a>';
            }else{
                $judul = '<a href="'. base_url().'buku/'.$buku['slug'].'/" title="'.$buku['judul_buku'].'">
                            '. substr($buku['judul_buku'], 0, 40).'....
                          </a>';
            }
            ?>
            <div class="col-md-3">
                        <figure class="blog-thumb">
                            <img src="<?php echo base_url() ?>resources/images/buku/<?php echo $buku['foto']; ?>" style="width:100%; height:auto alt="" style="object-fit: cover;">
                        </figure>
                        <div class="inner">
                            <div class="entry-header">
                                <time class="published" title="<?php echo $buku['created_at']?>"><?php echo $buku['created_at']?></time>
                                <h2 class="post-title entry-title wrap-berita">
                                   <?php echo $judul ?>
                                </h2>
                            </div><!-- end entry-header -->
                            <div class="entry-content">
                                <a style="text-decoration: none;" href="<?php echo base_url() ?>buku/<?php echo $buku['slug'] ?>/" class="more"> Detail Buku <i class="fa fa-arrow-circle-right"></i></a>
                            </div><!-- entry-content -->
                             <div class="entry-content">
                        </div>
                        </div><!-- end inner -->
                    </div>
            <?php } ?>
        </div><!-- end row -->
    </div><!-- end container -->
</div>


<div class="brand-section" style="background-color: #ffffff">
    <div class="container">
        <div class="row">

            <div class="centered-title">
                <h3>Aplikasi Desa</h3>
            </div><!-- blogs-title -->

            <div class="col-md-12 content-center">
                <div class="col-partner">
                    <div>
                        <a href="#" class="linkcls"><img class="hover-app" style="padding:10px;max-width: 200px;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);" src="<?php echo base_url() ?>resources/images/app/simdes.png"></a>
                    </div>
                </div><!-- end column -->
                <div class="col-partner">
                    <div>
                        <a href="#" class="linkcls"><img class="hover-app" style="padding:10px;max-width: 200px;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);" src="<?php echo base_url() ?>resources/images/app/perpus.png" style="width :167px;"></a>
                    </div>
                </div><!-- end column -->
                <div class="col-partner">
                    <div>
                        <a href="#" class="linkcls"><img class="hover-app" style="padding:10px;max-width: 200px;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);" src="<?php echo base_url() ?>resources/images/app/aduan.png"></a>
                    </div>
                </div><!-- end column -->
                <div class="col-partner">
                    <div>
                        <a href="#" class="linkcls"><img class="hover-app" style="padding:10px;max-width: 200px;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);" src="<?php echo base_url() ?>resources/images/app/letter.png"></a>
                    </div>
                </div><!-- end column -->
                <div class="col-partner">
                    <div>
                        <a href="#" class="linkcls"><img class="hover-app" style="padding:10px;max-width: 200px;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);" src="<?php echo base_url() ?>resources/images/app/healty.png" style="width : 167px;"></a>
                    </div>
                </div><!-- end column -->
            </div><!-- end inner -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>