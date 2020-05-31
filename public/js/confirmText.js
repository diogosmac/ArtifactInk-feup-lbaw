let input = document.querySelector('#confirmText')

input.addEventListener('input', (event) => {
    let value = input.value
    let button = document.querySelector('#deleteAccountButton')

    if (value == 'Artifact Ink') {
        button.removeAttribute('disabled')
    }
    else {
        button.setAttribute("disabled", "true")
    }
})
