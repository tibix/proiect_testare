const header = document.querySelector("header");
const menuToggler = document.querySelector(".menu-toggler");
const menu = document.querySelector(".menu__list");
const main = document.querySelector("main");


menuToggler.addEventListener("click", ()=>{
    menu.classList.toggle("opened");
    menuToggler.classList.toggle("active");
    header.toggleAttribute("data-overlay");

    if(window.scrollY>55){
        header.classList.toggle("scrolled");
    }
})

document.addEventListener("scroll", ()=>{
    if(window.scrollY>55){
        if(!menuToggler.classList.contains("active")){
            header.classList.add("scrolled");
        }
    }
    else {
        header.classList.remove("scrolled");
    }
})