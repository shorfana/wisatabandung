<!DOCTYPE html>
<!--[if lt IE 9 ]> <html class="lt_ie9"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class=""><!--<![endif]-->
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>Wisata Bandung</title>

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>maxadventure/images//favicon.ico" />
	
	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>maxadventure/images//apple-touch-icon-114x114-precomposed.png">
	
	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>maxadventure/images//apple-touch-icon-72x72-precomposed.png">
	
	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>maxadventure/images//apple-touch-icon-57x57-precomposed.png">
	
	<!-- Library - Google Font Familys -->
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Nixie+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>maxadventure/revolution/css/settings.css">
	<!-- RS5.0 Layers and Navigation Styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>maxadventure/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>maxadventure/revolution/css/navigation.css">
	
	<!-- Library -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>maxadventure/libraries/lib.css">
	
	<!-- Custom - Theme CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>maxadventure/css/plugins.css">			
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>maxadventure/css/navigation-menu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>maxadventure/css/shortcode.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>maxadventure/style.css">
	
	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->
        <!--1. Memanggil google Maps API-->
        <script src="http://maps.googleapis.com/maps/api/js"></script>
 
        <script>
            // 2. menambahkan properti peta
            function initialize() {
                var properti_peta = {
                    center: new google.maps.LatLng(-6.3145891999999995, 106.9596627),
                    zoom: 8,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                // 4. membuat object peta
                var peta = new google.maps.Map(document.getElementById("tempat_peta"), properti_peta);
            }
            // 5. menampilkan peta
            google.maps.event.addDomListener(window, 'load', initialize);
 
        </script>    
	
</head>

