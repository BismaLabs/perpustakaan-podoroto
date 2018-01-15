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
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-book"></i> Tambah Buku</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="add-user">
                    <?php
                    $attributes = array('id' => 'frm_login');
                    echo form_open_multipart('apps/buku/save?source=header&utf8=✓', $attributes)
                    ?>
                    <div class="form-group">
                        <label>Foto Buku</label>
                        <input type="file" class="form-control" name="userfile" style="margin-bottom: 10px">
                        <input type="hidden" name="type" value="<?php echo $type ?>">
                        <input type="hidden" name="kode_buku" value="<?php echo $this->encryption->encode('BUKU') ?>">
                        <span class="label label-danger">
                           NOTE!
                        </span>
                        <span>
                            Foto Buku disarankan ukuran 600 X 300 PX
                         </span>
                    </div>
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku" placeholder="Judul Buku">
                    </div>
                    <div class="form-group">
                        <label>Kategori Buku</label>
                        <select class="form-control" name="kategori_buku" id="kategori">
                            <option value="" selected="selected">- - Pilih Kategori Buku - -</option>
                            <?php
                            foreach($select_kat->result_array() as $row)
                            {
                                if($row['id_kategori']== $ngeri)
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
                        <label>Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" placeholder="Pengarang">
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="Penerbit">
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="text" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit">
                    </div>
                    <div class="form-group">
                        <label>No. ISBN</label>
                        <input type="text" class="form-control" name="no_isbn" placeholder="No. ISBN">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input type="number" class="form-control" name="jumlah_buku" placeholder="Jumlah Buku">
                    </div>
                    <div class="form-group">
                        <label for="artilces">Deskripsi Buku</label>
                        <textarea class="ckeditor" id="post" name="deskripsi" rows="6" placeholder="Masukkan Deskripsi Buku"></textarea>
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