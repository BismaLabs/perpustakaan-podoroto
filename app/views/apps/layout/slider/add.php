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
                        <h3 class="box-title"><i class="fa fa-file-images-o"></i> Tambah Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="update-page">
                        <?php
                        $attributes = array('id' => 'frm_login');
                        echo form_open_multipart('apps/slider/save?source=login&utf8=✓', $attributes)
                        ?>
                        <div class="form-group">
                            <label for="artilces">Caption Slider</label>
                            <input type="text" class="form-control" name="caption" id="articles" placeholder="Enter Caption Image">
                            <input type="hidden" name="type" value="<?php echo $type ?>">
                        </div>
                        <div class="form-group">
                                <label>Foto Slider</label>
                                <input type="file" class="form-control" name="foto" style="margin-bottom: 10px">
                                <span class="label label-danger">
                                   NOTE!
                                </span>
                                <span>
                                    Foto Buku disarankan ukuran 600 X 300 PX
                                 </span>
                            </div>
                        <div class="submit">
                            <button type="submit" class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-save"></i> Tambah</button>
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