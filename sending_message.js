document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.getElementById('contactForm');
    const statusMessage = document.getElementById('statusMessage');
  
    contactForm.addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent the default form submission
  
      const formData = new FormData(contactForm);
  
      // Make an AJAX request to an external server-side script
      fetch('https://example.com/process-form.php', {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (response.ok) {
          return response.text(); // If the response is OK, return the response text
        } else {
          throw new Error('Failed to send message'); // If the response is not OK, throw an error
        }
      })
      .then(data => {
        // Display success message to the user
        statusMessage.textContent = 'Your message was sent successfully!';
      })
      .catch(error => {
        // Display error message to the user
        statusMessage.textContent = 'Failed to send message. Please try again later.';
      });
    });
  });
  