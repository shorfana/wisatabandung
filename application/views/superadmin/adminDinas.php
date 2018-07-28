


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
                                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function.
                                        <br><br>
                                        <a href="<?php echo base_url()."Superadmin/vtambahAdmindinas" ?>" class="btn btn-custom btn-rounded">Tambah Admin Dinas</a>
                                    
                                    
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>nama Admin Dinas</th>
                                            <th>Kode Kabupaten</th>
                                            <th>Aksi</th>
                                           <!--  <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th> -->
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($admin_dinas as $ad): ?>    
                                        <tr>
                                            <td><?php echo $ad->username ?></td>
                                            <td><?php echo $ad->nama ?></td>
                                            <td><?php echo $ad->kode_kabupaten ?></td>
                                            <td><span class="badge badge-custom badge-pill"><a href="<?php echo site_url('Superadmin/vUpdateadmindinas/'.$ad->username) ?>"><font color="white">Ubah</font></a></span>
                                            <span class="badge badge-custom badge-pill"><a href="<?php echo base_url()."Superadmin/deleteAdmindinas?username=".$ad->username ?>"><font color="white">Hapus</font></a></span></td>
                                        </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->




                    </div> <!-- container -->


                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->





        <!-- Required datatable js -->
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/dataTables.select.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url() ?>dark/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/js/jquery.app.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="<?php echo base_url() ?>dark/assets/plugins/datatables/dataTables.select.min.js"></script>          

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
