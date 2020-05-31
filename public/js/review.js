/**
 * Handle changes in review score input 
 */

let reviewForms = document.querySelectorAll('.writeReviewForm, .editReviewForm')

for (let j = 0; j < reviewForms.length; j++) {
  let stars = reviewForms[j].getElementsByClassName('star');
  for (let i = 0; i < stars.length; i++) {
    stars[i].addEventListener('click', (event) => {
      let pus = event.target.parentNode.parentNode.querySelectorAll('.star_label i');
      for (let k = 0; k < i; k++) {
        pus[k].className = "far fa-star"
      }
      for (let k = i; k < pus.length; k++) {
        pus[k].className = "fas fa-star"
      }

    })
  }
}
