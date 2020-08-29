<?php

namespace ITEC301_CA_WarthogExpressLiner\views;

use ITEC301_CA_WarthogExpressLiner\functions\validate;

if (!empty($_POST["registration"])) {
  $sa_id = filter_var($_POST["sa_id"], FILTER_SANITIZE_STRING);
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
  $cell = filter_var($_POST["cell"], FILTER_SANITIZE_STRING);
  require_once("functions/validate.php");
  // Form validation
  // Object
  $validate = new Validate();
  $errorMessage = $validate->validateUser($sa_id, $name, $email, $cell);
  // No errors
  if (empty($errorMessage)) {
    // Does the user exist
    $userCount = $validate->doesMemberExist($sa_id, $email);
    // User does not exist
    if ($userCount == 0) {
      $insert_id = $validate->insertUser($sa_id, $name, $email, $cell);
      if (!empty($insert_id)) {
        // All form data has been submitted
        header("Location: views/partials/registered.php");
      }
    } else {
      // User exists
      $errorMessage[] = "User already exists.";
    }
  }
}
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

<body>
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
      <form action="" id="registration-form" method="post" name="registrationform">
        <?php
        if (!empty($errorMessage) && is_array($errorMessage)) {
        ?>
          <div class="error-message">
            <?php
            foreach ($errorMessage as $message) {
              echo $message . "<br/>";
            }
            ?>
          </div>
        <?php } ?>
        <div class="form-group">
          <label for="id">SA ID</label>
          <input type="text" id="sa_id" name="sa_id" value="<?php if (isset($_POST['sa_id'])) echo $_POST['sa_id']; ?>" required>
        </div>
        <div class="form-group">
          <label for="name">Name & Surname</label>
          <input type="text" id="name" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
        </div>
        <div class="form-group">
          <label for="cell">Cell</label>
          <input type="text" id="cell" name="cell" value="<?php if (isset($_POST['cell'])) echo $_POST['cell']; ?>" required>
        </div>
        <div class="form-group">
          <button>Cancel</button>
          <button type="submit" name="register_user">Submit</button>
        </div>
      </form>
    </div>

  </div>
  <!-- Main Content End -->

  <!-- Include Footer -->
  <footer>
    <?php include 'partials/footer.php' ?>
  </footer>
</body>

</html>