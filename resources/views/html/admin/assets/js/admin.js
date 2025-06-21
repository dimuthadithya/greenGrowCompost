// Admin Dashboard JavaScript

document.addEventListener('DOMContentLoaded', function () {
  // Initialize tooltips
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // Delete confirmation
  document.querySelectorAll('.btn-danger').forEach((button) => {
    button.addEventListener('click', function (e) {
      if (!confirm('Are you sure you want to delete this item?')) {
        e.preventDefault();
      }
    });
  });

  // Form validation
  document.querySelectorAll('form').forEach((form) => {
    form.addEventListener('submit', function (e) {
      if (!form.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
      }
      form.classList.add('was-validated');
    });
  });

  // Image preview on file input change
  document.querySelectorAll('input[type="file"]').forEach((input) => {
    input.addEventListener('change', function (e) {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        const preview = this.parentElement.querySelector('img');

        if (preview) {
          reader.onload = function (e) {
            preview.src = e.target.result;
          };
          reader.readAsDataURL(this.files[0]);
        }
      }
    });
  });
});
