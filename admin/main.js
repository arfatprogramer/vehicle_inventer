let menuIcon=document.querySelector('#menu-icon');
let arrowIcon=document.querySelector('#arrow-icon');
let navBar=document.querySelector('.navbar');

let status=true;
menuIcon.addEventListener("click",(e,status) =>{
    let arr=Array.from(navBar.children);
    if(status){
        menuIcon.classList.toggle("fi-rr-menu-burger");
        menuIcon.classList.add("fi-rr-cross");
        status=false;
        arr.forEach((e)=>{
            e.classList.toggle("max-sm:hidden");
        });
    }else{
        menuIcon.classList.toggle("fi-rr-cross");
        menuIcon.classList.toggle("fi-rr-menu-burger");
        arr.forEach((e)=>{
            e.classList.toggle("max-sm:hidden");
        })
        status=true;
    }

    // console.log(navBar.classList);
    navBar.classList.toggle("max-sm:h-screen");
    menuIcon.classList.remove("max-sm:hidden")
   
        
    
})
arrowIcon.addEventListener("click",(e) =>{
    console.log(e);
    console.log("clicked");
    
    
})






