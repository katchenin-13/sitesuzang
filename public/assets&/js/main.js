$(document).ready(function() {
  $('i.icon').click(function() {
      $('.nav-list').slideToggle()
  });


  
});

const toTop = document.querySelector(".to-top");

window.addEventListener("scroll", () => {
if (window.pageYOffset > 100) {
  toTop.classList.add("active");
} else {
  toTop.classList.remove("active");
}
})
const nav1 = document.querySelector(".nav1");
let lastScroly = window.scrollY;
window.addEventListener("scroll",()=>{
  if(lastScroly < window.scrollY){
     nav1.classList.add("nav--hidden");
  }else{
    nav1.classList.remove("nav--hidden");
  }
lastScroly = window.scrollY;
});



jQuery(document).ready(function($){
  // Get current path and find target link
  var path = window.location.pathname.split("/").pop();
  
  // Account for home page with empty path
  if ( path == '' ) {
    path = 'index.php';
  }
      
  var target = $('nav a[href="'+path+'"]');
  // Add active class to target link
  target.addClass('active');
});

