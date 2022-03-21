const BASE_URL = 'http://localhost:8080'

async function createNote(title, description) {
    const response = await fetch(BASE_URL + '/note', {
        body: JSON.stringify({
            title,
            description
        }),
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
    })
    
    const data = await response.json()

    return data
}

async function getAllNotesByPartionalTitle(partionalTitle, orderBy = 'asc') {
    const response = await fetch(BASE_URL + `/note/getByPartionalTitle/partionalTitle=${partionalTitle}/orderBy=${orderBy}`)

    const data = await response.json()

    return data
}

async function deleteNoteById(id) {
    const response = await fetch(BASE_URL + `/note/id=${id}`, {
        method: 'DELETE'
    })

    const data = await response.json()

    return data
}

async function updateNote(title, description, id) {
    const response = await fetch(BASE_URL + '/note', {
        body: JSON.stringify({
            title,
            description,
            id
        }),
        method: 'PUT',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
    })

    const data = await response.json()

    return data
}