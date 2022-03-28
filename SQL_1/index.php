<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    // Constantes d'environnement 

   define("DBHOST", "localhost");
   define("DBUSER", "root");
   define("DBPASS", "");
   define("DBNAME", "tutos-php");



    // DSN de connexion

  $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;



    // on va connecter à la base

try {
    // On Instancie PDO 
    $db = new PDO($dsn, DBUSER, DBPASS);

    // on s'assure d'envoyer les données en UTF8

    $db->exec("SET NAMES utf8");

    // on definit le mot fetch par defaut

    $db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("error: ".$e->getMessage());
}
    // ici on est connectées à la base
    // on peut recuperer la liste des users

    $sql = "SELECT * FROM `users` WHERE `id` = 1";

    // on ecécute directement la requéte 

    $requete = $db->query($sql);
    

    // on récupére les données (fetch ou fetchAll)

    $user = $requete->fetch();

  // ajouter un utilisateur

  $sql = " INSERT INTO `users`(`email`, `pass`, `roles`) VALUES ('demo@list.fr', 'azerty', '[\"ROLE_USER\"]') ";
  $requete = $db->query($sql);

  // Modifier un utilisateur 

  $sql = "UPDATE `users` SET `pass` = 'ahgahds' WHERE `id` = 4";
  $requete = $db->query($sql);

  // Supprimer des utilisateurs 

  $sql = "DELETE FROM `users` WHERE `id` > 2";
  $requete = $db->query($sql);

  // Savoir combien de lignes ont été supprimées

  echo $requete->rowCount();
    ?>
</body>
</html>