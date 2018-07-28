


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
                                        <a href="<?php echo base_url()."Admin_Dinas/tambah_kelurahan" ?>" class="btn btn-custom btn-rounded">Tambah Kelurahan</a>
                                    
                                    
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Kode Kelurahan</th>
                                            <th>Nama Kelurahan</th> 
                                            <th>Nama Kecamatan</th>
                                            <th>Aksi</th>
                                           <!--  <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th> -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($kelurahan as $k): ?>    
                                        <tr>
                                            <td><?php echo $k->kode_kelurahan ?></td>
                                            <td><?php echo $k->nama_kelurahan ?></td>
                                            <td><?php echo $k->nama_kecamatan ?></td>
                                            <td><a href="<?php echo site_url('Admin_Dinas/vUpdateKel/'.$k->kode_kelurahan) ?>" class="btn btn-custom btn-rounded">Ubah</a><br><br>
                                            <a href="<?php echo site_url('Admin_Dinas/pDeletekel/'.$k->kode_kelurahan) ?>" class="btn btn-custom btn-rounded">Hapus</a></td>
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
