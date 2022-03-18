const menuBtn = document.querySelector(".menu-icon span");
const searchBtn = document.querySelector(".search-icon");
const cancelMenuBtn = document.querySelector(".cancel-icon");
const cancelSearchBtn = document.querySelector(".cancel-search-icon");
const items = document.querySelector(".nav-items");
const form = document.querySelector("form");
menuBtn.onclick = ()=>{
  items.classList.add("active");
  menuBtn.classList.add("hide");
  searchBtn.classList.add("hide");
  cancelMenuBtn.classList.add("show");
}
cancelMenuBtn.onclick = ()=>{
  items.classList.remove("active");
  menuBtn.classList.remove("hide");
  searchBtn.classList.remove("hide");
  cancelMenuBtn.classList.remove("show");
  form.classList.remove("active"); 
}


searchBtn.onclick = ()=>{
  form.classList.add("active");
  searchBtn.classList.add("hide");
  cancelSearchBtn.classList.add("show");
}

cancelSearchBtn.onclick = ()=>{
  form.classList.remove("active");
  cancelSearchBtn.classList.remove("show");
  searchBtn.classList.remove("hide");
  
}

