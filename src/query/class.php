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
class hackme
{	
	
	public function checkpoint($id)
	{
		
		$sql = "SELECT nick,nome,fb,tw FROM torengine_hackgame ORDER BY ID";
		$array = mysql_query($sql) or die(mysql_error());
		
		echo "HACKERS CHECKPOINT ".$id.":\n";	
		echo "<table cellspacing='0' cellpadding='0' border='0'>\n";
		
		
		$i = 0;
		
		while($row = mysql_fetch_array($array)){
		$i=1;
			echo "<tr>\n";	
			echo "<td>NickName: ".$row['nick']."</td>\n";
			
			echo "<td>&nbsp;&nbsp;|&nbsp;&nbsp;</td>\n";
			
			echo "<td>Nome: ".$row['nome']."</td>\n";
			
			echo "<td>&nbsp;&nbsp;|&nbsp;&nbsp;</td>\n";
			
			if(!empty($row['fb'])){
				echo "<td><a href='http://www.fb.me/".$row['fb']."'><img src='./img/fb.png' /></a>&nbsp;&nbsp;</td>\n";
			}
			
			if(!empty($row['tw'])){
				echo "<td><a href='http://www.twitter.com/".$row['tw']."'><img src='./img/tw.png' /></a>&nbsp;&nbsp;</td>\n";
			}
			
			echo "</tr>\n";
			
		}
		
		if($i==0){
			echo "<td>Nessun nome in lista...</td><td></td><td></td><td></td>\n";
		}
		
		
		echo "</table><br/><br/>\n";
	
	 return 0;
	}
	
	
	public function add($nick,$nome,$fb,$tw,$mail,$pass,$ip,$iphost,$iptime,$check)
	{
		
		$pass = md5($pass);
		$returned = 0;
		if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $mail)){
			if (preg_match("/^([A-Za-z0-9_\-\ \.])+$/", $nick)){
				if (preg_match("/^([A-Za-z0-9_\-\ \.])+$/", $nome)){
					if (preg_match("/^([A-Za-z0-9_\-\.])+$/", $fb) || empty($fb)){
						if (preg_match("/^([A-Za-z0-9_\-\.])+$/", $tw) ||  empty($tw)){
							if (preg_match("/[a-zA-Z]|\d|\w/", $pass)){
								$returned = 1;
							}	
						}	
					}	
				}	
				
			}	
		}
		
		$sql = "SELECT ID FROM torengine_hackgame WHERE pass = '$pass' AND mail = '$mail' AND checkpoint = '$check'";
		$array = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($array);
		
		if($returned == 1){
			if(!empty($row['ID'])){
				$sql = "UPDATE torengine_hackgame SET nick = '$nick', nome = '$nome', fb = '$fb', tw = '$tw', mail = '$mail', pass = '$pass',ip = '$ip',iphost = '$iphost',iptime = '$iptime', checkpoint = '$check' WHERE ID = '".$row['ID']."'"; 		
				$result = mysql_query($sql) or die(mysql_error());
			}else{
				$sql = "SELECT ID FROM torengine_hackgame WHERE mail = '$mail'";
				$array = mysql_query($sql) or die(mysql_error());
				$row = mysql_fetch_array($array);
				if(empty($row['ID'])){
					mysql_query("INSERT INTO 
									torengine_hackgame (`nick`,`nome`,`fb`,`tw`,`mail`,`pass`,`ip`,`iphost`,`iptime`,`checkpoint`)
									VALUES ('$nick','$nome','$fb','$tw','$mail','$pass','$ip','$iphost','$iptime','$check')
									")
					or die(mysql_error()); 
				}else{
					$returned = 2;
				}
			}
		}
		
		if($returned == 1){
			echo "Hai aggiunto il tuo checkpoint con successo";
		}else{
			if($returned == 2){
				echo "Errore: Email già presente nel database";
			}else{
				echo "Errore: Finiscila di hackerare la piattaforma, metti email o altri campi validi";
			}
		}
	 return 0;
	}
	
}
?>