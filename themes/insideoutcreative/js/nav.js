let menuHeight = document.querySelector('ul#menu-main-menu');
let navMenu = document.querySelector('#navItems');
let navOpen = document.querySelector('#navToggle');
let navClose = document.querySelector('#navClose');
let overlay = document.querySelector('#body-overlay');
let menuCol1 = document.querySelector('#menuCol1');
let menuCol2 = document.querySelector('#menuCol2');
// let rowNavItems = document.querySelector('.row.nav-items');
// let rowNavItemsOutside = document.querySelector('div#navItems .col:not(.slide-menu)');
let body = document.querySelector('body');
let header = document.querySelector('header');
let blankSpace = document.querySelector('.blank-space');

window.addEventListener("scroll", parallaxEffect);

function parallaxEffect() {
    blankSpace.style.height = header.offsetHeight + "px";
    header.classList.add('position-fixed');
    header.classList.remove('position-relative');
}

// opens dropdown
navOpen.addEventListener('click',function(){
overlay.classList.add('activate');
navMenu.classList.remove('closed');
navMenu.classList.add('activate');
body.classList.add('nav-open');
openMenuCol1();
openMenuCol2();
});

// closes dropdown with X
navClose.addEventListener('click', function(){
navMenu.classList.remove('activate');
navMenu.classList.add('closed');

body.classList.remove('nav-open');
closeMenuCol1();
closeMenuCol2();
removeOverlay();
});
// closes dropdown with bodyOverlay
overlay.addEventListener('click', function(){
navMenu.classList.remove('activate');
navMenu.classList.add('closed');

body.classList.remove('nav-open');
closeMenuCol1();
closeMenuCol2();
removeOverlay();
});
// closes dropdown with Escape Key
document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) {
        // alert('Esc key pressed.');
        navMenu.classList.remove('activate');
        navMenu.classList.add('closed');
        
        body.classList.remove('nav-open');
        closeMenuCol1();
        closeMenuCol2();
        removeOverlay();
    }
};

function openMenuCol1() {
    setTimeout(function(){ 
        menuCol1.classList.add('activate');
    }, 200);
  }
function closeMenuCol1() {
    setTimeout(function(){ 
        menuCol1.classList.remove('activate');
    }, 400);
  }

function openMenuCol2() {
    setTimeout(function(){ 
        menuCol2.classList.add('activate');
    }, 400);
  }
function closeMenuCol2() {
    setTimeout(function(){ 
        menuCol2.classList.remove('activate');
    }, 200);
  }
function removeOverlay() {
    setTimeout(function(){ 
        overlay.classList.remove('activate');
    }, 700);
  }

// for inner menus
let title = document.querySelectorAll('ul.menu > li.menu-item-has-children > ul.sub-menu > li.menu-item-has-children');
let arrow = document.createElement("i");
arrow.className = "fa fa-chevron-right open-sub-menu";

$(title).append(arrow);

let dropdownArrows = document.querySelectorAll('ul.menu > li.menu-item-has-children > ul.sub-menu > li.menu-item-has-children .open-sub-menu');

$(dropdownArrows).on( "click", function() {
    $(this).parent().toggleClass('activate');
    $(this).parent().siblings().removeClass('activate');
  });

  $(document).ready(function() {
    $('ul.menu > li.menu-item-has-children > ul.sub-menu > li.current_page_item').addClass('activate');
    $('ul.menu > li.menu-item-has-children > ul.sub-menu > li.current-page-ancestor').addClass('activate');
    });


// if(navMenu.classList.contains('activate')){
// navMenu.style.height = menuHeight.offsetHeight+"px";
// } else {
// navMenu.style.height = "0px";
// }


// let menuItemHasChildren = document.querySelectorAll('.menu-item-has-children');
// for (let i = 0; i < menuItemHasChildren.length; ++i){

// // `element` is the element you want to wrap
// let subMenu = document.querySelectorAll('.sub-menu');
// for (let i = 0; i < subMenu.length; ++i){
// var parent = subMenu[i].parentNode;
// var wrapper = document.createElement('div');
// wrapper.className += "sub-menu-parent";

// // set the wrapper as child (instead of the element)
// parent.replaceChild(wrapper, subMenu[i]);
// // set element as child of wrapper
// wrapper.appendChild(subMenu[i]);

// // submenu is in position absolute on load so it doesnt show when website loads but then changes to position relative for dropdown navigation to function properly
// subMenu[i].style.position="relative";

// menuItemHasChildren[i].addEventListener("mouseover", function(){
// this.classList.add('open');
// // this.querySelector('.sub-menu-parent .sub-menu-parent').style.background = "red";
// let subMenuHeight = this.querySelector('.sub-menu-parent .sub-menu-parent .sub-menu');
// this.querySelector('.sub-menu-parent .sub-menu-parent').style.height = subMenuHeight.offsetHeight+"px";
// });
// menuItemHasChildren[i].addEventListener("mouseout", function(){
// this.classList.remove('open');
// this.querySelector('.sub-menu-parent .sub-menu-parent').style.height = "0px";
// });

// }
// }