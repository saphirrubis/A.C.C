<?php
session_start();
require("../ressources/service/_pdo.php");
$pdo = connexionPDO();
require("../ressources/service/_mailer.php"); 
$email = $nom = $prenom = $accessoire = $color = $nomanimal = $police = $commentaire = $envoi = "";
$accessoireList =["fontaine","collier","laisses","harnais","gamelle",
"panier","coussin","cage","bac","arbreP","AccAqua"];
$policeList =["Arial","Georgia","Franklin Gothic Medium","Verdana"];
$error =[];
//on vérifie si on est bien en mode "post"
if($_SERVER["REQUEST_METHOD"] === "POST" /*&& isset($_POST["submit"])*/){
//on vérifie si input email est vide ou non
if(empty($_POST["email"])) {$error["email"] = "Veuillez entrer un email";}  
else {$email = cleanData($_POST["email"]);}
// on vérifier que l'email est bien un email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $error["email"] ="Veuillez entrer un email valide ";}
// on vérifier qu'un nom a été saisi ou non et sa longueur
if(empty($_POST["nom"])){$error["nom"] = "Veuillez entrer votre nom";}
else {$nom = cleanData($_POST["nom"]);
    //on limite le nombre lettre que le nom doit avoir
    if(strlen($nom)<3 || strlen($nom)>30){
        $error["nom"] = "Votre nom n'a pas une taille adapté";
}}
// identique que pour le nom
if(empty($_POST["prenom"])){$error["prenom"] = "Veuillez entrer votre nom";}
else {$prenom = cleanData($_POST["prenom"]);
    //on limite le nombre lettre que le nom doit avoir
    if(strlen($prenom)<3 || strlen($prenom)>30){
        $error["prenom"] = "Votre nom n'a pas une taille adapté";
}}
if(!empty($_POST["accessoire"])){$accessoire =cleanData($_POST["accessoire"]);
    //on vérifier que les valeur de l'accessoire liste correspond au accessoire
    if(!in_array($accessoire, $accessoireList)){
        $error["accessoire"] = "cette accessoire n'existe pas.";
    }}
    else {$error["accessoire"]= "Veuillez selectionner un accessoire !";}
 // on vérifie si on a bien selectionne une couleur
if(!empty($_POST["color"])){ 
    $color =cleanData($_POST["color"]);}
else{$error["color"]= "Veuillez selectionner une couleur !";}

if(empty($_POST["nomanimal"])){$error["nomanimal"] = "Veuillez entrer le nom de votre animal";}
else {$nomanimal = cleanData($_POST["nomanimal"]);
    //on limite le nombre lettre que le nom doit avoir
    if(strlen($nomanimal)<3 || strlen($nomanimal)>30){
        $error["nomanimal"] = "Le nom de votre animal n'a pas une taille adapté";
}}

if(!empty($_POST["police"])){$police=cleanData($_POST["police"]);
    //on vérifier que les valeurs de la police liste correspond au police a choisir
    if(!in_array($police, $policeList)){
        $error["police"] = "cette police n'existe pas.";
    }}
    else {$error["police"]= "Veuillez selectionner un police !";}
    
    // on vérifie que le textarea est vide ou non
if(empty($_POST["commentaire"])) {$error["commentaire"] = "Veuillez saisir votre message";} 
else {$commentaire = cleanData($_POST["commentaire"]);}
// validation et envoyer du formulaire rempli

// vérification du remplissage ou non et saisi incorrecte
if(!isset($_POST["captcha"], $_SESSION["captchaStr"])|| $_POST["captcha"] != $_SESSION["captchaStr"]){
    $error["captcha"] ="CAPTCHA incorrecte";
}
if(empty($error)){
    //envoi par email
    $body = "commentaire : $commentaire, police : $police, nomanimal : $nomanimal, color : $color, accessoire: $accessoire, email :$email, prenom : $prenom, nom: $nom";
    $envoi =sendMail($email,"adress email",$body);
    // envoie mysqladmin avec prépare requêtre nommé
    $sql =$pdo->prepare("INSERT INTO  `a.c.c`(nom, prenom, email, accessoire, color, nomanimal, police, commentaire) 
                         VALUES(:nom, :prenom, :email, :accessoire, :color, :nomanimal, :police, :commentaire)");
    $sql->execute(["nom"=>$nom, "prenom"=>$prenom, "email"=>$email, "accessoire"=>$accessoire, "color"=>$color, "nomanimal"=>$nomanimal, "police"=>$police, "commentaire"=>$commentaire]);
    $_SESSION['flash']="Votre commande a bien été envoyé. on vous répond le plus vite.";
    header('location: accueil.php');
    die;
    }
}

?>

<h4> Veuillez remplir les champs :</h4>
<form action="" method="post" class="Nb">
    <div class="nom">
    <label for="nom">Nom : </label>
    <input type="text" id="nom" name="nom" placeholder="votre nom" autofocus >
    <br>
    <span class="error"><?php echo $error["nom"]??"" ; ?></span> <br>    
</div>  
    <br>
    <div class="prenom">
    <label for="prenom">Prénom : </label>
    <input type="text" id="prenom" name="prenom" placeholder="votre prénom" ><br>
    <span class="error"><?php echo $error["prenom"]??"" ; ?></span> <br>
    </div>
    <br>
    <div class="email">
    <label for="email">Votre mail :</label>
    <input type="email" name="email" placeholder="votre mail" id="email" ><br> 
    <span class="error"><?php echo $error["email"]??"" ; ?></span> <br>
    </div>
    <br>
    <div class="acces">
    <label for="accessoire">Choix de l'accessoire pour votre animal :</label><br>
    <select name="accessoire" id="accessoire">
        <option value="">choix de l'accessoire</option>
        <option value="fontaine">fontaine(pour chien ou chat)</option>
        <option value="collier">collier</option>
        <option value="laisses">laisses</option>
        <option value="harnais">harnais</option>
        <option value="gamelle">gamelles</option>
        <option value="panier">panier</option>
        <option value="coussin">coussins</option>
        <option value="cage">cage(bac// pour rongeur ou oiseau)</option>
        <option value="bac">bac à litière</option>
        <option value="arbreP">Arbre pour perroquet</option>
        <option value="AccAqua">Accessoire pour aquarium</option>
    </select><br>
    <span class="error"><?php echo $error["accessoire"]??"" ; ?></span> <br>
    </div>
    <br>
    <div class="color">
    <label for="color">Choix de votre couleur :</label>
    <input type="color" name="color" id="color" value="color"><br>
    <span class="error"><?php echo $error["color"]??"" ; ?></span> <br>
    </div>
    <br>
    <div class="nomA">
    <label for="nomanimal">Le nom de votre animal ou le surnom : </label><br>
    <input type="text" id="nomanimal" name="nomanimal" placeholder="Le nom de votre animal" autofocus ><br>
    <span class="error"><?php echo $error["nomanimal"]??"" ; ?></span> <br>
    </div>  
    <div class="police">
    <fieldset>
        <legend> Choisez la police d'écrtiure parmi cela :</legend> <br>
    <input type="radio" name="police" id="arial" value="Arial" checked>
    <label for="arial">Arial :</label><p id="ari"> BRUTUS </p>
 
    <input type="radio" name="police" id="georgia" value="Georgia">
    <label for="georgia">Georgia :</label><p id="geor"> BRUTUS </p>
  
    <input type="radio" name="police" id="Franklin" value="Franklin Gothic Medium">
    <label for="Franklin">Franklin Gothic Medium:</label><p id="FGM"> BRUTUS </p>
   
    <input type="radio" name="police" id="Verdana" value="Verdana">
    <label for="Verdana">Verdana :</label><p id="verd"> BRUTUS </p>
    <span class="error"><?php echo $error["police"]??"" ; ?></span> <br>
    </fieldset>
</div>
    <br>
    <div class="Comm">
    <label for="commentaire">Laissez nous plus d'information à ce que vous voulez :</label><br>
    <textarea name="commentaire" placeholder="Vous pouvez donner plus de détail" id="commentaire" cols="35" rows="10"></textarea><br>
    <span class="error"><?php echo $error["commentaire"]??"" ; ?></span><br>
</div>
<div id="chat">
<label for="captcha">Veuillez recopier le texte ci-dessous pour valider :</label>
<!--   -->
<br> <img src="/ressources/service/_captacha.php?<?php echo time() ?>" alt="captcha"><br>
<input type="text" name="captcha" id="captcha" pattern="[A-Z0-9]{6}"><br>
<span class="error"><?php echo $error["captcha"]??"";?></span><br>
    <input type="submit" class="valider" value="envoyer" name="submit">
    <?php if(!empty($envoi)):;?>
    <p>
        <?php echo $envoi; ?> <br>
    </p>
    <?php endif; ?>
</form>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis perspiciatis eos harum consequatur consectetur
    similique tempore unde, fugiat mollitia porro eaque numquam tempora quod dolorum tenetur minima dolores alias iste?
</p>