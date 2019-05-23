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
$classe = $_POST["classe"];
if(isset($classe)){
   echo "Vous allez accéder aux fichiers en rapport avec la classe : ".$classe.'<br><br><br>';
}

// Affichage fichiers

$matiere = $_GET['var'];
$dossier = 'files';
$iterator = new DirectoryIterator($dossier);

foreach($iterator as $fichier){
   // La fonction isDot retourne TRUE si l'élement courant est "." ou ".."
  if(!$fichier->isDot()){
   // Affiche le fichier avec le lien
      $file = $fichier->getFilename();
      // On ne garde que le nom de la matière
      $name = substr($file, 0, strlen($file)-11 );
      // echo $name.'<br><p>OK2</p><br>';
      $nom = $matiere.'_'.$classe;
      // echo $matiere.'_'.$classe.'<p>OK3</p><br>';
      if($name == $nom){
        echo '<a href="./files/'.$file.'">'.$file.'</a> <br><br>';
      }
    }
}
?>

    </body>
</html>