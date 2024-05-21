<?php 
error_reporting(E_ALL);
ini_set("display_errors",1);
if(!isset($_SESSION))
	header("Location:routeur.php?controleur=ControleurIndex&action=lireIndex");
$user = $_SESSION["user"];
if($user->getId_cat() != 4 && $user->getId_cat() != 5)
    header("Location:routeur.php?controleur=ControleurIndex&action=lireIndex");
 
?>
<!DOCTYPE html>

<html lang="fr" font-color=#FFFFF>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lumen Lurning Center</title>
		<link rel="stylesheet" href="vue/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,100;1,200&display=swap" rel="stylesheet">
	</head>
	<body>
		<section class="header"  style="background-color:rgba(4,9,30,0.35)">
			<?php include("vue/header.php"); ?>
			
			<div class="text-box">
            <h1>Les utilisateurs</h1>
            <?php
            $users = ControleurAdmin::listeUsers();
            if(empty($users)) { ?>
                <p>Il n'y a pas encore d'utilisateur inscrit.</p>
            <?php } else { ?>
                <p  width="80%" valign="center" align="center" padding="10px" font-color="#FFFFFF">

                <table  width="80%" valign="center" align="center" bg-color="#FFFFFF">
                    <thead>
                        <td>Login</td>
                        <td>Nom</td>
                        <td>Prenom</td>
                        <td>Numero d'abonnement</td>
                        <td>Categorie</td>
                    </thead>
                    <?php foreach($users as $u) { ?>
                        <tr>
                            <?php
                            $login = $u->getLogin();
                            $nom = $u->getNom();
                            $prenom = $u->getPrenom();
                            $abo = $u->getId_Abo();
                            $categorie = $u->getId_cat();
                            echo "
                            <td>$login</td>
                            <td>$nom</td>
                            <td>$prenom</td>
                            <td style='text-align:left'>$abo</td>
                            <td style='text-align:left'>$categorie</td>
                            "
                            ?>
                        </tr>
                    <?php }?>
                </table>
                <?php } ?>
            </p>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>