<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyABAiRMExl_KVCugrFbUO5FJwNTo_94vt0&libraries=places"></script>
<script type="text/javascript">

 var triangleCoords = [ <?php echo $polygon->coordinate ?>
            ];




function init(){
 //var info_window = new google.maps.InfoWindow();

 // membuat peta
 var map = new google.maps.Map(document.getElementById('maps'),{
  'center': {lat : -6.91757808164908, lng : 107.60850421142572},
  'zoom': 12,
   scaleControl : true,
  'mapTypeId': google.maps.MapTypeId.ROADMAP
  });
  /*info_window = new google.maps.InfoWindow({
  'content': 'loading...'
 });*/

 var polygon = new google.maps.Polygon({
      path:triangleCoords,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 3,
      fillColor: '#FF0000',
      fillOpacity: 0.35
      });

 polygon.setMap(map);

 polygon.addListener('click', showArrays);

}



  function updateMarkerPosition(latLng) {
       document.getElementById('lat').value = [latLng.lat()];//posisi marker mengikuti nilai latitude yang di klik/pilih
       document.getElementById('lng').value = [latLng.lng()];////posisi marker mengikuti nilai longitude yang di klik/pilih
  }

  var gmarkers = [];

  function showArrays(event) {

    //jquery
      $("#lat").val(event.latLng.lat());//mengambil nilai latitude dan ditampilkan nantinya di form input
      $("#lng").val(event.latLng.lng());//mengambil nilai longitude dan ditampilkan nantinya di form input



      //inisialisasi marker
      var marker1 = new google.maps.Marker({
        position : new google.maps.LatLng(event.latLng.lat(), event.latLng.lng()),
        title : 'lokasi',
        map : map,
        draggable : false
      });
      removeMarkers();
      gmarkers.push(marker1);

  }

  //fungsi hapus marker. marker akan dihapus ketika klik pada posisi yang lain.
  function removeMarkers(){
        for(i=0; i<gmarkers.length; i++){
            gmarkers[i].setMap(null);
        }
  }

function cari_alamat(){

 google.maps.Polygon.prototype.Contains = function (point) {
    var crossings = 0,
        path = this.getPath();

    // for each edge
      for (var i = 0; i < path.getLength(); i++) {
        var a = path.getAt(i),
            j = i + 1;
        if (j >= path.getLength()) {
            j = 0;
        }
        var b = path.getAt(j);
        if (rayCrossesSegment(point, a, b)) {
            crossings++;
        }
      }

    // odd number of crossings?
    return (crossings % 2 == 1);

    function rayCrossesSegment(point, a, b) {
        var px = point.lng(),
            py = point.lat(),
            ax = a.lng(),
            ay = a.lat(),
            bx = b.lng(),
            by = b.lat();
        if (ay > by) {
            ax = b.lng();
            ay = b.lat();
            bx = a.lng();
            by = a.lat();
        }
        // alter longitude to cater for 180 degree crossings
        if (px < 0) {
            px += 360;
        }
        if (ax < 0) {
            ax += 360;
        }
        if (bx < 0) {
            bx += 360;
        }

        if (py == ay || py == by) py += 0.00000001;
        if ((py > by || py < ay) || (px > Math.max(ax, bx))) return false;
        if (px < Math.min(ax, bx)) return true;

        var red = (ax != bx) ? ((by - ay) / (bx - ax)) : Infinity;
        var blue = (ax != px) ? ((py - ay) / (px - ax)) : Infinity;
        return (blue >= red);

    }

 };

 // mengambil isi dari textarea dengan id alamat
 var alamat = document.getElementById('alamat').value;

 // membuat geocoder
 var geocoder = new google.maps.Geocoder();
 geocoder.geocode(
  {'address': alamat},
  function(results, status) {
   if (status == google.maps.GeocoderStatus.OK) {
    var info_window = new google.maps.InfoWindow();

    // mendapatkan lokasi koordinat
    var geo = results[0].geometry.location;

    // set koordinat
    var pos = new google.maps.LatLng(geo.lat(),geo.lng());

    //cek lat long di dalam polygon
    var point = new google.maps.LatLng(geo.lat(),geo.lng());

    var polygon = new google.maps.Polygon({
            path:triangleCoords,
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 3,
            fillColor: '#FF0000',
            fillOpacity: 0.35
            });

         if (polygon.Contains(point)) {
              // point is inside polygon

            // menampilkan latitude dan longitude pada id lat dan lng
            var lat = document.getElementById('lat').value = geo.lat();
            var lng = document.getElementById('lng').value = geo.lng();

             // membuat peta
            var map = new google.maps.Map(document.getElementById('maps'),{
              'center': pos,
              'zoom': 17,
              'mapTypeId': google.maps.MapTypeId.ROADMAP
             });
            polygon.setMap(map);

            // menambahkan marker pada peta
            var marker = new google.maps.Marker({
             position: pos,
             title: alamat,
             animation:google.maps.Animation.BOUNCE
            });
            marker.setMap(map);

            // menambahkan event click ketika marker di klik
            google.maps.event.addListener(marker, 'click', function () {
             info_window.setContent('<b>'+ this.title +'</b>');
             info_window.open(map, this);
            });
          } else {
            alert('Mohon Maaf Lokasi yang Anda Masukan diluar Kota Bandung');
              var lat = document.getElementById('lat').value = "";
            var lng = document.getElementById('lng').value = "";
          }

   } else {
     alert('Lokasi Tidak Ditemukan');
   }
  }
 );
}
google.maps.event.addDomListener(window, 'load', init);

