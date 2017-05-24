<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title ?>
            <small>Web Applications</small>
        </h1>
    </section>
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-calendar-check-o"></i> Data Pinjaman</h3>

                <form method="GET" action="<?php echo base_url('apps/peminjaman/search');?>" style="margin-top: 10px">
                    <div class = "input-group">
                    <span class = "input-group-btn">
                              <a href="<?php echo base_url('apps/peminjaman/add?source=add&utf8=✓') ?>" class = "btn btn-default btn-md" type = "button">
                                <i class="fa fa-plus-circle"></i> Tambah
                              </a>
                           </span>
                        <input type = "text" name = "q" class = "form-control input-md" placeholder="Masukkan Kode Anggota atau Nama Anggota dan Enter" autocomplete="off" id="articles">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <span class = "input-group-btn">
                          <button class = "btn btn-default btn-md" type = "submit">
                             <i class="fa fa-search"></i> Search
                          </button>
                       </span>
                    </div>
                </form>
                <div class="content">
                <div class="row" style="padding-top: 10px">
                <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" style="margin-top:20px;">
                                <tbody>
                                <thead>
                                <tr>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-list-ul"></i> NO.</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-barcode"></i> NAMA PEMINJAM</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-book"></i> JUDUL BUKU</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-calendar"></i> TGL. PINJAM</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-calendar"></i> TGL. KEMBALI</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-info"></i> STATUS BUKU</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-cogs"></i> OPTIONS</th>
                                </tr>
                                </thead>
                                <?php
                                if ($data_pinjam != NULL):
                                     $no = $this->uri->segment(4) + 1;
                                foreach ($data_pinjam->result() as $hasil):

                                    if ($hasil->status == "0") {

                                        $status = '<span class="badge badge-danger" style="background-color: #ff8412;"><i class="fa fa-circle-o-notch fa-spin"></i> Dipinjam</span>';

                                        $update_status = '<a class="badge badge-primary" style="background-color: #1969bc;" data-toggle="tooltip" data-placement="top"  href="' . base_url() . 'apps/peminjaman/confirm/' . $this->encryption->encode($hasil->id_pinjam) . '/' . $this->encryption->encode('1') . '"><i class="fa fa-check-circle"></i> Update</a>';

                                        $no_test = '';

                                } elseif ($hasil->status == "1") {

                                        $status = '<span class="badge badge-success" style="background-color: #358420;"><i class="fa fa-check-circle"></i> Dikembalikan</span>';

                                        $update_status = '<a class="badge badge-primary" style="background-color: #1969bc;" data-toggle="tooltip" data-placement="top"  href="' . base_url() . 'apps/peminjaman/confirm/' . $this->encryption->encode($hasil->id_pinjam) . '/' . $this->encryption->encode('0') . '"><i class="fa fa-ban"></i> Update</a>';
                                        $no_test = $hasil->status;
                                }
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td class="text-center"> <?php echo $hasil->nama ?></td>
                                        <td class="text-center"> <?php echo $hasil->kode_buku ?></td>
                                         <td class="text-center"><?php 
                                         $date = date_create($hasil->tgl_pinjam);
                                            echo date_format($date,"Y/F/d");
                                          ?></td>
                                        <td class="text-center"> <?php $date = date_create($hasil->tgl_kembali);
                                            echo date_format($date,"Y/F/d"); ?></td>
                                        <td class="text-center">
                                             <?php echo $status ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="badge badge-primary" style="background-color: #060884;" data-toggle="tooltip" data-placement="top" title="Lihat Detail" href="<?php echo base_url() ?>apps/peminjaman/detail/<?php echo $this->encryption->encode($hasil->id_pinjam) ?>"><i class="fa fa-external-link"></i> Detail</a>
                                            <div class="btn-group pull-right" role="group">
                                                <?php echo $update_status ?>
                                            </div>
                                            <a class="badge badge-danger" style="background-color: #842020;" data-toggle="tooltip" data-placement="top" title="Delete ?" href="<?php echo base_url() ?>apps/peminjaman/delete/<?php echo $this->encryption->encode($hasil->id_pinjam) ?>"   onclick="return confirm('Anda Yakin Ingin Menghapus?');"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                                </tbody>
                            </table>
                            <?php echo $paging ?>
                            <?php else : ?>
                                </tbody>
                                </table>
                                <div class="alert alert-danger">
                                    <h4><i class="fa fa-info-circle"></i> Warning!</h4>
                                    Maaf!....data tidak ada didatabase sistem
                                </div>
                                <div class="reload" style="text-align: center;margin-bottom: 7px">
                                    <a  href="<?php echo base_url('apps/buku?source=reload&utf8=✓') ?>" class="btn btn-danger btn-reset btn-fill" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Reloading..."><i class="fa fa-repeat"></i> Reload Page</a>
                                </div>
                            <?php endif; ?>
                        </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>