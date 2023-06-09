//script pour la section service - page accueil, ajouté le 02-05-2023
function description_service(id, title, description) {
    // recuperer la description et le titre correspondant à l'icone
    var titre_service= document.getElementById("titre_service");
    var description_service = document.getElementById("description_service");
    //on recupere l'id du triangle pour le faire bouger on fonction de l'icone
    var triangle = document.getElementById("triangle");
    triangle.style.transform = `translate(${3+((id-1)*9.33)}rem, 0.2rem)`;

    //on rempli les div vides avec les informations recuperer depuis l'icone cliqué!
    titre_service.innerHTML = title;
    description_service.innerHTML = description;

    //console.log(title);
} 

//script section logo - page accueil, ajouté le 04-05-2023
const carousel = document.querySelector('.carousel');
const prevButton = document.querySelector('.carousel-control-prev')
const nextButton = document.querySelector('.carousel-control-next')

$('.carousel').carousel({
    interval:2000, // temps en millisecondes avant de passer à la prochaine slide
    pause: 'hover', // arrêter le défilement automatique lorsque la souris survole le carousel
    wrap: true, // permet de boucler les slides une fois la dernière atteinte
    ride: "carousel", // permet de démarrer le carousel automatiquement à l'initialisation
})

nextButton.addEventListener('click', () =>{
    $('.carousel').carousel('next');
})

prevButton.addEventListener('click', () =>{
    $('.carousel').carousel('prev');
})
