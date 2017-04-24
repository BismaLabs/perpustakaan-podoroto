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
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-book"></i> Edit Buku</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="edit-buku">
                            <?php
                            $attributes = array('id' => 'frm_login');
                            echo form_open_multipart('apps/buku/save?source=header&utf8=✓', $attributes)
                            ?>
                            <div class="form-group">
                                <label>Foto Buku</label>
                                <input type="file" class="form-control" name="userfile" style="margin-bottom: 10px">
                                <input type="hidden" name="type" value="<?php echo $type ?>">
                                <input type="hidden" name="kode_buku" value="<?php echo $this->encryption->encode($data_buku['kode_buku']) ?>">
                                <span class="label label-danger">
                                   NOTE!
                                </span>
                                <span>
                                    Foto Buku disarankan ukuran 600 X 300 PX
                                 </span>
                            </div>
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <input type="text" class="form-control" value="<?php echo $data_buku['judul_buku'] ?>" name="judul_buku" placeholder="Judul Buku">
                            </div>
                            <div class="form-group">
                                <label>Kategori Buku</label>
                                <select class="form-control" name="kategori_buku" id="kategori">
                                    <option value="" selected="selected">- - Pilih Kategori Buku - -</option>
                                    <?php
                                    foreach($select_kat->result_array() as $row)
                                    {
                                        if($row['id_kategori']== $data_buku['kategori_id'])
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
                                <input type="text" class="form-control" value="<?php echo $data_buku['pengarang'] ?>" name="pengarang" placeholder="Pengarang">
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" value="<?php echo $data_buku['penerbit'] ?>" name="penerbit" placeholder="Penerbit">
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="text" class="form-control" value="<?php echo $data_buku['tahun_terbit'] ?>" name="tahun_terbit" placeholder="Tahun Terbit">
                            </div>
                            <div class="form-group">
                                <label>No. ISBN</label>
                                <input type="text" class="form-control" value="<?php echo $data_buku['no_isbn'] ?>" name="no_isbn" placeholder="No. ISBN">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Buku</label>
                                <input type="number" class="form-control" value="<?php echo $data_buku['jumlah_buku'] ?>" name="jumlah_buku" placeholder="Jumlah Buku">
                            </div>
                            <div class="submit" style="margin-bottom: 7px">
                                <button type="submit" class="btn btn-success btn-save btn-fill"><i class="fa fa-save"></i> Simpan</button>
                                <button type="reset" class="btn btn-warning btn-reset btn-fill"><i class="fa fa-repeat"></i> Reset</button>
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