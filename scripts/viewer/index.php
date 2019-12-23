<?php 
define('PROJECT_ROOT', getcwd());
?> 

<!DOCTYPE html>
<html> 
    <head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Little Backup Box</title>
	<!-- Include stylesheet -->
	<link href="viewer/css/styles.css" rel="stylesheet"/> 
	<!-- FancyBox --> 
	<link rel="stylesheet" href="viewer/css/jquery.fancybox.min.css" />
	<script src="viewer/js/jquery.fancybox.min.js"></script>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	</head> 
	<body>
			<div class="filemanager">
			<div class="search">
				<input type="search" placeholder="Find a file" />
			</div>
			<div class="breadcrumbs"></div>
			<a class="button folderName" id="backButton" href=""><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
			<a class="button" href="./"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
			<ul class="data"></ul>
			
			<!-- Include script files -->
			<script src="viewer/js/jquery.min.js"></script>
			<script src="viewer/js/script.js"></script>
			<script src="viewer/js/jquery.fancybox.min.js"></script>
			<script>
			 $('.fancybox-media').fancybox({
			     type: 'iframe',
			     width: 800,
			     height: 580,
			     fitToView: false,
			     iframe : {
				 preload : false
			     }
			 }); 
			</script>
	</body>
</html>
