document.addEventListener('DOMContentLoaded', function () {
    const contact_Form = document.getElementById('contact_Form');
    const statusMessage = document.getElementById('statusMessage');
  
    contact_Form.addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent the default form submission
  
      const formData = new FormData(contact_Form);
  
      // Make an AJAX request to an external server-side script
      fetch('https://github.com/pandeyramesh677/rameshpandey.github.io/blob/main/process_form.php', {
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
  
