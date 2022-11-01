import throttle from "https://cdn.skypack.dev/lodash@4/throttle";



function onScroll() {
  if (window.pageYOffset) {
    $$header.classList.add("is-active");
  } else {
    $$header.classList.remove("is-active");
  }
}

const $$header = document.querySelector(".js-header");

window.addEventListener("scroll", throttle(onScroll, 300));

 

//muda style ao passar o mouse
function clicando(){

    var tag_li = document.getElementsByClassName('navigation__item');
   var tag_a = tag_li.getElementsByTagName('a');
   for (var b=0; b<tag_a.length; b++ )
   {
      tag_a[b].style.color = "yellow";
   }
      tag.style.color = "blue";
  
}