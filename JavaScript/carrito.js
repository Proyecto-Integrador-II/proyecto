//Cart

let cartIcon = document.querySelector("#cart-icon");
let cart = document.getElementsByClassName(".cart");
let closeCart = document.querySelector("#close-cart");

cartIcon.onclick= () =>{
    console.log("entro")
    cart.classList.add("active");
}





