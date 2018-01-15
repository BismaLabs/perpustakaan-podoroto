<footer id="footer-section" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="widget">
                    <div class="widget-inner">
                        <div class="widget-title-outer">
                            <h3 class="widget-title">Tentang Perpustakaan</h3>
                        </div>
                        <p id="tentang"><?php echo systems('tentang') ?></p>
                    </div><!-- end inner -->
                </div><!-- end widget -->
            </div>

            <div class="col-md-4">
                <div class="widget">
                    <div class="widget-inner">
                        <div class="widget-title-outer">
                            <h3 class="widget-title">Alamat Desa</h3>
                        </div>
                        <!-- <table id="alamatdesa">
                            <tr>
                                <td style='padding: 0 5px;'><strong>Lokasi</strong></td>
                                <td style='padding: 0 5px;'>:</td>
                                <td id='alamatlengkap' style='padding: 0 5px;'><?php echo systems('alamat') ?></td>
                            </tr>
                            <tr>
                                <td style='padding: 0 5px;'><strong>Telp</strong></td>
                                <td style='padding: 0 5px;'>:</td>
                                <td style='padding: 0 5px;'><?php echo systems('no_tlp') ?></td>
                            </tr>
                            <tr>
                                <td style='padding: 0 5px;'><strong>Email</strong></td>
                                <td style='padding: 0 5px;'>:</td>
                                <td style='padding: 0 5px;'><?php echo systems('email') ?></td>
                            </tr>
                        </table> -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.077787502362!2d112.31589281428151!3d-7.4566467755601185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78141b9088739f%3A0x26db8a1627b02ad0!2sKantor+Desa+Podoroto!5e0!3m2!1sid!2sid!4v1511778332599" width="330" height="230" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div><!-- end inner -->
                </div><!-- end widget -->
            </div>

            <div class="col-md-4">
                <div class="widget">
                    <div class="widget-inner">
                        <div class="widget-title-outer">
                            <h3 class="widget-title">Buku Terpopuler</h3>
                        </div>
                        <ul class="list-galleries">
                            <?php  if (buku_populer() != NULL) {
                                    foreach (buku_populer() as $hasil) {
                            ?>
                            <!-- <li>
                                    <img src="<?php //echo base_url() ?>resources/images/buku/<?php //echo $hasil->foto ?>" width="50px" height="auto" alt="" style="object-fit: cover;" >
                            </li> -->
                             <li>
                                <a href="#" class="open_x" id="7">
                                    <a href="<?php echo base_url() ?>resources/images/buku/<?php echo $hasil->foto ?>" data-lightbox="image-1" data-title="<?php echo $hasil->judul_buku ?>"><img src="<?php echo base_url() ?>resources/images/buku/<?php echo $hasil->foto ?>" width="100px" height="100px" alt="" class="img-rounded" style="object-fit: cover;" ></a>
                                </a><!-- thumb 01 -->
                            </li>
                            <?php
                            }}
                         ?>
                        </ul>
                    </div><!-- end gallery wrapper -->
                </div><!-- end inner -->
            </div><!-- end widget -->
        </div>
    </div>
    </footer>
    <div class="footer-credit">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class="copy"><?php echo systems('site_footer') ?> Maintenance By  <a target="_blank" style="text-decoration: none" href="http://bismalabs.co.id/">Bisma Labs</a></p>
            </div><!-- end column -->
            <div class="col-md-4">
                <ul class="list-socmed">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-google-plus"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>resources/public/js/vendor/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url() ?>resources/public/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>resources/public/js/plugin.js"></script>
<script src="<?php echo base_url() ?>resources/public/js/main.js"></script>
<script src="<?php echo base_url() ?>resources/public/js/jquery.simpleWeather.js"></script>
<script src="<?php echo base_url() ?>resources/public/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>resources/public/js/fancybox2/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>resources/public/js/fancybox2/jquery.fancybox-thumbs.js"></script>
<script src="<?php echo base_url() ?>resources/public/parts/js/global.js"></script>
<script src="<?php echo base_url() ?>resources/public/js/weather.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>resources/public/js/lightbox.min.js" type="text/javascript"></script>
</body>
</html>
