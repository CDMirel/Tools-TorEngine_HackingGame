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
CREATE TABLE `torengine_hackgame` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `nick` varchar(100) NOT NULL default '',
  `nome` varchar(100) NOT NULL default '',
  `fb` varchar(100) NOT NULL default '',
  `tw` varchar(100) NOT NULL default '',
  `mail` varchar(100) NOT NULL default '',
  `pass` varchar(100) NOT NULL default '',
  `ip` varchar(100) NOT NULL default '',
  `iphost` varchar(100) NOT NULL default '',
  `iptime` varchar(100) NOT NULL default '',
  `checkpoint` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
