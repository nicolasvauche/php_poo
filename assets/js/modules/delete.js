export const deleteBtns = () => {
  const deleteBtns = document.getElementsByClassName('delete')

  for (const deleteBtn of deleteBtns) {
    deleteBtn.addEventListener('click', e => {
      e.preventDefault()

      if (window.confirm('Confirmez-vous la suppression de ce message ?')) {
        window.location = deleteBtn.href
      }
    })
  }
}
