"use strict";
const main = document.querySelector("main");
const lien = document.querySelectorAll("a");

// --------------menu burger--------------------
let toggleButton = document.querySelector(".toggle-menu");
let navBar = document.querySelector(".nav-bar");

let navList = document.querySelector(".nav-list");
toggleButton.addEventListener("click", function () {
  navBar.classList.toggle("toggle");
});
navList.addEventListener("click", function () {
  navBar.classList.toggle("toggle");
});

// ----------------------------SPA------------------------
lien.forEach((a) => a.addEventListener("click", pages));
function pages(e) {
  e.preventDefault();
  window.history.pushState({}, "", e.target.href);
  loadPage();
}
function loadPage() {
  const chemins = {
    "/accueil": "./pages/accueil.php",
    "/index.php": "./pages/accueil.php",
    "/": "./pages/accueil.php",
    "/lepetitsplaisir": "./pages/lespetitsplaisir.php",
    "/pourvoschiens": "./pages/pourvoschiens.php",
    "/pourvoschats": "./pages/pourvoschats.php",
    "/pourvosnac": "./pages/pourvosnac.php",
    "/plusdinfos": "./pages/plusdinfos.php",
    "/nouscontacter": "./pages/nouscontacter.php",
    "/notreboutique": "./pages/notreboutique.php",
    404: "./pages/404.php",
    "404.php": "./pages/404.php",
  };
  const path = window.location.pathname;
  const chemin = chemins[path] || chemins[404];
  fetch(chemin).then((resp) => {
    if (resp.ok) {
      resp.text().then((data) => {
        main.innerHTML = data;
        switch (path) {
          case "/":
          case "/index.php":
          case "/accueil":
            break;
          case "/lepetitsplaisir":
            showSlides("lppPC");
            showSlides("lppFe");
            showSlides("lppGa");
            break;
          case "/pourvoschiens":
            showSlides("pvcCh");
            showSlides("pvcLs");
            showSlides("pvcMv");
            break;
          case "/pourvoschats":
            showSlides("pvcsAc");
            showSlides("pvcsPm");
            showSlides("pvcsBl");

            break;
          case "/pourvosnac":
            showSlides("pvnBr");
            showSlides("pvnAp");
            showSlides("pvnAa");
            break;
          case "/notreboutique":
          case "/nouscontacter":
            /*on fait un event sur le input "submit" pour 
            le resultat  : affiche l'envoie reussi ou erreur de saisi du formulaire*/
            const formulaire = document.querySelector("form");
            formulaire.addEventListener("submit", (e) =>
              upload(e, formulaire, chemin)
            );
            break;
        }
      });
    }
  });
}
loadPage();
//on fait la fonction upload pour qui nous retour notre formulaire remplir et en méthode "POST" surtout
function upload(e, formulaire, chemin) {
  e.preventDefault();
  const formData = new FormData(formulaire);
  // for(let a of formData.values()){ console.log(a);}
  /* on fait fetch pour recueillir et renvoyé les information sur le même formulaire */
  fetch(chemin, { method: "POST", body: formData }).then((resp) => {
    if (resp.ok) {
      resp.text().then((data) => {
        main.innerHTML = data;
        /*ici on relance l'evenement pour ne plus être en get mais être en post, 
        voir le formulaire rempli(avec ou sans message d'erreur)*/
        const formulaire = document.querySelector("form");
        if(!formulaire)return;
        formulaire.addEventListener("submit", (e) =>
          upload(e, formulaire, chemin)
        );
      });
    }
  });
}
// -----------------------carousel----------------------
/*cette fonction  permet le fonctionnement de plusieur  carousel dans une même page */
function showSlides(n) {
  let items = document.querySelectorAll(`#${n} .item`);
  let btns = document.querySelectorAll(`#${n} .next,#${n} .prev`);
  let index = 0;
  /* fonction qui permet de mettre en vue la 1er et cacher les autres*/
  function showItems(n) {
    index = n > items.length - 1 ? 0 : n < 0 ? items.length - 1 : n;
    items.forEach((item) => {
      item.style.display = "none";
    });
    items[index].style.display = "block";
  }
  /* fonction qui va permettre de faire le changement d'image avec les boutons */
  showItems(index);
  function changeItem(e) {
    if (e.target.classList.contains("next")) {
      showItems(++index);
    } else {
      showItems(--index);
    }
  }
  /*avec le click sur les bouton next, prev = changement d'image */
  btns.forEach((btn) => btn.addEventListener("click", changeItem));
}
