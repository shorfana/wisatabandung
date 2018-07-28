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

        <!-- App css -->
        <link href="<?php echo base_url() ?>dark/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>dark/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>dark/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>dark/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url() ?>dark/assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 card-box">
                                <div class="text-center">
                                    <h3 class="text-uppercase m-t-0 m-b-30">
                                        Register Pemilik Wisata
                                    </h>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" action="<?php echo base_url()."Register/pRegistrasipemilikwisata" ?>" enctype="multipart/form-data" method="POST">
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Nama </label>
                                                <input class="form-control" type="text" name="nama" placeholder="Enter your Username">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Nomer KTP</label>
                                                <input class="form-control" type="text" name="noktp" placeholder="Enter your Username">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Email</label>
                                                <input class="form-control" type="text" name="email" placeholder="Enter your Username">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="Enter your password">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Alamat</label>
                                                <input class="form-control" type="text" name="alamat" placeholder="Enter your Username">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Tempat Lahir</label>
                                                <input class="form-control" type="text" name="tempat" placeholder="Enter your Username">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Tanggal Lahir</label>
                                                <input class="form-control" type="text" name="tgl_lahir" placeholder="Enter your Username">
                                            </div>
                                        </div><div class="form-group m-b-10">
                                            <div class="col-xs-5">
                                                <label for="username">Foto KTP</label>
                                                <input class="form-control" type="file" name="foto_ktp" placeholder="Enter your Username">
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-5">
                                                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-dark m-l-5">Sign Up</a></p>
                                </div>
                            </div>

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>


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

    </body>
</html>
    