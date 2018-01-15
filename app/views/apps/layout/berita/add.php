<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-book"></i> Tambah Berita</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="add-user">
                            <?php
                            $attributes = array('id' => 'frm_login');
                            echo form_open_multipart('apps/berita/save?source=header&utf8=✓', $attributes)
                            ?>
                            <div class="form-group">
                                <label>Gambar Berita</label>
                                <input type="file" class="form-control" name="userfile" style="margin-bottom: 10px">
                                <input type="hidden" name="type" value="<?php echo $type ?>">
                                <span class="label label-danger">
                                   NOTE!
                                </span>
                                <span>
                                    Gambar Berita disarankan ukuran 600 X 300 PX
                                 </span>
                            </div>
                            <div class="form-group">
                                <label>Judul Berita</label>
                                <input type="text" class="form-control" name="judul_berita" placeholder="Judul Berita">
                            </div>
                            <div class="form-group">
                                <label for="artilces">Isi Berita</label>
                                <textarea class="ckeditor" id="post" name="isi_berita" rows="6" placeholder="Masukkan Isi Berita"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Keywords</label>
                                <input type="text" class="form-control" name="keywords" placeholder="Masukkan Kata Kunci Berita">
                            </div>
                            <div class="form-group">
                                <label for="artilces">Descriptions</label>
                                <textarea class="form-control" id="post" name="descriptions" rows="3" placeholder="Masukkan Deskripsi Singkat Berita"></textarea>
                            </div>
                            <div class="submit" style="margin-bottom: 7px">
                                <button type="submit" class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-save"></i> Tambah</button>
                                <button type="reset" class="btn bg-orange btn-flat btn-fill"><i class="fa fa-repeat"></i> Reset</button>
                            </div>
                            <?php 
error_reporting(E_ALL);
ini_set("display_errors", "on");
 ?>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

