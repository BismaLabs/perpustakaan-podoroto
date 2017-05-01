<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="centered-title" style="padding-top: 10px">
                <h3>Profil Perpustakaan Desa</h3>
            </div><!-- blogs-title -->
            <?php 
                foreach($data_page->result_array() as $hasil) {
            ?>
            <div class="col-md-3">
                <div class="inner" style="text-align: center; background-color: white;">
                    <div class="entry-header">
                        <h6 class="post-title entry-title" style="">
                            <a href="<?php echo base_url() ?>page/detail_page/<?php echo $hasil['slug_page'] ?>/">
                            <?php echo $hasil['judul_page'] ?>
                            </a>
                        </h6>
                    </div><!-- end entry-header -->
                </div><!-- end inner -->
            </div><!-- end col -->
            <?php } ?>     
        </div><!-- end row -->
    </div><!-- end container -->
</div>