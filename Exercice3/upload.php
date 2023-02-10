<?php
  if(isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $temps = date('Y-D H:i:s');

    // Récupération des informations du fichier
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Découpage de l'extension du fichier
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // Liste des extensions autorisées
    $allowed = array('pdf');

    // Vérification de l'extension du fichier
    if(in_array($fileActualExt, $allowed)) {
      // Vérification des erreurs
      if($fileError === 0) {
        // Vérification de la taille du fichier
        if($fileSize < 1000000) {
          // Création d'un nouveau nom de fichier unique
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'uploads/'.$fileNameNew;

          // Déplacement du fichier vers sa destination
          move_uploaded_file($fileTmpName, $fileDestination);
          echo $temps. "Téléchargement réussi ! Le fichier a été déplacé vers : ".$fileDestination;
        } else {
          echo "Erreur : le fichier est trop volumineux (taille maximale : 1 MB)";
        }
      } else {
        echo "Erreur lors du téléchargement du fichier";
      }
    } else {
      echo "Erreur : type de fichier non autorisé (formats autorisés : pdf)";
    }
  }
?>