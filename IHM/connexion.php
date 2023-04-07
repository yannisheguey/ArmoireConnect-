<?php
session_start();
if(isset($_POST ['valider'])){
    if(!empty($_POST ['pseudo']) AND !empty($_POST['mdp'])) {
        $pseudo_par_defaut ="admin";
        $mdp_par_defaut ="admin1234";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);
    
   if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
    $_SESSION['mdp'] = $mdp_saisi;
    header('location: home.php');
   }else{
        echo"votre mot de passe ou pseudo est incorrect";
   }
}else{
    echo "veuillez completer tous les champs...";
   }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Espace de connexion admin</title>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo" autocomplete="off">
<br>
<input type="password" name="mdp">
<br><br>
<input type="submit" name="valider">
</form>
</body> </html>