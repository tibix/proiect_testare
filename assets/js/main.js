const header = document.querySelector("header");
const menuToggler = document.querySelector(".menu-toggler");
const menu = document.querySelector(".menu__list");

const main = document.querySelector("main");

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

menuToggler.addEventListener("click", ()=>{
    menu.classList.toggle("opened");
    menuToggler.classList.toggle("active");
    header.toggleAttribute("data-overlay");

    if(window.scrollY>55){
        header.classList.toggle("scrolled");
    }
})

if(document.querySelector(".cat_dropdown_btn")){
    const cat_dropdown_btn = document.querySelector(".cat_dropdown_btn");
    const cat_dropdown_menu = document.querySelector(".cat_dropdown_menu");

    const acc_dropdown_btn = document.querySelector(".acc_dropdown_btn");
    const acc_dropdown_menu = document.querySelector(".acc_dropdown_menu");
    const dropdown_arrow = document.querySelectorAll(".fa-caret-down");

    cat_dropdown_btn.addEventListener("click", ()=>{
        cat_dropdown_menu.classList.toggle("expanded");
        dropdown_arrow[0].classList.toggle("upside_down");
    })

    acc_dropdown_btn.addEventListener("click", ()=>{
        acc_dropdown_menu.classList.toggle("expanded");
        dropdown_arrow[1].classList.toggle("upside_down");
    })
}