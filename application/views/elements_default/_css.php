<!-- Standard -->
<link href="/assets/vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/assets/vendor/datatables/DataTables-1.10.15/css/dataTables.bootstrap.css">

<!-- Template Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>
<link href="/assets/front/css/font-awesome.css" rel="stylesheet" type="text/css">

<!-- Template Styles -->
<link href="/assets/front/css/style.css" rel="stylesheet" type="text/css">
<link href="/assets/front/css/responsive.css" rel="stylesheet" type="text/css">
<link href="/assets/front/css/animate.css" rel="stylesheet" type="text/css">
<link href="/assets/front/css/_custom.css" rel="stylesheet" type="text/css">

<!-- Unique -->
<?php 
if (!empty($page['css'])) {
	echo output_css($page['css']); 
}
?>