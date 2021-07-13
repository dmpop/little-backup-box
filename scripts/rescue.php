<?php
$theme = "dark";
?>

<!--In developement
lists all devices ls /dev/sd* and adds fsck-Button-->

<html lang="en" data-theme="<?php echo $theme; ?>">
<!-- Author: Dmitri Popov, dmpop@linux.com
         License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->

<head>
	<meta charset="utf-8">
	<title>Little Backup Box</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/classless.css">
	
</head>

<body>
	<?php
	// include i18n class and initialize it
	require_once 'i18n.class.php';
	$i18n = new i18n('lang/{LANGUAGE}.ini', 'cache/', 'en');
	$i18n->init();
// 	if (isset($_POST['save'])) {
// 		Write();
// 	};
	?>
	<nav>
		<ul>
			<li><a href="index.php"><?php echo L::main; ?></a></li>
			<li><a href="sysinfo.php"><?php echo L::sysinfo; ?></a></li>
			<li><a href="config.php"><?php echo L::config; ?></a></li>
			<li class="float-right"><a href="upload.php"><?php echo L::upload; ?></a></li>
		</ul>
	</nav>
	<h1><?php echo L::rescue; ?></h1>
	<?php
// 	function Read()
// 	{
// 		$CONFIGFILE = "config.cfg";
// 		echo file_get_contents($CONFIGFILE);
// 	}
// 	function Write()
// 	{
// 		$CONFIGFILE = "config.cfg";
// 		$fp = fopen($CONFIGFILE, "w");
// 		$data = $_POST["text"];
// 		fwrite($fp, $data);
// 		fclose($fp);
// 	}
	?>
	<div class="card" style="margin-top: 2em;">
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<textarea name="text"><?php Read(); ?></textarea>
			<?php echo '<button style="margin-top: 2em;" type="submit" name="save">' . L::edit_save_b . '</button>'; ?>
		</form>
	</div>
	</div>
</body>

</html>
