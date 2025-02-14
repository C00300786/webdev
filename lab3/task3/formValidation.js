// Function to check if the user is older than 16
function is16(dob) {
    const today = new Date();
    const birthDate = new Date(dob);

    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDifference = today.getMonth() - birthDate.getMonth();

    // Adjust age if the birthday hasn't occurred yet this year
    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    // Prevent form submission if under 16
    if (age < 16) {
        alert('You must be older than 16 to submit the form.');
        return false; // Prevent submission
    }

    // If age is greater than or equal to 16, ask for confirmation
    return confirm('Are you sure you want to submit the form?');
}

// Attach event listener for the form submit
document.querySelector('form').addEventListener('submit', function (event) {
    const dob = document.getElementById('DateOfBirth').value;

    // Check if the date of birth field is filled
    if (!dob) {
        alert('Please enter your Date of Birth.');
        event.preventDefault(); // Prevent form submission
    }
});