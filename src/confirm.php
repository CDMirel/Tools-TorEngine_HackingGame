<!DOCTYPE html>
<?php
/*
 * TorEngine (HackingGame)
 *   Copyright (C) 2012  PTKDev
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *  
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
*/
  $dot = ".";
  include "$dot/query/config.php";
  include "$dot/query/class.php";
  $get = new hackme();
?>
<html>
	<head>
		<title>HackGame - TorEngine</title>
		<meta charset="utf-8">
		<link rel="icon" href="http://www.torengine.it/favicon.png" type="image/png" />
		<link rel="icon" href="http://www.torengine.it/favicon.ico" type="image/ico" />
		<link rel="stylesheet" type="text/css" href="<?php echo $dot; ?>/css/main.css" />
		<script type="text/javascript" src="<?php echo $dot; ?>/js/menu.js"></script>
		<script type="text/javascript" src="<?php echo $dot; ?>/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $dot; ?>/js/typewriter.js"></script>
	</head>

	<body>
		<p id="line1">TorEngine - Verifica Email </p>
		<p>
		<?php   
			if(!empty($_GET['hash']) && !empty($_GET['mail']) && !empty($_GET['check'])){
				$get->enable($_GET['hash'],$_GET['mail'],$_GET['check']);
			}
			header( "refresh:10;url=http://hackme.torengine.it/" ); 
		?>
		</p>
		
		<br />
	</body>
</html>
