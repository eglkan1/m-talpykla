document.getElementById("login").addEventListener("click", 
  function(){
    document.querySelector(".bg-modal").style.display = "flex";
});
document.querySelector(".close").addEventListener("click", function(){
  document.querySelector(".bg-modal").style.display = "none";
});
document.getElementById("register").addEventListener("click", 
  function(){
    document.querySelector(".bg-modal-reg").style.display = "flex";
});
document.querySelector(".close-reg").addEventListener("click", function(){
  document.querySelector(".bg-modal-reg").style.display = "none";
});

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}