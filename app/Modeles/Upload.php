<?php

	function bytesToSize1024($bytes, $precision = 2) {

	    $unit = array('B','KB','MB');

	    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];

	}

echo "upload";
$sFileName = $_FILES['image_file']['name'];

$sFileType = $_FILES['image_file']['type'];



echo 	$sFileName ;

echo 	$sFileType;

$idUser = $_SESSION['id'];

$uploaddir = 'C:\wamp64\www\ITH\imgUsers';
$idUser = "\\" . $idUser ;
$uploadfile = $uploaddir . $idUser;
$uploadfile = $uploaddir . $sFileName;

echo  $uploadfile;
echo  basename($_FILES["image_file"]["name"]);
echo '<pre>';
if (move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadfile)) {
    echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
} else {
    echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
}

echo 'Voici quelques informations de débogage :';
print_r($_FILES);

echo '</pre>';



$uploaddir = 'imgUsers';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);

	$sFileSize = bytesToSize1024($_FILES['fileToUpload']['size'], 1);

	//echo <<<EOF
    echo "votre fichier est transfere"


?>