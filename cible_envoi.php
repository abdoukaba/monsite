<?php 
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur 
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0) 
{      
  // Testons si le fichier n'est pas trop gros  
  if ($_FILES['monfichier']['size'] <= 1000000)  
  {          
  // Testons si l'extension est autorisée  
  $infosfichier = pathinfo($_FILES['monfichier']['name']);  
  $extension_upload = $infosfichier['extension'];   
  $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png'); 
  if (in_array($extension_upload, $extensions_autorisees))    
  {        
  // On peut valider le fichier et le stocker définitivement  
  move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/'.
  basename($_FILES['monfichier']['name']));      
  echo "L'envoi a bien été effectué !";   
    }     
   } 
  } 
  ?>
  <p> 
<?php 
if (isset($_POST['telephone']))
 {  
 $_POST['telephone'] = htmlspecialchars($_POST['telephone']);
 // On rend inoffensives les balises HTML que le visiteur a pu entrer
    if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone'])) 
	{      
	echo 'Le numéro ' . $_POST['telephone'] . ' est un numéro <strong>valide</strong> !';   
	}   
	else  
	{     
	echo 'Le numéro ' . $_POST['telephone'] . ' n\'est pas valide, recommencez !'; 
	} 
	} 
	?> 
</p>
<p>
<?php 
if (isset($_POST['email'])) 
{   
 $_POST['mail'] = htmlspecialchars($_POST['email']);
 // On rend inoffensives les balises HTML que le visiteur a pu rentrer
    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) 
	{   
	echo 'L\'adresse ' . $_POST['email'] . ' est <strong>valide</strong> !';   
	}   
	else  
	{      
	echo 'L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !';  
	}
	} 
	?>
</p>
  
<p><a href="contact.php"> </a></p> 