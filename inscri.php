<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body id="background2">
    <?php
    //echo "Bienvenue!";
      include("connect.php");
      if (isset($_REQUEST['Nom'], $_REQUEST['Prenom'], $_REQUEST['Matricule'], $_REQUEST['Num_tel'], $_REQUEST['Adresse'], $_REQUEST['Email'], $_REQUEST['password'])) {
        $Nom=stripslashes($_REQUEST['Nom']);
        //Cette fonction peut être employée pour nettoyer des données recherchées dans une base de données ou les données récupérées d'un formulaire HTML.
        $Nom=mysqli_real_escape_string($connect,$Nom);
        //supprime les caractères spéciaux dans une chaîne à utiliser dans une requête SQL, en tenant compte du jeu de caractères actuel de la connexion.

        $Prenom=stripslashes($_REQUEST['Prenom']);
        $Prenom=mysqli_real_escape_string($connect,$Prenom);

        $Matricule=stripslashes($_REQUEST['Matricule']);
        $Matricule=mysqli_real_escape_string($connect,$Matricule);

        $Num_tel=stripslashes($_REQUEST['Num_tel']);
        $Num_tel=mysqli_real_escape_string($connect,$Num_tel);

        $Adresse=stripslashes($_REQUEST['Adresse']);
        $Adresse=mysqli_real_escape_string($connect,$Adresse);

        $Email=stripslashes($_REQUEST['Email']);
        $Email=mysqli_real_escape_string($connect,$Email);

        $password=stripslashes($_REQUEST['password']);
        $password=mysqli_real_escape_string($connect,$password);

       $query="INSERT into 'utilisateur'(Nom, Prenom, Matricule, Num_tel, Adresse, Email, password)
              VALUES ('$Nom', '$Prenom', '$Matricule', '$Num_tel', '$Adresse', '$Email', '$password')";

        $res=mysqli_query($connect, $query);
        if ($res) {
          echo "<h3>Vous êtes inscrit avec succés.</h3>";
        }}
        else{
    ?>
   <form class="box" action="" method="post">
      <h1>Bibliothéque</h1>
      <h2 class="box-title">S'inscrire</h2>

      <input type="text" class="box-input" name="Nom" placeholder="Nom d'utilisateur" required />
      
      <input type="text" class="box-input" name="Prenom" placeholder="Prenom d'utilisateur" required />

      <input type="text" class="box-input" name="Matricule" placeholder="Matricule" required />

      <input type="text" class="box-input" name="Num_tel" placeholder="Num_tel" required />

      <input type="text" class="box-input" name="Adresse" placeholder="Adresse de l'utilisateur" required />

      <input type="text" class="box-input" name="Email" placeholder="Email" required />

      <input type="text" class="box-input" name="password" placeholder="password" required />

      <input type="submit" name="submit" value="S'inscrire" class="box-button" />
       <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
      </form>
      <?php
      } 
      ?>
  </body>
</html>
