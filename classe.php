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
$classe = $_POST["classe"];
if(isset($classe)){
   echo "Vous allez accéder aux fichiers en rapport avec la classe de ".$classe.'. <br><br><br>';
}
$matiere = $_GET['var'];
if(isset($matiere)){
   echo 'Vous allez accéder aux fichiers en rapport avec la matière : '.(substr($matiere, 0, strlen($matiere)-4 )).'.'.'<br><br>';
           
}

// Préparation et affichage liste déroulante

echo '<p>Choisissez le type de sujet (Devoir Surveillé : DS, ou Interrogation : IE) : </p>';

// if not (isset($_POST["matiere"])){
echo '<form name="classe" method="post" action="type.php?var='.$matiere.'_'.$optn.$classe.'">';
$types = ['DS','IE'];
$liste = '<select id="type" name="type">';
// echo '<form id="classe" method="POST" action="classe.php?var='.$matiere.'"> ';

// Pour chaque matière :
foreach($types as $type){
    $liste .= '<option value="'.$type.'">'.$type.'</option>';
}
$liste .= '</select>';
echo $liste;
echo '<br><br><input name="OK" type="submit" value="Valider"><br><br><br>';
// }
echo '</form>';




// Affichage fichiers

$matiere = $_GET['var'];
$dossier = 'files';
$iterator = new DirectoryIterator($dossier);
echo '<br><p>Liste des fichiers disponibles avec vos critaires : </p>';
echo '<ul>';
foreach($iterator as $fichier){
   // La fonction isDot retourne TRUE si l'élement courant est "." ou ".."
  if(!$fichier->isDot()){
   // Affiche le fichier avec le lien
      $file = $fichier->getFilename();
      // On ne garde que le nom de la matière
      $name = substr($file, 0, strlen($file)-15 );
      //echo $name.'<br><p>OK2</p><br>';
      $nom = $matiere.'_'.$classe;
      //echo $nom.'<p> nom</p><br><br>';
      //echo $matiere.'_'.$classe.'<p>OK3</p><br>';
      if($name == $nom){
        echo '<li><a href="./files/'.$file.'">'.$file.'</a></li><br>';
      }
    echo '</ul>';
    }
}
?>

    </body>
</html>