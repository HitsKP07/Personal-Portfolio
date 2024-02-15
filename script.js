const btn = document.getElementById('button')
const menu = document.getElementById('menu')

btn.addEventListener("click", function () {
  if (menu.style.display == 'none') 
  {
    menu.style.display = 'inline-block';
    console.log("show");
  }
   else {
    menu.style.display = "none";
  }
});
var buton = document.getElementsByTagName('button')
buton.addEventListener("click",()=>{
buton.style.opacity ='.8'
}
)

