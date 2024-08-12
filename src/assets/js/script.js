const formInput = document.querySelector('#files');
const form = document.querySelector('form');

formInput.addEventListener('change', () => {
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