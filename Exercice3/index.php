
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>CHOISIR UN FICHIER PDF</h2>
  
<form action="upload.php" method="post" enctype="multipart/form-data">
  <label for="file">Choisissez un fichier :</label>
  <input type="file" name="file" id="file">
  <input type="submit" value="Envoyer" name="submit">
</form>
  
</body>
</html>