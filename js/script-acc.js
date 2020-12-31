document.getElementById("add").addEventListener("click", 
  function(){
    document.querySelector(".add-modal").style.display = "flex";
});
document.querySelector(".close").addEventListener("click", function(){
  document.querySelector(".add-modal").style.display = "none";
});