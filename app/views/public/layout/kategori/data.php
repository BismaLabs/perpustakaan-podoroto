<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="centered-title" style="padding-top: 10px">
                <h3>Kategori Buku</h3>
            </div><!-- blogs-title -->
            <?php if (kategori_header() != NULL) {
            foreach(kategori_header() as $hasil) {
            ?>
            <div class="col-md-3">
                <div class="inner" style="text-align: center; background-color: white;">
                    <div class="entry-header">
                        <h6 class="post-title entry-title" style="">
                            <a href="<?php echo base_url() ?>kategori/<?php echo $hasil-> slug ?>/">
                            <?php echo  "<span style='text-align: center;''>$hasil->nama_kategori </span>" ?>
                            </a>
                        </h6>
                    </div><!-- end entry-header -->
                </div><!-- end inner -->
            </div><!-- end col -->
            <?php }} ?>     
        </div><!-- end row -->
    </div><!-- end container -->
</div>