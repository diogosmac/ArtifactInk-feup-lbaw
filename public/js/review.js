let stars = document.querySelectorAll('.star');

for (let i = 0; i < stars.length; i++) {
 stars[i].addEventListener('click', replaceIcon.bind(null, i))
}

function replaceIcon(starNo) {
    console.log(starNo)
  let pus = document.querySelectorAll('.star_label');
  for (let i = 0; i < starNo; i++) {
    pus[i].innerHTML = "<i class=\"far fa-star\"></i>"
  }
  for (let i = starNo; i < pus.length; i++) {
    pus[i].innerHTML = "<i class=\"fas fa-star\"></i>"
  }
}