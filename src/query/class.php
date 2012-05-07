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
	
	public function sendmail()
	{
		$sql = "SELECT mail FROM torengine_hackgame";
		$array = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($array);
		
		mail("ptkdev@gmail.com", "HackingGame TorEngine - Nuovo Checkpoint Disponibile", "E' disponibile un nuovo checkpoint. In caso di problemi contatta @PTKDev su twitter o manda un'email a ptkdev@gmail.com. Ehy divertiti e buona fortuna! http://hackme.torengine.it/");
		while($row = mysql_fetch_array($array)){
			mail($row['mail'], "HackingGame TorEngine - Nuovo Checkpoint Disponibile", "E' disponibile un nuovo checkpoint. In caso di problemi contatta @PTKDev su twitter o manda un'email a ptkdev@gmail.com. Ehy divertiti e buona fortuna! http://hackme.torengine.it/");
			echo "Email: $mail | OK<br />";
		}

	
	 return 0;
	}
	
	public function enable($hash,$mail,$check)
	{
		$sql = "SELECT ID FROM torengine_hackgame WHERE mail = '$mail' AND hash = '$hash' AND checkpoint = '$check'";
		$array = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($array);
		
		if(!empty($row['ID'])){
			$sql = "UPDATE torengine_hackgame SET hide = '1'"; 		
			$result = mysql_query($sql) or die(mysql_error());
			
			echo "OK";
		}else{
			echo "Error: contatta ptkdev@gmail.com";
		}

	
	 return 0;
	}
	
	public function checkpoint($id)
	{
		
		$sql = "SELECT nick,nome,fb,tw,hide,checkpoint FROM torengine_hackgame WHERE checkpoint = '$id' ORDER BY ID";
		$array = mysql_query($sql) or die(mysql_error());
		
		echo "HACKERS CHECKPOINT ".$id.":\n";	
		echo "<table cellspacing='0' cellpadding='0' border='0'>\n";
		
		
		$i = 0;
		
		while($row = mysql_fetch_array($array)){
			if($row['hide']==1){
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
		
		
		if($returned == 1){
			
			$hash = "$mail$pass$check";
			$hash = md5($hash);
			
			$sql = "SELECT ID FROM torengine_hackgame WHERE pass = '$pass' AND mail = '$mail' AND checkpoint = '$check'";
			$array = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($array);
		
			if(!empty($row['ID'])){
				if(empty($hash)){
					$hash = "$mail$pass$check";
					$hash = md5($hash);
				}
				$sql = "UPDATE torengine_hackgame SET nick = '$nick', nome = '$nome', fb = '$fb', tw = '$tw', mail = '$mail', pass = '$pass',ip = '$ip',iphost = '$iphost',iptime = '$iptime', checkpoint = '$check', hash = '$hash' WHERE ID = '".$row['ID']."'"; 		
				$result = mysql_query($sql) or die(mysql_error());
			}else{
				$sql = "SELECT ID FROM torengine_hackgame WHERE mail = '$mail'";
				$array = mysql_query($sql) or die(mysql_error());
				$row = mysql_fetch_array($array);
				if(empty($row['ID'])){
					mysql_query("INSERT INTO 
									torengine_hackgame (`nick`,`nome`,`fb`,`tw`,`mail`,`pass`,`ip`,`iphost`,`iptime`,`checkpoint`,`hash`,`hide`)
									VALUES ('$nick','$nome','$fb','$tw','$mail','$pass','$ip','$iphost','$iptime','$check','$hash','0')
									")
					or die(mysql_error()); 
					
					mail($mail, "HackingGame TorEngine - Verifica Email", "Conferma il checkpoint clickando qui: http://hackme.torengine.it/confirm.php?hash=$hash&mail=$mail&check=$check");
				}else{
					$returned = 2;
				}
			}
		}
		
		if($returned == 1){
			echo "Hai aggiunto il tuo checkpoint con successo.<br/>Conferma l'email per apparire in homepage.";
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
