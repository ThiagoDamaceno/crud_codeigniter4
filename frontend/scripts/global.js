async function refreshNotes () {
    const inputSearchValue = document.querySelector('#search-by-title').value
    const orderByValue = document.querySelector('input[name=order-by-title]:checked').value
    drawNotes(await getAllNotesByPartionalTitle(inputSearchValue, orderByValue))
}

function drawNotes(notes) {
    const appCardsElement = document.querySelector('#app-cards')
    appCardsElement.innerHTML = ''

    if (notes.length === 0) {
        appCardsElement.innerHTML = `
            <h2 class="text-center">No cards. Try to create some at the "+" icon</h2>
        `
    }
    notes.forEach(note => {
        const article = document.createElement('article')
        article.className = 'col-12 col-md-6 col-lg-4 col-xl-3 d-flex justify-content-center'

        const appCard = document.createElement('div')
        appCard.className = 'app-card'
        article.appendChild(appCard)

        const title = document.createElement('h4')
        title.className = 'title'
        title.innerText = note.title
        appCard.appendChild(title)

        const description = document.createElement('textarea')
        description.className = 'description'
        description.disabled = true
        description.value = note.description
        appCard.appendChild(description)

        const action = document.createElement('div')
        action.className = 'actions'
        appCard.appendChild(action)

        const buttonCancel = document.createElement('button')
        buttonCancel.className = 'cancel-button'
        buttonCancel.innerHTML = '<i class="bi bi-trash-fill"></i>'
        buttonCancel.onclick = async() => {
            if (await deleteNoteById(note.id)) {
                await refreshNotes()
                alert('Deleted!')
            } else {
                alert('Internal error!')
            }
        }
        action.appendChild(buttonCancel)

        const buttonViewAndEdit = document.createElement('button')
        buttonViewAndEdit.className = 'view-and-edit-button'
        buttonViewAndEdit.innerHTML = `
            <i class="bi bi-eye-fill"></i>
            <i class="bi bi-pencil-fill"></i>
        `
        buttonViewAndEdit.onclick = () => clickViewAndEditModal(note.title, note.description, note.id)
        action.appendChild(buttonViewAndEdit)

        appCardsElement.appendChild(article)
    });
}

function clickRefresh() {
    document.querySelector('#button-refresh').onclick = refreshNotes   
}

function clickSaveModal() {
    document.querySelector('#btn-save-modal').onclick = async () => {
        const inputValue = document.querySelector('#input-title').value
        const textareaValue = document.querySelector('#input-description').value
        
        if (inputValue && textareaValue) {
            if (await createNote(inputValue, textareaValue)) {
                await refreshNotes()
                alert('Note created!')
                closeModal()
            }
        } else {
            alert('Empty fields are not allowed')
        }
    }

}

function closeModal() {
    document.querySelector('#button-close-modal').click()
}

function clickEditModal(id) {
    document.querySelector('#btn-save-modal').onclick = async () => {
        const inputValue = document.querySelector('#input-title').value
        const textareaValue = document.querySelector('#input-description').value
        
        if (inputValue && textareaValue) {
            if (await updateNote(inputValue, textareaValue, id)) {
                await refreshNotes()
                alert('Note updated!')
                closeModal()
            }
        } else {
            alert('May not empty fields!')
        }
    }
}

function clickOpenModal() {
    document.querySelector('#button-open-modal').onclick = () => {
        clickSaveModal()
        const title = document.querySelector('#input-title')
        const description = document.querySelector('#input-description')
        title.value = ''
        description.value = ''

        retractInput(title.parentNode.children[0])
        retractInput(description.parentNode.children[0])
    }
}

function clickViewAndEditModal(title, description, id) {
    const titleElement = document.querySelector('#input-title')
    const descriptionElement = document.querySelector('#input-description')
    titleElement.value = title
    descriptionElement.value = description

    expandInput(titleElement.parentNode.children[0])
    expandInput(descriptionElement.parentNode.children[0])

    const modal = new bootstrap.Modal(document.querySelector('#modalNote'), {
        keybord: false
    })

    clickEditModal(id)

    modal.show()
}

function clickEnterSearchByTitle() {
    const inputElement = document.querySelector('#search-by-title')

    inputElement.addEventListener('keyup', (event) => {
        if (event.keyCode === 13) {
            event.preventDefault()
            refreshNotes()
        }
    })
}

function clickRadioOrderBy() {
    const radios = document.querySelectorAll('input[name=order-by-title]')
    radios.forEach(radio => {
        radio.onclick = () => {
            refreshNotes()
        }
    })
}

async function init () { 
    clickRefresh()    
    clickSaveModal()
    clickOpenModal()
    clickEnterSearchByTitle()
    clickRadioOrderBy()

    await refreshNotes()
}

init()
