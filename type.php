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
$type = $_POST["type"];
if($type == "DS"){
    echo "<p>Il s'agit de devoirs surveillés.</p><br>";
}else{
    echo "<p>Il s'agit d'interrogations écrites.</p><br>";
}
// Affichage fichiers

$matiere = $_GET['var'];
if(isset($type)){
   echo "Vous allez accéder aux fichiers en rapport avec : ".$matiere.'<br><br>';
}



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
      $name = substr($file, 0, strlen($file)-12 );
      //echo $name.'<br><p>OK2</p><br>';
      $nom = $matiere.'_'.$type;
      //echo $nom.'<p>OK4</p>';
      if($name == $nom){
        echo '<li><a href="./files/'.$file.'">'.$file.'</a></li><br>';
      }
    echo '</ul>';
    
    }
}
?>

    </body>
</html>