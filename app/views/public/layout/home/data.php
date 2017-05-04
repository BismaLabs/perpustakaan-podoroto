<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="centered-title">
                <h3>BUKU TERSEDIA</h3>
            </div>
            <!-- blogs-title -->
            <?php
                foreach($data_buku->result_array() as $buku){
                            //check lenght title
            if(strlen($buku['judul_buku'])<30)
            {
                $judul = '<a href="'. base_url().'buku/'.$buku['slug'].'/">
                            '. $buku['judul_buku'].'
                          </a>';
            }else{
                $judul = '<a href="'. base_url().'buku/'.$buku['slug'].'/" title="'.$buku['judul_buku'].'">
                            '. substr($buku['judul_buku'], 0, 20).'....
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
                                <a href="<?php echo base_url() ?>buku/<?php echo $buku['slug'] ?>/" class="more"> Selengkapnya</a>
                            </div><!-- entry-content -->
                             <div class="entry-content">
                        </div>
                        </div><!-- end inner -->
                    </div>
            <?php } ?>
        </div><!-- end row -->
    </div><!-- end container -->
</div>