<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SimpleAdmin - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>dark/assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="<?php echo base_url() ?>dark/ssets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>dark/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url() ?>dark/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Multi Item Selection examples -->
        <link href="<?php echo base_url() ?>dark/assets/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?php echo base_url() ?>dark/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>dark/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>dark/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>dark/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url() ?>dark/assets/js/modernizr.min.js"></script>

    </head>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="header-title m-t-0 m-b-20">Data Tables</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <h6 class="font-14 mt-4">Default Example</h6>
                                    <p class="text-muted font-13 m-b-30">
                                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
                                    </p>
                                        <a href="<?php echo base_url()."Superadmin/vtambahAdmindinas" ?>" class="btn btn-custom btn-rounded">Tambah Pemilik Wisata</a>
                                        <br><br>

                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Nomer KTP</th>
                                            <th>Email</th>
                                            <th>Alamat </th>
                                            <th>Tempat Wisata</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Foto KTP</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pemilik_wisata as $p):  ?>
                                        <tr>
                                            <td><?php echo $p->nama ?></td>
                                            <td><?php echo $p->NIP ?></td>
                                            <td><?php echo $p->noktp ?></td>
                                            <td><?php echo $p->email ?></td>
                                            <td><?php echo $p->alamat ?></td>
                                            <td><?php echo $p->tempat ?></td>
                                            <td><?php echo $p->tgl_lahir ?></td>
                                            <td><?php echo $p->foto_ktp ?></td>
                                            <td>Ubah</td>
                                            <td>Hapus</td>
                                        </tr>
                                    <?php endforeach  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->



                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="<?php echo base_url() ?>dark/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/js/waves.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/js/jquery.slimscroll.js"></script>



        <!-- App js -->
        <script src="<?php echo base_url() ?>dark/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>

