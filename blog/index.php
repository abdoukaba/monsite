 <!DOCTYPE html>
 <html>  
	<head> 
	<meta charset="utf-8" />     
	<title>Mon blog</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/mobile.css" />
	<link href="style.css" rel="stylesheet" />  
	</head>       
   <body> 
   <p><a href="..">Accueil du site </a></p>
   <h1>Mon super blog !</h1> 
   <p>Derniers billets du blog :</p> 
	<?php 
	// Connexion à la base de données
	try 
	{ 
	$bdd = new PDO('mysql:host=db555693792.db.1and1.com;dbname=db555693792', 'dbo555693792', 'Swish@5house');
	} 
	catch(Exception $e) 
	{      
	die('Erreur : '.$e->getMessage()); 
	}
	// On récupère les 5 derniers billets 
	$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
	AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
	while ($donnees = $req->fetch())
	{ 
	?>
	<div class="news">  
	<h3>    
    <?php echo htmlspecialchars($donnees['titre']);?>      
	<em>le <?php echo $donnees['date_creation_fr']; ?></em> 
	</h3>   
	<p>   
	<?php  
	// On affiche le contenu du billet  
	echo nl2br(htmlspecialchars($donnees['contenu']));   
	?>  
	<br /> 
	<img src="smiling.jpg" />
	<img src="golf.jpg" />
	<img src="riding.jpg" />
	<em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em> 
	</p>
	</div> 
	<?php 
	} 
	// Fin de la boucle des billets 
	$req->closeCursor(); 
	?> 
	 <?php
if(file_exists('compteur.txt'))
{
        $compteur_f = fopen('compteur.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
        $compteur_f = fopen('compteur.txt', 'a+');
        $compte = 0;
}
$compte++;
fseek($compteur_f, 0);
fputs($compteur_f, $compte);
fclose($compteur_f);
echo ' page vue <strong>'.$compte.'</strong> fois';
?>
	</body> 
	</html>