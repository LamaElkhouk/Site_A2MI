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
