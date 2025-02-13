// Function to check if the user is older than 16
function is16(dob) {
    const today = new Date();
    const birthDate = new Date(dob);
    
    // Calculate the age of the user
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDifference = today.getMonth() - birthDate.getMonth();

    // Adjust age if the birthday hasn't occurred yet this year
    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    return age >= 16;
}

// Attach an event listener to the form submit
    document.querySelector('form').addEventListener('submit', function(event) {
    // Get the Date of Birth value from the input field
    const dob = document.getElementById('DateOfBirth').value;

    // Check if the date of birth field is not empty and if the user is older than 16
    if (!dob) {
        alert('Please enter your Date of Birth.');
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Check if the user is older than 16
    if (!is16(dob)) {
        alert('You must be older than 16 to submit the form.');
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Confirm with the user before submitting the form
    const confirmSubmit = confirm("Are you sure you want to submit the form?");
    if (!confirmSubmit) {
        event.preventDefault(); // Prevent form submission if the user cancels
    }
});
