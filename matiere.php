<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Annales - Institution des Chartreux</title>
		<link rel="stylesheet" href="design.css" type="text/css" media="screen" />
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
    </head>
    <body>
        <h1><a href="./">Annales - Institution des Chartreux</a></h1>


<?php
$matiere = $_POST["matiere"];
if(isset($matiere)){
   echo "Vous allez accéder aux fichiers en rapport avec la matière : ".$matiere.'.'.'<br><br>';
           
}

// Préparation et affichage liste déroulante

echo '<p>La matière choisie est elle une spécialité ? (Par défaut, répondre Non.) </p>';

// if not (isset($_POST["matiere"])){
echo '<form name="optn" method="post" action="optn.php?var='.$matiere.'">';
$optns = ['Non','Oui'];
$liste = '<select id="optn" name="optn">';
// echo '<form id="optn" method="POST" action="optn.php?var='.$matiere.'"> ';

// Pour chaque matière :
foreach($optns as $optn){
    $liste .= '<option value="'.$optn.'">'.$optn.'</option>';
}
$liste .= '</select>';
echo $liste;
echo '<br><br><input name="OK" type="submit" value="Valider"><br><br><br>';
// }
echo '</form>';

// Affichage fichiers
$dossier = 'files';
$iterator = new DirectoryIterator($dossier);
// $files = array();
echo '<br><p>Liste des fichiers disponibles avec vos critaires : </p>';
echo '<ul>';
foreach($iterator as $fichier){
   // La fonction isDot retourne TRUE si l'élement courant est "." ou ".."
  if(!$fichier->isDot()){
   // Affiche le fichier avec le lien
      $file = $fichier->getFilename();
      // On ne garde que le nom de la matière
      //echo $file.'<br>';
      $name = substr($file, 0, strlen($file)-24 );
      //echo $name.'  '.$matiere.'<br>';
      
      if($name==$matiere){
        echo '<li><a href="./files/'.$file.'">'.$file.'</a></li><br>';
      }
    
    echo '</ul>';  
    }
}
?>
        
    </body>
</html>