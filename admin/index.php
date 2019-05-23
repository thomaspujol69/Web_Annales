<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Upload Annales - Institution des Chartreux</title>
		<link rel="stylesheet" href="design.css" type="text/css" media="screen" />
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
    </head>
    <body>
        <h1><a href="../">Annales - Institution des Chartreux - Retourner à l'accueil</a></h1>
        <h2><a href="./index.php">Menu d'upload</a></h2>
        <br><br>
            
            
            
<?php
$matiere = $_POST["matiere"];
$optn = $_POST["optn"];
$classe = $_POST["classe"];
$type = $_POST["type"];
$annee =  $_POST["annee"];
$mois = $_POST["mois"];
// echo $annee;
$nom = $matiere.'_'.$optn.'_'.$classe.'_'.$type.'_'.$annee.'-'.$mois.'.pdf';
if(isset($matiere) and isset($optn) and isset($classe) and isset($type)){
    
    $name = $matiere.'_'.$optn.'_'.$classe.'_'.$type;
    //print $name.'<br><br>';
    $uploaddir = '../uploads/';
    if(isset($_FILES['avatar'])){ 
     $dossier = '../files/';
     $fichier = basename($_FILES['avatar']['name']);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Chargement effectué avec succès !<br>';
          echo "<p>Merci de votre contribution ! </p><br>";
          rename('../files/'.$fichier, '../files/'.$nom);
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}

    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
    
}

else{
    //echo "<p>Il s'agit d'interrogations écrites.</p><br>";

// Préparation et affichage liste déroulante
echo "<p>&nbsp&nbsp&nbspMatière &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbspSpécialité &nbsp&nbsp|&nbsp&nbsp&nbspClasse &nbsp&nbsp|&nbsp&nbspDS/IE &nbsp| &nbspAnnée&nbsp | Mois &nbsp </p>";
echo '<form name="add" method="post" action="index.php" enctype="multipart/form-data">';

$matieres = ['Allemand', 'Anglais', 'Arts-Plastiques', 'Chinois', 'Français', 'HG-EMC', 'Informatique', 'Italien', 'Mathématiques', 'Musique', 'Philosophie', 'Physique-Chimie', 'SVT', 'Technologie'];
$listeM = '<select id="matiere" name="matiere">';

$optns = ['Non','Oui'];
$listeO = '<select id="optn" name="optn">';

$classes = ['Trle','1ere','2nde','3eme','4eme','5eme','6eme'];
$listeC = '<select id="classe" name="classe">';

$types = ['DS','IE'];
$listeT = '<select id="type" name="type">';

// Création des éléments de chauque liste
foreach($matieres as $matiere){
    $listeM .= '<option value="'.$matiere.'">'.$matiere.'</option>';
}
foreach($optns as $optn){
    $listeO .= '<option value="'.$optn.'">'.$optn.'</option>';
}
foreach($classes as $classe){
    $listeC .= '<option value="'.$classe.'">'.$classe.'</option>';
}
foreach($types as $type){
    $listeT .= '<option value="'.$type.'">'.$type.'</option>';
}



$listeM .= '</select>'."\n";
$listeO .= '</select>'."\n";
$listeC .= '</select>'."\n";
$listeT .= '</select>'."\n";

echo $listeM.'&nbsp&nbsp&nbsp';
echo $listeO.'&nbsp&nbsp&nbsp';
echo $listeC.'&nbsp&nbsp';
echo $listeT.'&nbsp&nbsp&nbsp';


$selected = '';
 
  // Parcours du tableau
  echo '<select id="annee" name="annee">',"\n";
  for($i=2005; $i<=date('Y'); $i++)
  {
    // L'année est-elle l'année courante ?
    if($i == date('Y'))
    {
      $selected = ' selected="selected"';
    }
    // Affichage de la ligne
    echo "\t",'<option value="', $i ,'"', $selected ,'>', $i ,'</option>',"\n";
    // Remise à zéro de $selected
    $selected='';
  }
  echo '</select>';

  // Parcours du tableau
  echo '<select id="mois" name="mois">',"\n";
  for($i=1; $i<=12; $i++)
  {
    // Affichage de la ligne
    if($i<=9){
        echo "\t",'<option value="0', $i , '"', $selected ,'>0', $i ,'</option>',"\n";
    }else{
    echo "\t",'<option value="', $i ,'"', $selected ,'>', $i ,'</option>',"\n";
    }
    // Remise à zéro de $selected
    $selected='';
  }
  echo '</select>';


echo '<br><br><p>Fichier à uploader :</p><input type="file" name="avatar">
     <input type="submit" name="envoyer" value="Valider"><br><br><br>';
// }
echo '</form></form>';

}
    
?>

    </body>
</html>