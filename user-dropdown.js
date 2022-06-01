function myFunction(){
    document.getElementById("myUsername").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.fa-user-alt')) {
      var dropdown = document.getElementsByClassName("username-content");
      var i;
      for (i = 0; i < dropdown.length; i++) {
        var openDropdown = dropdown[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }


  