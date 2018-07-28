<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
<!-- Start content -->
<div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="m-b-20 header-title">Form Elements</h4>

                                <div class="row">
                                    <div class="col-md-12">
                                         <form class="form-horizontal" action="<?php echo base_url()."Pemilik_Wisata/editprofileact" ?>" enctype="multipart/form-data" method="POST">
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Nama </label>
                                                <input class="form-control" type="text" name="nama" placeholder="Enter your Username" value="<?php echo $pemilik_wisata->nama ?>">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Nomer KTP</label>
                                                <input class="form-control" type="text" name="noktp" placeholder="Enter your Username" value="<?php echo $pemilik_wisata->noktp ?>">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Email</label>
                                                <input class="form-control" type="text" name="email" placeholder="Enter your Usemail e" value="<?php echo $pemilik_wisata->email ?>">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="Enter your password" value="<?php echo $pemilik_wisata->password ?>">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Alamat</label>
                                                <textarea class="form-control" rows="1" name="alamat"> <?php echo $pemilik_wisata->alamat ?> </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Tempat Lahir</label>
                                                <input class="form-control" type="text" name="tempat" placeholder="Enter your Username" value="<?php echo $pemilik_wisata->tempat ?>">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Tanggal Lahir</label>
                                                <input class="form-control" type="date" name="tgl_lahir" placeholder="Enter your Username" value="<?php echo $pemilik_wisata->tgl_lahir ?>">
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-5">
                                                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
                                            </div>
                                        </div>

                                    </form>
                                        
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->


                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container -->