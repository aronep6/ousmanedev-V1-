/*
* >> globalScripts.js
*    Ce fichier contient les principaux scripts de cette page PHP (Téléchargement CV, Loader, Navigation et Contact)
*    il est possible de modifier les variables pour obtenir des résultats différents.
*/

/* > Nom du CV fichier lorsqu'il est téléchargé */
const cv_filename = "Mon CV";

/* > Temps en secondes avant lequel le Loader est désactivé (si la page n'est pas chargée) */
const forceEndLoadTimeout = 35;

/* ======================================================================================= */
const scrl = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('filling-scan-div');
      }
    });
  });
function observer(obs){
  scrl.observe(document.querySelector(obs));
}

// === Classe Librairie (pour les ressources..) ===
class Library{
  constructor(){
    this.status = '';
  }
  resDownload(){
    const a = document.createElement("a"); 
    a.href = "./assets/docs/mon_cv.pdf";
    a.setAttribute("download", cv_filename);
    a.click(); const cv_btn = document.getElementById('cv-download-button')
    cv_btn.textContent = "T\u00e9l\u00e9charg\u00e9"; cv_btn.style.backgroundColor = "#12948C";
    cv_btn.style.borderColor = "#12948C"; cv_btn.disabled = true;
  }
}

// === Classe de Chargement (Durant le chargement de la page) ===
class Loader{
  constructor(){
    this.htmlElement = document.getElementById('html');
    this.loadModalElement = document.getElementById('loaderFullScreenId');
  }
  invokeStartLoad(){ if(document.readyState === 'complete'){ return } else {return this.modalShow('flex');} }
  invokeEndLoad(){
    setTimeout(() => {
      this.loadModalElement.classList.add("isClosingModal");
      setTimeout(() => {
        this.modalShow('none'); this.loadModalElement.classList.remove("isClosingModal"); this.enableYOverflow();
      }, 400);
    }, 700);
  }
  modalShow(target){ return this.loadModalElement.style.display = target; }
  enableYOverflow(){ return this.htmlElement.style.overflowY = "auto"; }
}

// === Classe Navigation ===
class Navigation{
  constructor(){
    this.displayStatus = "";
  }
  openMenu(){ this.runEvent("none","flex","flex");  }
  closeMenu(){  this.runEvent("flex","none","none");  }
  runEvent(openMenuStatus, closeMenuStatus, headerLinksStatus){
    document.getElementById("openMenu").style.display = openMenuStatus;
    document.getElementById("closeMenu").style.display = closeMenuStatus;
    document.getElementById("header-links-id").style.display = headerLinksStatus;
  }
}

// === Classe Contact (Utilisé pour envoyer un mail via PHP) ===
class Contact{
  constructor(){
    this.name = ''; this.email = ''; this.phone = ''; this.message = '';
    this.nameStatus = 0; this.phoneStatus = 0; this.emailStatus = 0; this.messageStatus = 0;
  }
  // Récupération des données et vérification
  handleName(e){ this.name = e.target.value;
    if(this.name.length >= 1 && this.name.length <= 44)
    { this.nameStatus = 1; } else { this.nameStatus = 0; }
  }
  handlePhone(e){ this.phone = e.target.value;
    if(this.phone.length >= 1 && this.phone.length <= 15)
    { this.phoneStatus = 1; } else { this.phoneStatus = 0; }
  }
  handleEmail(e){ this.email = e.target.value; 
    if(this.email.length >= 8 && this.name.length <= 40 && this.email.includes('@') && this.email.includes('.'))
    { this.emailStatus = 1; } else { this.emailStatus = 0; }
  }
  handleMessage(e){ this.message = e.target.value; 
    if(this.message.length >= 1 && this.message.length <= 550)
    { this.messageStatus = 1; } else { this.messageStatus = 0; }
  }
  // Vérification du statut des données
  checkDatas(){
    const submitBtn = document.getElementById('001submitFromID')
    if(this.nameStatus === 1 && this.phoneStatus === 1 && this.emailStatus === 1 && this.messageStatus === 1){
      submitBtn.disabled = false;
      submitBtn.title = 'Votre message est prêt à partir !';
    } else {
      submitBtn.disabled = true;
      submitBtn.title = "Complétez tout les champs avant de continuer, il faut que j'en sache plus sur vous !";
    }
  }
}

// --- 1/2 :  Initialisation des classes (n'y touche pas) --- //
const lib = new Library();
const load = new Loader();
const nav = new Navigation();
const contact = new Contact();

// --- 2/2 : Run --- //

// Ici on vérifie si l'URL contient /about/ (Projets) pour ne pas lancer les observeurs (n'y touche pas si tu as des pages projets)
const getUrl = document.location.toString();
if(getUrl.includes('/about/')){ null; } else {
  observer('#html-scan'); observer('#css-scan'); observer('#python-scan');
  observer('#js-scan'); observer('#php-scan'); observer('#react-scan');
}

// Forcer la fin du chargement, si il dépasse X secondes (défini tout en haut ^^)
setTimeout(() => {
  return load.invokeEndLoad();
}, forceEndLoadTimeout);