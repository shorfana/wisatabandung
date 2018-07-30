<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">
<!-- Start content -->
<div class="content">
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <h4 class="header-title m-t-0 m-b-20">Data Wisata</h4>
      </div>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="table-responsive">

            <div class="col-md-6 text-right">
              <br><br>
              <a href="<?php echo base_url()."Admin_Dinas/tambahwisata" ?>" class="btn btn-custom btn-rounded">Tambah Data Wisata</a>
                            <a href="<?php echo base_url()."Admin_Dinas/export" ?>" class="btn btn-custom btn-rounded">Export Data Wisata</a>
               <!-- <?php echo anchor(site_url('Pemilik_Wisata/tambahwisata'), 'Tambah Film', 'class="btn btn-primary"'); ?> -->
            </div>
            <!--<a href="www.facebook.com">
               <button class="btn btn-sm btn-primary pull-right" type="submit">Tambah Data</button> <br><br>
               </a>-->
            <table id="datatable" class="table table-bordered">
              <thead>
                 <tr>
                    <th>Nama Wisata</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Alamat</th>
                    <th>Keterangan Wisata</th>
                    <th>Status</th>
                    <th> Aksi </th>
                 </tr>
              </thead>
              <tbody>
                <?php foreach ($data_wisata as $d): ?>
                 <tr>
                    <td><?php echo $d->nama_wisata ?></td>
                    <td><?php echo $d->latitude ?></td>
                    <td><?php echo $d->longitude ?></td>
                      <td><?php echo $d->alamat ?></td>
                    <td><?php echo $d->deskripsi ?></td>
                    <td><?php if ($d->aktif=='Y') {
                      echo "Aktif";
                    } else {
                      echo "Tidak Aktif";
                    }
                    ?></td>
                    <td> <a href="<?php echo site_url('Admin_Dinas/editwisata/'.$d->kode_wisata) ?>">ubah</a>
                      <a href="<?php echo site_url('Admin_Dinas/hapuswisata/'.$d->kode_wisata) ?>">hapus</a>
                      <a href="<?php echo site_url('Admin_Dinas/aktifwisata/'.$d->kode_wisata) ?>">aktif</a>
                     </td>
                 </tr>
                 <?php endforeach; ?>
              </tbody>
            </table>
         </div>
      </div>
   </div>
   <!-- end row -->
</div>
<!-- container -->
