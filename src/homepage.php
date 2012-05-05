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
<!------

STEP1: Dai non era difficile. Avrete una parola chiave ad ogni step che completerà l'url del gioco, tipo:
http://hackme.torengine.it/parola1/parola2/parola3 etc...

La vostra prima parola è: start 
http://hackme.torengine.it/start 

--->
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
		<p id="line1">TorEngine - Hacking Game (BETA) </p>
		<p id="line2">In polonia lo stato crea un gioco molto divertente che tradotto in italiano suonerebbe «Hacker della Repubblica Italiana». Il vincitore di questo gioco riceve una borsa di studio nella migliore università del paese. Ho avuto la fortuna di parteciparvi, le regole erano semplici: ogni settimana veniva proposto un quiz, se lo risolvevi entro 24h avevi il punteggio massimo e poi i giorni successivi calava... Il nostro sarà leggermente diverso: avrete dei semplici checkpoint che dovrete raggiungere per mettere il vostro nome nella home page (non è una borsa di studio ma c'è da vantarsi). Bhè, buon divertimento allora! Vi lascio con una bella citazione della distro Sabayon Linux: «Open Your Mind, Open Your Source» </p>
		
		<a href='javascript: open("play")'><p id="line3">ELENCO GIOCATORI </p></a>
		<div id='play' style="display: none;">
			<p><?php $get->checkpoint(1); ?></p>
		</div>
	</body>
</html>
