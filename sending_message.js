// JavaScript code to fetch data from test.php
document.addEventListener('DOMContentLoaded', function () {
    fetch('test.php')
    .then(response => {
        if (response.ok) {
            return response.text(); // If the response is OK, return the response text
        } else {
            throw new Error('Failed to fetch data'); // If the response is not OK, throw an error
        }
    })
    .then(data => {
        console.log(data); // Log the fetched data to the console
    })
    .catch(error => {
        console.error(error); // Log any errors to the console
    });
});
