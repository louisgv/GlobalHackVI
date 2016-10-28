<!doctype html>
<?php

require '../db_manager.php';
require '../search.php';

$x;
if (isset($_GET["query"])) {
	$x = search("client", $_GET["query"]);
}

$userType;
if (isset($_SESSION["user_id"])) {
	$userType = getUserType($_SESSION["user_id"]);
} else {
	$userType = "clientNoAuth";
	header('Location: ../services/');
}

?>
<html lang="en">
<head>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<style>
		#tabel {
			width: 90%;
			margin-left: 5%;
		}

		#srk {
			width: 90%;
		}
	</style>
</head>
<body>
	<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
		<header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">Dash</span>
				<div class="mdl-layout-spacer"></div>

				<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
					<i class="material-icons">more_vert</i>
				</button>
				<ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
					<li class="mdl-menu__item">About</li>
					<li class="mdl-menu__item">Contact</li>
					<li class="mdl-menu__item">Legal information</li>
				</ul>
			</div>
		</header>
		<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
			<header class="demo-drawer-header">
				<img id="logoname" src="../img/name2.png"/>
				<div class="demo-avatar-dropdown">
					<span>
						<?php
						if (isset($_SESSION["user_id"])) {
							$name = getUsersName($_SESSION["user_id"]);
						} else {
							$name = "<a style=\"align-items: center; color: rgba(255, 255, 255, 0.85); font-weight: 500;\" class=\"mdl-navigation__link\" href=\"../login/\">Login</a>";
						}
						echo $name;
						?>
					</span>
					<div class="mdl-layout-spacer"></div>
					<?php
					if (isset($_SESSION["user_id"])) { ?>
						<button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
							<i class="material-icons" role="presentation">arrow_drop_down</i>
							<span class="visuallyhidden">Logout</span>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
							<li class="mdl-menu__item"><a id="logoutbuttonnav" href="../logout/">Logout</a></li>
						</ul>
					<?php
					}
					?>
				</div>
			</header>
			<?php
			global $userType, $a;
			switch ($userType) { // [alt text, mdl font icon, current page]
				case "clientNoAuth":
					$a = [["services", "domain", false], ["housing", "home", false]];
					break;
				case "client":
					$a = [["dash", "dashboard", true], ["profile", "account_box", false], ["services", "domain", false], ["housing", "home", false]];
					break;
				case "coc":
					$a = [["dash", "dashboard", true], ["profile", "account_box", false], ["services", "domain", false], ["housing", "home", false], ["availability", "people", false], ["statistics", "timeline", false]];
					break;
				case "host":
					$a = [["dash", "dashboard", true], ["profile", "account_box", false], ["services", "domain", false], ["availability", "people", false], ["statistics", "timeline", false]];
					break;
				default:
					$a = [["dash", "dashboard", true], ["services", "domain", false], ["housing", "home", false]];
					break;
			}

			?>
			<nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
				<?php
				foreach ($a as $arr) {
					$active = "";
					if ($arr[2]) $active = "active-nav ";
					echo "<a href=../" . $arr[0] . " class=\"" . $active . "mdl-navigation__link\"><i class=\"mdl-color-text--blue-grey-400 material-icons\" role=\"presentation\">" . $arr[1] . "</i>" . ucwords($arr[0]) . "</a>";
				}
				?>
				<div class="mdl-layout-spacer"></div>
				<a class="mdl-navigation__link" href="../faq/"><i class="mdl-color-text--blue-grey-400 material-icons"
																  role="presentation">help_outline</i><span>FAQ</span></a>
			</nav>
		</div>
		<main class="mdl-layout__content mdl-color--grey-100">
			<div class="mdl-grid">
				
				<div id="srk" class="mdh-expandable-search">
					<i class="material-icons">search</i>
					<form action="./" method="GET">
						<input type="text" placeholder="Search" value="" name="query" size="1">
					</form>
				</div>

				<?php

				if (isset($_GET) && isset($x)) {
					if (count($x) > 0) {
						echo "<div class=\"mdl-cell mdl-cell--12-col\">";
						echo "<table style='width: 100%; margin-right: auto; margin-left: auto; margin-top: 25px' id=\"tabel\" class=\"mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp\"><thead><tr><th class=\"mdl-data-table__cell--non-numeric\">First Name</th><th>Middle Name</th><th>Last Name</th><th>User Profile</th><th>Add User</th></tr></thead><tbody>";
						for ($ix = 0; $ix < count($x); $ix++) {

							$id = $x[$ix]["id"];
							$taken = "";
							$mysqli = getDB();
							if ($mysqli->query("SELECT * FROM provided_services WHERE client_id=$id")->fetch_assoc()) $taken = "style='color: rgb(255, 0, 0)'";

							echo "<tr $taken><td class=\"mdl-data-table__cell--non-numeric\">" . $x[$ix]["First_Name"] . "</td><td>" . $x[$ix]["Middle_Name"] . "</td><td>" . $x[$ix]["Last_Name"] . "</td><td><a href=" . ("../profile/?client=" . $x[$ix]["id"]) . "> <i class=\"mdl-color-text--blue-grey-400 material-icons\" role=\"presentation\">person</i></a></td><td><a href=" . ("add.php?client=" . $x[$ix]["id"]) . "> <i style=\"color:green\" class=\"mdl-color-text--blue-grey-400 material-icons\" role=\"presentation\">add</i></a></td></tr>";
						}
						echo "</tbody></table></div>";
					} else {
						echo "<h5 style=\"width: 100%; text-align: center; color: red;\"> No Results Found </h5>";
					}
				}

				// RESERVATION REQUESTS

				if (isset($_SESSION["user_id"])) {
					if (getUserType($_SESSION["user_id"]) == "host" or getUserType($_SESSION["user_id"]) == "coc") {
						?>
							<div class="mdl-cell mdl-cell--6-col" style="margin-top: 25px">
								<table id="tabel" class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
									<thead>
										<tr><th>Reservation Requests</th></tr>
										<tr>
											<th class="mdl-data-table__cell--non-numeric">Name</th>
											<th>Visit Profile</th>
											<th>Accept</th>
											<th>Deny</th>
										</tr>
									</thead>
									<tbody>
						<?php
						// echoes table body data - reservation requests
						if (isset($x) && count($x) > 0) {
							for ($ix = 0; $ix < count($x); $ix++) {
								echo "<tr><td class=\"mdl-data-table__cell--non-numeric\">" . $x[$ix]["First_Name"] . " " . $x[$ix]["Last_Name"] . "</td><td><a href=" . ("../profile/?client=" . $x[$ix]["id"]) . "> <i class=\"mdl-color-text--blue-grey-400 material-icons\" role=\"presentation\">person</i></a></td><td><a href=" . ("../availability/add.php?client=" . $x[$ix]["id"]) . "> <i style=\"color:red\" class=\"mdl-color-text--blue-grey-400 material-icons\" role=\"presentation\">check_circle</i></a></td><td><a href=" . ("../availability/remove.php?client=" . $x[$ix]["id"]) . "> <i style=\"color:green\" class=\"mdl-color-text--blue-grey-400 material-icons\" role=\"presentation\">close</i></a></td></tr>";
							}
						}


						?>	
									</tbody>

								</table>
							</div>
						<?php
					}
				}

				// CURRENT SHELTER MEMBERS

				?>

				<div class="mdl-cell mdl-cell--6-col" style="margin-top: 25px">
					<table style="width: 500px; margin-right: auto; margin-left: auto; margin-bottom: 50px" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
						<thead>
							<tr><th>Shelter Members</th></tr>
							<tr>
								<th class="mdl-data-table__cell--non-numeric">Name</th>
								<th>Profile</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>

				<?php
				$mysqli = getDB();
				$user_type = $_SESSION["user_type"];
				$user_type_id = $_SESSION["user_type_id"];
				$services = $mysqli->query("SELECT * FROM provided_services WHERE host_or_coc='$user_type' AND provider_id=$user_type_id")->fetch_all(MYSQLI_ASSOC);
				$clients = [];
				for ($i = 0; $i < sizeof($services); $i++) {
					$id = $services[$i]["client_id"];
					$clients[] = $mysqli->query("SELECT * FROM client WHERE id=$id")->fetch_assoc();
				}
				$users = $clients;
				foreach ($users as $person) {
					$name = $person["First_Name"] . " " . $person["Last_Name"];
					echo "<tr><td class=\"mdl-data-table__cell--non-numeric\">" . $name . "</td><td><a href=" . ("../profile/?client=" . $person["id"]) . "> <i class=\"mdl-color-text--blue-grey-400 material-icons\" role=\"presentation\">person</i></a></td><td><a href=" . ("remove.php?client=" . $person["id"]) . "> <i style=\"color:red\" class=\"mdl-color-text--blue-grey-400 material-icons\" role=\"presentation\">close</i></a></td></tr>";
				}
				echo "</tbody></table></div>";
				?>
			</div>
	</div>
	</main>
	</div>
	<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</body>
</html>
