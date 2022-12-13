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
      session_start();
if (isset($_POST['Nom'])){
  $Nom = stripslashes($_REQUEST['Nom']);
  $Nom = mysqli_real_escape_string($conn, $Nom);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE Nom='$Nom' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['Nom'] = $Nom;
      header("Location: consult.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="Nom" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>

      <?php
      } 
      ?>
    </form>
  </body>
</html>
