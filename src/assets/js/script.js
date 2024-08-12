import { updateFiles } from './addFiles.js';

const formInput = document.querySelector('#files');
const form = document.querySelector('form');
// const api = 'dxmprofuse/src/api/addFiles.php';

formInput.addEventListener('change', e => {
  // form.submit()
  console.log('changé');

  Array.from(formInput.files).forEach(file => {
    console.log(file.type)
form.submit()
    // if (file.type !== 'application/pdf' && file.type !== 'image/jpeg') {
    //   alert('Un des fichiers envoyés n\'est pas pris en charge')
    // } else {
    //   form.submit()
    // }
  })
})
const deleteButtons = document.querySelectorAll('.delete');

deleteButtons.forEach(button => {
  button.addEventListener('click', e => {
    const id = e.currentTarget.id
    console.log(id);
    location.href = 'src/api/remove.php?id=' + id
  })
})