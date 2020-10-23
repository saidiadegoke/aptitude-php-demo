<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Aptitude Test App</title>
  </head>
  <body>
    <div class="container">

      

      <div class="row">
        <form class="form-wrapper" action="register_process.php" method="post">
          <h4>Register form</h4>
          
          <?php if(!empty($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
          <?php endif ?>

  <div class="form-group">
    <label for="username">Name</label>
    <input type="text" class="form-control" id="username" placeholder="Enter name" name="name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="phone" placeholder="*************" name="password">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="phone" class="form-control" id="phone" placeholder="0808080808" name="phone">
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender">
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Register</button>
  <div>
    <p><a href="login.php">Click here</a> if you already have an account</p>
  </div>
</form>
      </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js" ></script>
    <script src="js/umd/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>