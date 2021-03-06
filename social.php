﻿<?php 
require 'lib/autoload.inc.php';
$db = DBFactory::getMysqlConnexionWithMySQLi();
 $manager = new NewsManager_MySQLi($db);
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr"> 
 <head>
 <title>Livre d'or</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/mobile.css" />
	<link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Alef' rel='stylesheet' type='text/css'>
   
 <meta http-equiv="Content-type" content="text/html; charset=iso- 8859-1" /> 
 </head>   
 <body class="page-contact">
	<div id="main-wrapper">
		<header>
			<nav>
				<ul class="clearfix">
					<li class="about"><a href="index.html" title="About Me">About Me</a></li>
					<li class="Newsletter"><a href="newsletter.html" title="Newsletter">Newsletter</a></li>
					<li class="social"><a href="social.php" title="Social">Social</a></li>
					<li class="contact last"><a href="contact.php" title="Contact">Contact</a></li>
					
				</ul>
			</nav>
		</header>
   
 <p><a href="membre">Se connecter ou s'enregistrer pour laisser un message</a></p> 
 <?php 
 if (isset($_GET['id'])) 
 {  
 $news = $manager->getUnique((int) $_GET['id']);  
 echo '<p>Par <em>', $news->auteur(), '</em>, ', $news->dateAjout(), '</p>', "\n", 
 '<h2>', $news->titre(), '</h2>', "\n",   
 '<p>', nl2br($news->contenu()), '</p>', "\n";  
 if ($news->dateAjout() != $news->dateModif())  
 {   
 echo '<p style="text-align: right;"><small><em>Modifiée ', $news->dateModif(), '</em></small></p>'; 
 } 
 }
else
 { 
 echo '<h2 style="text-align:center">Liste des 5 dernièrs messages</h2>';  
 foreach ($manager->getList(0, 5) as $news) 
 {   
 if (strlen($news->contenu()) <= 200)  
 {      
 $contenu = $news->contenu();   
 }       
 else  
 {      
 $debut = substr($news->contenu(), 0, 200);   
 $debut = substr($debut, 0, strrpos($debut, ' ')) . '...'; 
 $contenu = $debut;   
 }    
 echo '<h4><a href="?id=', $news->id(), '">', $news->titre(), '</a></h4>', "\n",     
 '<p>', nl2br($contenu), '</p>'; 
 } 
 }
 ?>

  </body> 
 </html>