<!-- FOR IMPORT: HEADER INFO / AUTHENTICATION -->

<?php
	if (!isset($_SESSION["user_id"])) {
		header('Location: ../login');
		die();
	}
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<title>Clementine</title>
<link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="../favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="../favicon/favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="../favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="../favicon/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="../favicon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="../favicon/manifest.json">
<link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="../favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="../favicon/mstile-144x144.png">
<meta name="msapplication-config" content="../favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<meta name="mobile-web-app-capable" content="yes">
<link rel="icon" sizes="192x192" href="/favicon/android-chrome-192x192.png">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Material Design Lite">
<link rel="apple-touch-icon-precomposed" href="/favicon/apple-touch-icon-precomposed.png">
<meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
<meta name="msapplication-TileColor" content="#3372DF">
<link rel="shortcut icon" href="/favicon/favicon.ico">

<link rel="stylesheet"
	  href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="../css/colors.css">
<link rel="stylesheet" href="../css/styles.css">
