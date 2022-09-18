<?php 
session_start();
// envoie d'un message de confirmation  
    if(isset($_SESSION["flash"])){ 
        $flash= $_SESSION["flash"];
       unset($_SESSION["flash"]);}
?>
<div><?php echo $flash??"" ?></div>
<div class="main">
<section id="infos">
    <h2>Notre entreprise :</h2>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex
      repudiandae ad incidunt, natus vel mollitia! Doloremque tempora nihil
      provident animi amet repellat cupiditate nesciunt. Non hic cum neque
      est libero?
    </p>
  </section>
  <!--  -accessoire en commun-->

    <article id="lpp">
    <h2>Les Petits Plaisirs</h2>
    <div>
      <img class="lpp  item " src="./image/canapé.jpg" alt="canapé" />
      </div>
    </article>
      <article id="lesACS">
        <h3>Ce qui est faut savoir :</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo
          doloribus ab qui dolorum nesciunt, nobis facilis distinctio nam
          aliquam ratione culpa quas tempore ea voluptatum, voluptas assumenda
          provident aliquid. Ipsa?
        </p>
      </article>
 
  <article id="pvc">
    <h2>Pour Vos Chiens</h2>
    <div>
      <img class="pvc" src="./image/toutchien.jpg" alt="tout-accessoire" />
    </article>

      <article id="leschiens">
        <h3>Ce qui est faut savoir :</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo
          doloribus ab qui dolorum nesciunt, nobis facilis distinctio nam
          aliquam ratione culpa quas tempore ea voluptatum, voluptas assumenda
          provident aliquid. Ipsa?
        </p>
      </article>
  
  <article id="pvcs">
    <h2>Pour Vos Chats</h2>
    <div>
      <img class="pvcs item" src="./image/arbre.png" alt="arbre à chat" />
</div>
    </article>
  <article id="leschats">
    <h3>Ce qui est faut savoir :</h3>
    <p>
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo
      doloribus ab qui dolorum nesciunt, nobis facilis distinctio nam
      aliquam ratione culpa quas tempore ea voluptatum, voluptas assumenda
      provident aliquid. Ipsa?
    </p>
  </article>

  <article id="Nacs">
    <h2>Pour Vos NAC</h2>
    <div>
      <img class="pvcs item" src="../image/arbreperroquet.jpg" alt="" />
    </div>
  </article>
      <aticle id="NAC">
        <h3>Ce qui est faut savoir :</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo
          doloribus ab qui dolorum nesciunt, nobis facilis distinctio nam
          aliquam ratione culpa quas tempore ea voluptatum, voluptas assumenda
          provident aliquid. Ipsa?
        </p>
      </aticle>
    </div>