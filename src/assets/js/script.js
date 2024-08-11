import { updateFiles } from './addFiles.js';

const formInput = document.querySelector('#files');
const form = document.querySelector('form');
// const api = 'dxmprofuse/src/api/addFiles.php';

formInput.addEventListener('change', e => {
  // form.submit()
  console.log('changé');

  Array.from(formInput.files).forEach(file => {
    console.log(file.type)

    if (file.type !== 'application/pdf' && file.type !== 'image/jpeg') {
      alert('Un des fichiers envoyés n\'est pas pris en charge')
    } else {
      const formData = new FormData();
      Array.from(formInput.files).forEach(file => {
        console.log(file);
        formData.append(file.name, file);
      })

      const res = updateFiles(formData);
    }


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