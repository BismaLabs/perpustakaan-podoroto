<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href=""/>
    <title><?php echo $title ?></title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>resources/public/css/rajdhani.css" rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>resources/public/css/opensans.css" rel='stylesheet' type='text/css'>

    <link href="<?php echo base_url() ?>resources/public/plugins/wicon/css/weather-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>resources/public/js/select2/select2.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>resources/public/js/fileupload/bootstrap-fileupload.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>resources/public/js/plugins/pace/pace.min.js"></script>
    <link href="<?php echo base_url() ?>resources/publicl/js/plugins/pace/flash.front.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/public/js/fancybox2/jquery.fancybox.css"
          type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/public/js/fancybox2/jquery.fancybox-thumbs.css"
          type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/public/js/nprogress/nprogress.css">
    <link href="<?php echo base_url() ?>resources/public/css/weather.css" rel="stylesheet"/>
    <link href="<?php echo base_url() ?>resources/public/css/styles.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>resources/public/css/custom.css" rel="stylesheet">
</head>
<body style="background-color: #f1f1f1">
<div id="page" class="hfeed site">
    <header id="masthead" class="site-header navbar-fixed-top">
        <div class="header-navigation">
            <div class="container-fluid">
                <div class="row">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".site-navigation" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo navbar-brand">
                        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url()?>resources/public/images/perpus-logo.png" title="Perpustakaan Desa Podoroto"> 
                        </a>
                    </div>
                    <nav id="primary-navigation" class="site-navigation navbar-collapse collapse" role="navigation">
                        <div class="nav-menu">
                            <ul class="menu">
                                <li><a href='<?php echo base_url() ?>'>Home</a></li>
                                <li class="has-child">
                                <a href="<?php echo base_url() ?>page/">Profil</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url() ?>visi-misi/">Visi dan Misi</a></li>
                                         <li><a href="<?php echo base_url() ?>ketentuan_umum/">Ketentuan Umum</a></li>
                                         <li><a href="<?php echo base_url()?>pelayanan/">Pelayanan</a></li>
                                         <li><a href="<?php echo base_url()?>layanan_internet/">Internet Desa</a></li>
                                    </ul>
                                </li>
                                <li class="has-child"><a href="#">Kategori Buku</a>
                                    <ul class="sub-menu">
                                    <?php if (kategori_header() != NULL) {
                                        foreach(kategori_header() as $hasil) {
                                        ?>
                                        <li><a href="<?php echo base_url() ?>kategori/<?php echo $hasil->slug_kategori ?>/"><?php echo $hasil->nama_kategori ?></a></li>
                                    <?php }} ?>
                                    <li><a href="<?php echo base_url() ?>kategori/"> Lainnya..</a></li>
                                    </ul>
                                </li>
                                <li><a href="Berita.html">Populer</a></li>
                                <li><a href="Galeri.html">Terbaru</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="appoinment-header">
                        <a href="#footer-section" class="btn btn-md btn-default">Kontak Desa</a>
                    </div>
                </div>
            </div>
        </div>
    </header>