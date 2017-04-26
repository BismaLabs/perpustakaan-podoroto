<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="centered-title">
                <h3>BUKU TERSEDIA</h3>
            </div><!-- blogs-title -->
            <?php
            foreach($data_buku->result_array() as $buku)
            { 
               ?>
            <div class="col-md-3">
                <figure class="">
                    <img src="<?php echo base_url() ?>resources/images/buku/<?php echo $buku['foto']; ?>"alt="" style="object-fit: cover; width:262px; height:auto;">
                </figure>
                <div class="inner">
                    <div class="entry-header">
                        <time class="published"  title="April 25, 2016 - 21:12 pm"><?php 
                        echo $buku['created_at']?></time>
                        <h6 class="post-title entry-title">
                            <a href="#"><?php echo $buku['judul_buku']; ?></a>
                        </h6>
                    </div><!-- end entry-header -->
                </div><!-- end inner -->
            </div><!-- end col -->
            <?php } ?>


        </div><!-- end row -->
    </div><!-- end container -->
</div>