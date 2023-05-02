const themeToggle = document.getElementById('theme-toggle');
const themeStylesheet = document.getElementById('theme-stylesheet');

themeToggle.addEventListener('click', () => {
  console.log(themeStylesheet)
  if (themeStylesheet.getAttribute('href') === "css/light-theme.css") {
    themeStylesheet.setAttribute('href', "css/dark-theme.css");
  } else {
    themeStylesheet.setAttribute('href', "css/light-theme.css");
  }
});


function description_service(id, title, description) {
  // recuperer la description et le titre correspondant à l'icone
  var titre_service= document.getElementById("titre_service");
  var description_service = document.getElementById("description_service");

  var triangle = document.getElementById("triangle");
  triangle.style.transform = `translate(${3+((id-1)*9.33)}rem, 0.2rem)`;

  titre_service.innerHTML = title;
  description_service.innerHTML = description;

  console.log(title);
} 