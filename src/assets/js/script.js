import { updateFiles } from './addFiles.js';

const formInput = document.querySelector('#files');
const form = document.querySelector('form');
// const api = 'dxmprofuse/src/api/addFiles.php';

formInput.addEventListener('change', e => {
  form.submit()
})
const deleteButtons = document.querySelectorAll('.delete');

deleteButtons.forEach(button => {
  button.addEventListener('click', e => {
    const id = e.currentTarget.id
    console.log(id);
    location.href = 'src/api/remove.php?id=' + id
  })
})