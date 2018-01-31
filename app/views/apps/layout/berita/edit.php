<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-book"></i> Edit Berita</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="">
                            <?php
                            $attributes = array('id' => 'frm_login');
                            echo form_open_multipart('apps/berita/save?source=header&utf8=✓', $attributes)
                            ?>
                            <div class="form-group">
                                <label>Gambar Berita</label>
                                <input type="file" class="form-control" name="userfile" style="margin-bottom: 10px">
                                <input type="hidden" name="type" value="<?php echo $type ?>">
                                <input type="hidden" name="id_berita" value="<?php echo $this->encryption->encode($data_berita['id_berita']) ?>">
                                <span class="label label-danger">
                                   NOTE!
                                </span>
                                <span>
                                    Gambar Berita disarankan ukuran 600 X 300 PX
                                 </span>
                            </div>
                            <div class="form-group">
                                <label>Judul Berita</label>
                                <input type="text" class="form-control" value="<?php echo $data_berita['judul_berita'] ?>" name="judul_berita" placeholder="Judul Berita">
                            </div>
                            <div class="form-group">
                                <label>Kategori Buku</label>
                                <select class="form-control" name="kategori" id="kategori">
                                    <option value="" selected="selected">- - Pilih Kategori Berita - -</option>
                                    <?php
                                    foreach($select_kat->result_array() as $row)
                                    {
                                        if($row['id_kategori']== $data_berita['kategori_id'])
                                        {
                                            ?>
                                            <option value="<?php echo $row['id_kategori']; ?>" selected="selected"><?php echo $row['nama_kategori']; ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['nama_kategori']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="artilces">Isi Berita</label>
                                <textarea class="ckeditor" id="post" name="isi_berita" rows="6" placeholder="Masukkan Isi Berita"><?php echo $data_berita['isi_berita'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Keywords</label>
                                <input type="text" class="form-control" value="<?php echo $data_berita['keywords'] ?>" name="keywords" placeholder="Masukkan Kata Kunci Berita">
                            </div>
                            <div class="form-group">
                                <label for="artilces">Descriptions</label>
                                <textarea class="form-control" id="post" name="descriptions" rows="3" placeholder="Masukkan Deskripsi Singkat Berita"><?php echo $data_berita['descriptions'] ?></textarea>
                            </div>
                            <div class="submit" style="margin-bottom: 7px">
                                <button type="submit" class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-save"></i> Simpan</button>
                                <button type="reset" class="btn bg-orange btn-flat btn-fill"><i class="fa fa-repeat"></i> Reset</button>
                            </div>
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