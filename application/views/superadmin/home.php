



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="header-title m-t-0 m-b-20">Welcome !</h4>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box widget-inline">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3 class="m-t-10"><i class="text-primary mdi mdi-access-point-network"></i> <b><?php echo $kotban->wisata ?></b></h3>
                                                <p class="text-muted">Kota Bandung</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3 class="m-t-10"><i class="text-custom mdi mdi-airplay"></i> <b><?php echo $cimahi->wisata ?></b></h3>
                                                <p class="text-muted">Cimahi</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center">
                                                <h3 class="m-t-10"><i class="text-info mdi mdi-black-mesa"></i> <b><?php echo $kabban->wisata ?></b></h3>
                                                <p class="text-muted">Kabupaten Bandung</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-inline-box text-center b-0">
                                                <h3 class="m-t-10"><i class="text-danger mdi mdi-cellphone-link"></i> <b><?php echo $banrat->wisata ?></b></h3>
                                                <p class="text-muted">kabupaten Bandung Barat</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row -->


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h6 class="m-t-0">Jumlah Wisata Tiap Kota</h6>
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li class="list-inline-item">
                                                <p class="font-normal"><i class="fa fa-circle m-r-10 text-primary"></i>Series A</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <p class="font-normal"><i class="fa fa-circle m-r-10 text-muted"></i>Series B</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="dashboard-bar-stacked" style="height: 300px;"></div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h6 class="m-t-0">Sales Analytics</h6>
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li class="list-inline-item">
                                                <p class="font-weight-bold"><i class="fa fa-circle m-r-10 text-primary"></i>Woy</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <p class="font-weight-bold"><i class="fa fa-circle m-r-10 text-info"></i>Tablets</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="dashboard-line-chart" style="height: 300px;"></div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                    </div> <!-- container -->


