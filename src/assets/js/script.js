const formInput = document.querySelector('#files');
const form = document.querySelector('form');

const root = '/dxmprofuse';``

formInput.addEventListener('change', () => {
  let totalWeight = 0
  let error = ''
  
  // check if pdf or jpeg 
  Array.from(formInput.files).forEach(file => {
    error = file.type !== 'application/pdf' && file.type !== 'image/jpeg' ? 'Un fichier n\'est pas au bon format (JPEG ou PDF)' : ''
    totalWeight += file.size
  })

  // stop if file not pdf or jpeg
  if (error !== '') {
    alert(error)
    return
  }

  error += totalWeight > 8388608 ? 'Le poids total des fichiers ne doit pas dépasser 8 MO' : ''
  // stop if total weight > 8 Mo (can be changed with server config)
  if (error !== '') {
    alert(error)
    return
  }

  if (error === '') {
    form.submit()
  }
})

const deleteButtons = document.querySelectorAll('.delete');

// redirect to delete path
deleteButtons.forEach(button => {
  button.addEventListener('click', e => {
    const id = e.currentTarget.id
    location.href =  root + '?key=' + id
  })
})