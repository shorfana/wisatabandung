
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

                                    <h4 class="header-title m-t-0">Ubah admin dinas</h4>


                                    <div class="m-b-20">
                                      <form action="<?php echo base_url()."Superadmin/pupdateAdmindinas" ?>" method="POST" class="form-validation">
                                          <div class="form-group">
                                              <label for="userName">NIP<span class="text-danger">*</span></label>
                                              <input type="text" name="username" parsley-trigger="change" required value="<?php echo $username ?>"
                                                     placeholder="Enter user name" class="form-control" id="username" readonly>
                                          </div>
                                          <div class="form-group">
                                              <label for="userName">Nama<span class="text-danger">*</span></label>
                                              <input type="text" name="nama" parsley-trigger="change" required value="<?php echo $nama ?>"
                                                     placeholder="Enter user name" class="form-control" id="nama">
                                          </div>
                                          <div class="form-group">
                                              <label for="pass1">Password<span class="text-danger">*</span></label>
                                              <input id="pass1" type="password" name="password" placeholder="Password" required
                                                     value="<?php echo $password ?>"  class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <div class="checkbox">
                                                  <input id="remember-1" type="checkbox">
                                                  <label for="remember-1"> Remember me </label>
                                              </div>
                                          </div>

                                          <div class="form-group text-right m-b-0">
                                              <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                  Simpan
                                              </button>
                                              <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                  Cancel
                                              </button>
                                          </div>

                                      </form>
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
