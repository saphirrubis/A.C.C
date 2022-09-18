<?php
require("../ressources/service/_mailer.php");
$email = $commentaire = $envoi ="";
$error =[];
//on vérifie si on est bien en mode "post"
if($_SERVER["REQUEST_METHOD"] === "POST" /*&& isset($_POST["submit"])*/){
//on vérifie si input email est vide ou non
    if(empty($_POST["email"])) {$error["email"] = "Veuillez entrer un email";}  
            else {$email = cleanData($_POST["email"]);}
// on vérifier que l'email est bien un email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $error["email"] ="Veuillez entrer un email valide ";}
// on vérifie que le textarea est vide ou non
    if(empty($_POST["commentaire"])) {$error["commentaire"] = "Veuillez saisir votre message";} 
            else {$commentaire = cleanData($_POST["commentaire"]);}

// vérification du remplissage ou non et saisi incorrecte
    if(!isset($_POST["captcha"], $_SESSION["captchaStr"])|| $_POST["captcha"] != $_SESSION["captchaStr"]){
    $error["captcha"] ="CAPTCHA incorrecte";
}
//envoi des donnée par mail
    if(empty($error)){
    $envoi =sendMail($email,"adress email",$commentaire);
    $_SESSION['flash']="Votre demande a bien été envoyé. on vous répond le plus vite.";
}
}


// fonction qui bloque les erreurs faite non par l'utilisateur/bloque la synthaxe de codage
function cleanData(string $data):string{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
};
?>
<h4> Nous contacter :</h4>

<form action="" class="FL" method="POST">

    <fieldset class="com">

        <legend>Pour toutes questions ou demande d'information complémentaire : </legend> <br>
        <label for="email">Votre email :</label>
        <input type="email" name="email" placeholder="votre email" id="email"> <br>
        <span class="error"><?php echo $error["email"]??"" ; ?></span> <br>
       <textarea name="commentaire" placeholder="Laissez votre message" id="commentaire" cols="35" rows="10"></textarea><br>
       <span class="error"><?php echo $error["commentaire"]??"" ; ?></span>
    </fieldset>
   
    <div id="capt">
<label for="captcha">Veuillez recopier le texte ci-dessous pour valider :</label>
<br> <img src="../ressources/service/_captacha.php" alt="captcha"><br>
<input type="text" name="captcha" id="captcha" pattern="[A-Z0-9]{6}">
<span class="error"><?php echo $error["captcha"]??"";?></span>
</div>
    <input type="submit" class="valide" value="Envoyer" name="submit"><br>
    
    <?php if(!empty($envoi)):;?>
    <p>
        <?php echo $envoi; ?> <br>
    </p>
    <?php endif; ?>

    <p id="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus modi ea sequi quibusdam, corporis
        aliquam
        fugiat hic fugit rem voluptate iure doloribus quo sed impedit. Eligendi, possimus. Neque, ea expedita.</p>

    <a id="fa" href="#" class="a"><i class="fa-brands fa-facebook-f"></i></a>
    <a id="lin" href="#" class="a"><i class="fa-brands fa-linkedin-in"></i></a>
    <a id="ins" href="#" class="a"><i class="fa-brands fa-instagram"></i></a>
</form>