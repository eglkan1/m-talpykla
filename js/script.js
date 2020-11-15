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