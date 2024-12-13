// DataTable Initialization
$(document).ready(function() {
    $("#myTable").DataTable({
        scrollX: true
    });
});

// Function for Delete Confirmation
function deleteConfirm(event) {
    Swal.fire({
        title: 'Delete Confirmation!',
        text: 'Are you sure to delete the item?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonText: 'Yes Delete',
        confirmButtonColor: 'red'
    }).then(dialog => {
        if (dialog.isConfirmed) {
            window.location.assign(event.dataset.deleteUrl);
        }
    });
}

// Handling flash message with SweetAlert
document.addEventListener("DOMContentLoaded", function() {
    var flashMessage = document.getElementById('flash-message'); // Assume 'flash-message' contains PHP session flash message

    if (flashMessage && flashMessage.dataset.message) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        Toast.fire({
            icon: 'success',
            title: flashMessage.dataset.message
        });
    }
});

// Bootstrap alert initialization
var alertList = document.querySelectorAll('.alert');
alertList.forEach(function(alert) {
    new bootstrap.Alert(alert);
});
