const header = document.querySelector('#nav-header'); 
window.addEventListener('scroll', function() {
  if (window.scrollY >= 54) {
    header.classList.add('header-scrolling'); 
  } else {
    header.classList.remove('header-scrolling'); 
  }
});

function change_form(selectedValue){
  let load_documents = document.getElementById('image_input');
  let document_input = document.getElementById('document_input');
  if (selectedValue === "standard") {
    load_documents.style.display = "none";
    document_input.removeAttribute('required');
  } else if (selectedValue === "non-contact") {
    load_documents.style.display = "block";
    document_input.setAttribute('required', "true")

  }
}