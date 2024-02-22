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

// img download
        
function downloadImage() {
  // Replace 'image.jpg' with the actual path or URL of your image
  var imageUrl = 'img/C.V..png';

  // Creating a temporary link element
  var link = document.createElement('a');

  // Setting the href attribute to the image URL
  link.href = imageUrl;

  // Specifying the download attribute and setting the file name
  link.download = 'Resume.jpg';

  // Simulating a click on the link to trigger the download
  document.body.appendChild(link);
  link.click();

  // Removing the link from the DOM
  document.body.removeChild(link);
}