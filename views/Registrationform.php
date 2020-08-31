<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('classes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="resources/logo/onlinelogomaker-082520-1347-5475.png">
  <!-- Styles -->
  <link rel="stylesheet" href="css/main.css">
</head>

<body onload='document.registrationform.email.focus()'>
  <!-- Include Nav -->
  <nav>
    <?php include 'partials/navigation.php' ?>
  </nav>

  <!-- Main Content Start -->
  <div class="content-wrapper">

    <!-- Hero Container Start -->
    <div class="hero-registration-container">
      <h1 class="grey-heading">Registration</h1>
    </div>
    <!-- Hero Container End -->

    <div class="registration-container">
      <form action="" id="registration-form" method=POST name="registrationform">
        <div class="form-group">
          <label for="id">SA ID</label>
          <input type="text" id="sa_id" name="sa_id" required>
        </div>
        <div class="form-group">
          <label for="name">Name & Surname</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="cell">Cell</label>
          <input type="text" id="cell" name="cell" required>
        </div>
        <div class="form-group">
          <button>Cancel</button>
          <input type="submit" id="register" name="create" value="Submit" onclick="validateEmail(document.registrationform.email)">
        </div>
      </form>
    </div>

  </div>
  <!-- Main Content End -->

  <!-- Include Footer -->
  <footer>
    <?php include 'partials/footer.php' ?>
  </footer>
  <!-- JS AJAX -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- Sweet Alert 2 for JS Alerts -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- JS -->
  <script src="js/script.js"></script>
  <script type="text/javascript">
    $(function() {
      // User clicks on submit
      $('#register').click(function(e) {

        var valid = this.form.checkValidity();

        if (valid) {
          var sa_id = $('#sa_id').val();
          var name = $('#name').val();
          var email = $('#email').val();
          var cell = $('#cell').val();


          // e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'classes/dbProcess.php',
            data: {
              sa_id: sa_id,
              name: name,
              email: email,
              cell: cell
            },
            success: function(data) {
              Swal.fire({
                'title': 'successful',
                'text': data,
                'type': 'success'
              })
            },
            error: function(data) {
              Swal.fire({
                'title': 'Errors',
                'text': 'There were errors while saving the data.',
                'type': 'error'
              })
            }
          });
        }
      });
    });
  </script>
</body>

</html>