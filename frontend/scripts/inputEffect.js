const iputsEffect = document.querySelectorAll('.input-effect')

function expandInput(labelElement) {
    labelElement.style.fontSize = '0.8em'
    labelElement.style.transform = 'translateY(0px)'
}

function retractInput(labelElement) {
    labelElement.style.fontSize = '1em'
    labelElement.style.transform = 'translateY(12px)'
}

iputsEffect.forEach(input => {
    if (input.children[1].value) {
        expandInput(input.children[0])
    }

    input.children[1].onfocus = () => {
        const label = input.children[0]

        expandInput(label)
    }

    input.addEventListener('focusout', () => {
        if (!input.children[1].value) {
            const label = input.children[0]

            retractInput(label)
        }
    })
})

