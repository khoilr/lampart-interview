$('#editProductModal').on('show.bs.modal', function (event) {
    button = event.relatedTarget;
    let id = button.getAttribute('data-id');
    let name = button.getAttribute('data-name');
    let price = button.getAttribute('data-price');
    let category = button.getAttribute('data-category');
    let image = button.getAttribute('data-image');

    let modal = $(this)[0];
    modal.querySelector('#edit-id').value = id;
    modal.querySelector('#edit-name').value = name;
    modal.querySelector('#edit-price').value = price;
    modal.querySelector('#edit-category').value = category;
    modal.querySelector('#edit-image').src = image;
});

//delete button
let deleteButton = document.getElementById('delete');
deleteButton.addEventListener('click', function (event) {
    event.preventDefault();
    let id = document.getElementById('edit-id').value;

    $.post('/product/delete', { id: id }, function (data) {
        data == 1 ? location.reload() : alert('error');
    });
});
