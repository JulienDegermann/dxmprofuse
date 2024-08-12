const formInput = document.querySelector('#files');
const form = document.querySelector('form');
<<<<<<< HEAD

formInput.addEventListener('change', () => {
=======


formInput.addEventListener('change', e => {


>>>>>>> 699b880 (clean useless code)
  form.submit()
})

const deleteButtons = document.querySelectorAll('.delete');

// redirect to delete path
deleteButtons.forEach(button => {
  button.addEventListener('click', e => {
    const id = e.currentTarget.id
    location.href = 'src/api/remove.php?id=' + id
  })
})