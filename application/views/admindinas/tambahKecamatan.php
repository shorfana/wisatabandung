
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                       


                        <div class="row">

                            <div class="col-lg-6">
                                <div class="p-20 m-b-20">

                                    <h4 class="header-title m-t-0">Form untuk menambahkan Kecamatan</h4>
                                    <p class="text-muted font-13 m-b-10">
                                        Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                                    </p>

                                    <div class="m-b-20">
                                        <?php echo form_open_multipart("Admin_Dinas/createKec"); ?>
                                        
                                            <div class="form-group">
                                                <label for="userName">Nama Kecamatan<span class="text-danger">*</span></label>
                                                <input type="text" name="nama_kecamatan" parsley-trigger="change" required
                                                       placeholder="Enter user name" class="form-control" id="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">Kode Kabupaten<span class="text-danger">*</span></label>
                                                <input type="text" name="kode_kabupaten" parsley-trigger="change" required
                                                       placeholder="Enter user name" class="form-control" id="NIP" value="<?php echo $_SESSION['kode_kabupaten'] ?>"  readonly>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <input id="remember-1" type="checkbox">
                                                    <label for="remember-1"> Remember me </label>
                                                </div>
                                            </div>

                                            <div class="form-group text-right m-b-0">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                            <?php echo form_close(); ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    </div>
                    </div> <!-- container -->
