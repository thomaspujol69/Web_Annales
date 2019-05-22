<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Annales - Institution des Chartreux</title>
    </head>
    <body>
        <h1><a href="./">Annales - Institution des Chartreux</a></h1>


<?php
$matiere = $_POST["matiere"];
if(isset($matiere)){
   echo "Vous allez accéder aux fichiers en rapport avec la matière : ".$matiere.'<br><br>';
           
}

// Préparation et affichage liste déroulante

echo '<p>Choisissez la classe : </p>';

// if not (isset($_POST["matiere"])){
echo '<form name="classe" method="post" action="classe.php?var='.$matiere.'">';
$classes = ['Trle','1ère','2nde','3ème','4ème','5ème','6ème'];
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
foreach($iterator as $fichier){
   // La fonction isDot retourne TRUE si l'élement courant est "." ou ".."
  if(!$fichier->isDot()){
   // Affiche le fichier avec le lien
      $file = $fichier->getFilename();
      // On ne garde que le nom de la matière
      //echo $file.'<br>';
      $name = substr($file, 0, strlen($file)-18 );
      //echo $name.'<br>';
      if($name==$matiere){
        echo '<a href="./files/'.$file.'">'.$file.'</a> <br><br>';
      }
    }
}
?>
        
    </body>
</html>