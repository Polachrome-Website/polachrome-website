const cartIcon = document.querySelector('.fa-shopping-cart')
const shoppingCart = document.querySelector('.shopping-cart')
shoppingCart.inWindow = 0

cartIcon.addEventListener('mouseover', ()=>{
  if(shoppingCart.classList.contains('hide'))
  shoppingCart.classList.remove('hide')
})


cartIcon.addEventListener('mouseleave', ()=>{
  setTimeout(() =>{
    if(shoppingCart.inWindow===0){
      shoppingCart.classList.add('hide')
    }
  } ,500)
})

shoppingCart.addEventListener('mouseover', ()=>{
  shoppingCart.inWindow=1
})

shoppingCart.addEventListener('mouseleave', ()=>{
  shoppingCart.inWindow=0
  shoppingCart.classList.add('hide')
})