<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Annales - Institution des Chartreux</title>
		<meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=2.0,user-scalable=yes">
    </head>
    <body>
        <h1><a href="./">Annales - Institution des Chartreux</a></h1>


<?php

$optn = $_POST["optn"];
if($optn == 'Oui'){
   echo "<p>Vous êtes un optionnaire. </p><br>";
}
else {
    echo "<p>Vous n'êtes pas optionnaire. </p><br>";

}

$matiere = $_GET['var'];
if(isset($matiere)){
   echo 'Vous allez accéder aux fichiers en rapport avec la matière : '.$matiere.'.'.'<br><br>';
           
}

// Préparation et affichage liste déroulante

echo '<p>Choisissez la classe : </p>';

// if not (isset($_POST["matiere"])){
echo '<form name="classe" method="post" action="classe.php?var='.$matiere.'_'.$optn.'">';
$classes = ['Trle','1ere','2nde','3eme','4eme','5eme','6eme'];
$liste = '<select id="classe" name="classe">';
// echo '<form id="classe" method="POST" action="classe.php?var='.$matiere.'"> ';

// Pour chaque matière :
foreach($classes as $classe){
    $liste .= '<option value="'.$classe.'">'.$classe.'</option>';
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
      $name = substr($file, 0, strlen($file)-20 );
      //echo $name.'<br>';
      $nom = $matiere.'_'.$optn;
      //echo $nom.'<br><br>';
      if($name==$nom){
        echo '<li><a href="./files/'.$file.'">'.$file.'</a></li><br>';
      }
    echo '</ul>';
    }
}
?>
        
    </body>
</html>