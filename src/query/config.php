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

	$db = mysql_connect('localhost', 'root', '');
	if (!$db) {
		die(mysql_error());
	}

	$db_selected = mysql_select_db('db', $db);
	if (!$db_selected) {
		die (mysql_error());
	}
?>
