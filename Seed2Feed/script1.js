document.getElementById('volunteer-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Collect form data
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const role = document.getElementById('role').value;

    // Corrected console.log with template literals
    console.log(`Name: ${name}, Email: ${email}, Phone: ${phone}, Role: ${role}`);

    // Show a success message
    alert('Thank you for signing up to volunteer!');
    
    // Optionally, reset the form
    this.reset();
});
