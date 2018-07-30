
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

                                    <h4 class="header-title m-t-0">Tambah Pemilik Wisata</h4>

                                    <div class="m-b-20">
                                        <?php echo form_open_multipart("Admin_Dinas/ptambahPemilikwisata"); ?>

                                            <div class="form-group">
                                                <label for="userName">Nama<span class="text-danger">*</span></label>
                                                <input type="text" name="nama" parsley-trigger="change" required
                                                       placeholder="Enter user name" class="form-control" id="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">NIP<span class="text-danger">*</span></label>
                                                <input type="text" name="NIP" parsley-trigger="change" required
                                                       placeholder="Enter user name" class="form-control" id="NIP" value="<?php echo $_SESSION['nip'] ?>"  readonly>
                                            </div>
                                             <div class="form-group">
                                                <label for="userName">Nomer KTP<span class="text-danger">*</span></label>
                                                <input type="text" name="noktp" parsley-trigger="change" required
                                                       placeholder="Enter user name" class="form-control" id="noktp">
                                            </div>
                                             <div class="form-group">
                                                <label for="userName">Email<span class="text-danger">*</span></label>
                                                <input type="Email" name="email" parsley-trigger="change" required
                                                       placeholder="Enter user name" class="form-control" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="pass1">Password<span class="text-danger">*</span></label>
                                                <input id="pass1" type="password" name="password" placeholder="Password" required
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">alamat<span class="text-danger">*</span></label>
                                                <input type="text" name="alamat" parsley-trigger="change"  required
                                                       placeholder="Enter user name" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">Tempat Lahir<span class="text-danger">*</span></label>
                                                <input type="text" name="tempat" parsley-trigger="change" required
                                                       placeholder="Enter user name" class="form-control" id="noktp">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">Tanggal Lahir<span class="text-danger">*</span></label>
                                                <input type="date" name="tgl_lahir" parsley-trigger="change" required
                                                       placeholder="Enter user name" class="form-control" id="noktp">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">Foto KTP<span class="text-danger">*</span></label>
                                                <input type="file" name="foto_ktp" parsley-trigger="change" required
                                                       placeholder="Enter user name" class="form-control" id="foto_ktp">
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


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="p-20 m-b-20">
                                    <h4 class="m-b-30 m-t-0 header-title">Summernote Editor</h4>
                                    <div class="summernote">
                                        <h4>Hello Summer note</h4>
                                        <ul>
                                            <li>
                                                Select a text to reveal the toolbar.
                                            </li>
                                            <li>
                                                Edit rich document on-the-fly, so elastic!
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->
