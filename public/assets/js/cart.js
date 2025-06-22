// Function to update quantity
function updateQuantity(button, change) {
    const form = button.closest("form");
    const input = form.querySelector('input[name="quantity"]');
    const currentValue = parseInt(input.value) || 1;
    const newValue = Math.max(1, currentValue + change); // Ensure minimum value is 1

    // Update input value
    input.value = newValue;

    // Submit the form
    form.submit();
}

// Add input event listener to quantity inputs to handle direct number input
document.addEventListener("DOMContentLoaded", function () {
    const quantityInputs = document.querySelectorAll(".quantity-input");

    quantityInputs.forEach((input) => {
        input.addEventListener("change", function () {
            // Ensure minimum value is 1
            if (this.value < 1) {
                this.value = 1;
            }
            // Submit the form when input changes
            this.closest("form").submit();
        });

        // Prevent form submission on Enter key
        input.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                this.blur(); // This will trigger the change event
            }
        });
    });
});
