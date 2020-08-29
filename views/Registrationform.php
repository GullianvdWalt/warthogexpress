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
      <form action="" id="registration-form">
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
          <button type="submit">Submit</button>
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