function projectAutoScroll() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("activeScroller").style.height = scrolled + "%";
}

// === Classe Modal (affiche les captures en plus grand) ===
class Modal{
  constructor(){
    this.modal = document.getElementById("screen-modal");
    this.modalStatus = this.modal.style.display;
  }
  callModal(e){
    if(e.isTrusted === true && (e.target.outerHTML.includes('<script') != 1)){
      const winWidth = window.innerWidth;
      if (winWidth > 890){
        const link = new String(e.target.src);
        const modalImg = document.getElementById("modal-img");
        modalImg.style.backgroundImage = "url('" + link + "')";
        this.openModal();
      } else {null}
    } else return;
  }
  modalEventLister(e){
    if(e.key === 'Escape'){return this.closeModal();}
  }
  openModal(){
    this.modal.style.display = "flex";
    // Ajout de l'event listener
    document.addEventListener('keyup', (e) => {
      this.modalEventLister(e);
    }, false);
  }
  closeModal(){
    this.modal.style.display = "none";
    // Suppression de l'event listener
    document.removeEventListener('keyup', (e) => {
      this.modalEventLister(e);
    }, false);
  }
}

// Début d'éxecution : Class + Event Listener
const modal = new Modal();
document.addEventListener('scroll', () => { projectAutoScroll() });