$(document).ready(function() {
    $('form').submit(function(event) {
      event.preventDefault(); // Prevent default form submission
  
      // Get the form data
      var formData = {
        'title': $('input[name=title]').val(),
        'description': $('textarea[name=description]').val()
      };
  
      // Send the form data to the server
      $.ajax({
        type: 'POST',
        url: 'submit.php',
        data: formData,
        dataType: 'json',
        encode: true
      })
      .done(function(data) {
        // Display a success message
        $('#success-message').html(data.message);
  
        // Clear the form fields
        $('input[name=title]').val('');
        $('textarea[name=description]').val('');
      });
    });
  });
  