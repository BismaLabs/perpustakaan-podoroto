<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title ?>
            <small>Web Applications</small>
        </h1>
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="row">
        <div class="col-md-3">
            <div class="box box-success">
             <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-image"></i> Foto</h3>
            </div>
             <figure class="blog-thumb">
                <img src="<?php echo base_url() ?>resources/images/anggota/<?php echo $data_anggota['foto'] ?>" style="width:100%; height:auto alt="" style="object-fit: cover;">
            </figure>
            </div>
        </div>
            <div class="col-md-9">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-male"></i> Detail Anggota</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data_anggota['nama_lengkap'] ?>" placeholder="Nama Lengkap" required>
                            </div>
                             <div class="form-group">
                            <label > Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" required>
                            <option selected="<?php echo $data_anggota['jenis_kelamin'] ?>"><?php echo $data_anggota['jenis_kelamin'] ?></option>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data_anggota['tempat_lahir'] ?>" placeholder="Tempat Lahir" required>
                            </div>
                            <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Lahir<span class="required"style="color: red">*</span></label>
                                    <select class="form-control" name="tgl_lahir" id="tanggal" required>
                                        <option value="">-- Pilih --</option>
                                        <option selected="<?php echo $data_anggota['tgl_lahir'] ?>"><?php echo $data_anggota['tgl_lahir'] ?></option>
                                    <?php
                                    for ($i=1; $i < 31 ; $i++) { ?>
                                       <option><?php echo $i; ?></option>
                                  <?php  }
                                     ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bulan">Bulan <span class="required">
                                    <select style="" class="form-control" name="bulan_lahir" required>
                                        <option value="">-- Pilih --</option>
                                        <option selected="<?php echo $data_anggota['bulan_lahir'] ?>"><?php echo $data_anggota['bulan_lahir'] ?></option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tahun">Tahun <span class="required"
                                   style="color: red">*</span></label>
                                    <select class="form-control" name="tahun" id="tahun" required>
                                     <option value="">-- Pilih --</option>
                                     <option selected="<?php echo $data_anggota['tahun'] ?>"><?php echo $data_anggota['tahun'] ?></option>
                                    <?php
                                    for ($i=1960; $i < 2016 ; $i++) { ?>
                                       <option><?php echo $i; ?></option>
                                  <?php  }
                                     ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" required><?php echo $data_anggota['alamat'] ?></textarea>
                        </div>
                        <div>
                            <label>No Telp/HP</label>
                            <input type="text" value="<?php echo $data_anggota['no_telp'] ?>" name="no_telp" class="form-control" required>
                        </div>
                        <br>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->