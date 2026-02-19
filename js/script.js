const header = document.querySelector('header');

window.addEventListener('scroll', function(e) {

  let scroll = this.scrollY;
  if(scroll > 254 && header.clientHeight > 60) {
    header.style.height = `60px`;
    return;
  }
  if(scroll > 254) return;
  
  const defaultHeight = 100;
  
  let newHeight = defaultHeight - scroll / 7;
  if(newHeight < 60) newHeight = 60;
  header.style.height = `${newHeight}px`;
  
});