</script>

<div class="content-page">
<!-- Start content -->
<div class="content">
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-12">
         <div class="p-20 m-b-20">
            <h4 class="header-title m-t-0">Form untuk menambahkan admin dinas</h4>
            <div id="maps" style="width: 900px; height: 520px; left: 0px;" ></div>
            <div class="col-md-12">
               <textarea class="form-control" rows="1" name="alamat" id="alamat" placeholder="Cari Alamat"></textarea>
               <div class="row">
                 <br>
                 <button class="btn btn-primary" onclick="cari_alamat()" >CARI ALAMAT</button>
               </div>
            </div>
            <hr>
            <div class="m-b-20">
               <form action="<?php echo base_url() ?>Admin_Dinas/actioneditwisata" class="form-validation" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                     <label>Kode Wisata<span class="text-danger">*</span></label>
                     <input type="text" name="kode_wisata" parsley-trigger="change" required
                        placeholder="Masukan Kode Wisata" class="form-control" id="kode_wisata" value="<?php echo $data_wisata->kode_wisata ?>">
                  </div>
                  <div class="form-group">
                     <label>Nama Wisata<span class="text-danger">*</span></label>
                     <input type="text" name="nama_wisata" parsley-trigger="change" required
                        placeholder="Masukan nama Wisata" class="form-control" id="nama_wisata" value="<?php echo $data_wisata->nama_wisata ?>">
                  </div>
                  <div class="form-group row">
                     <div class="col-sm-6">
                        <label>Latitude<span class="text-danger">*</span></label>
                        <input id="lat" name="latitude" type="text" placeholder="Latitude" required
                           class="form-control" value="<?php echo $data_wisata->latitude ?>">
                     </div>
                     <div class="col-sm-6">
                        <label>Longitude<span class="text-danger">*</span></label>
                        <input id="lng" name="longitude" type="text" placeholder="Longitude" required
                           class="form-control" value="<?php echo $data_wisata->longitude ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Alamat:</label>
                     <textarea class="form-control" rows="1" name="alamat" value=""><?php echo $data_wisata->alamat ?>  </textarea>
                  </div>
                  <div class="form-group">
                     <label>Deskripsi:</label>
                     <textarea class="form-control" rows="5" name="deskripsi" value=""><?php echo $data_wisata->deskripsi ?></textarea>
                  </div>
                  <div class="form-group">
                        <label>Kabupaten</label>
                        <select class="form-control" name="kabupaten" id="kabupaten">
                            <?php
                            foreach ($kabupaten as $kab) {
                                ?>
                                <option <?php echo $kabupaten_selected == $kab->kode_kabupaten ? 'selected="selected"' : '' ?>
                                    value="<?php echo $kab->kode_kabupaten ?>"><?php echo $kab->nama_kabupaten ?></option>
                                <?php
                            }
                            ?>>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="kecamatan">
                            <option value="">Please Select</option>
                            <?php
                            foreach ($kecamatan as $kec) {
                                ?>
                                <!--di sini kita tambahkan class berisi id provinsi-->
                                <option <?php echo $kecamatan_selected == $kec->kode_kecamatan ? 'selected="selected"' : '' ?>
                                    class="<?php echo $kec->kode_kabupaten ?>" value="<?php echo $kec->kode_kecamatan ?>"><?php echo $kec->nama_kecamatan ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelurahan</label>
                        <select class="form-control" name="kelurahan" id="kelurahan">
                            <option value="">Please Select</option>
                            <?php
                            foreach ($kelurahan as $kel) {
                                ?>
                                <!--di sini kita tambahkan class berisi id kota-->
                                <option <?php echo $kelurahan_selected == $kel->kode_kelurahan ? 'selected="selected"' : '' ?>
                                    class="<?php echo $kel->kode_kecamatan ?>" value="<?php echo $kel->kode_kelurahan ?>"><?php echo $kel->nama_kelurahan ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                  <div class="form-group">
                    <label>Choose Files</label>
                    <input type="file" name="files[]" multiple/>
                  </div>
                  <div class="form-group text-right m-b-0">
                     <button class="btn btn-primary waves-effect waves-light" type="submit">
                     Submit
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
   <script src="<?php echo base_url('dark/assets/jquery-1.10.2.min.js') ?>"></script>
        <script src="<?php echo base_url('dark/assets/jquery.chained.min.js') ?>"></script>
        <script>
            $("#kecamatan").chained("#kabupaten"); // disini kita hubungkan kota dengan provinsi
            $("#kelurahan").chained("#kecamatan"); // disini kita hubungkan kecamatan dengan kota
        </script>
    </script>
   <!-- end row -->
</div>
<!-- container -->
