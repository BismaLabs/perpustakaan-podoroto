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
                        <h3 class="box-title"><i class="fa fa-file-images-o"></i> Edit Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="update-page">
                        <?php
                        $attributes = array('id' => 'frm_login');
                        echo form_open_multipart('apps/slider/save?source=login&utf8=✓', $attributes)
                        ?>
                        <div class="form-group">
                         <input type="hidden" name="type" value="<?php echo $type ?>">
                             <input type="hidden" name="id_slide" value="<?php echo $this->encryption->encode($data_slide['id_slide']) ?>">
                            <label for="artilces">Caption Slider</label>
                            <?php echo $data_slide['caption'] ?>
                            <input type="text" class="form-control" name="caption" value="<?php echo $data_slide['caption'] ?>" placeholder="Enter Caption Image">
                        </div>
                        <div class="form-group">
                                <label>Foto Slider</label>
                                <input type="file" class="form-control" name="userfile"  style="margin-bottom: 10px">
                                <span class="label label-danger">
                                   NOTE!
                                </span>
                                <span>
                                    Foto Buku disarankan ukuran 600 X 300 PX
                                 </span>
                            </div>
                        <div class="submit">
                            <button type="submit" class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-save"></i> Edit</button>
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