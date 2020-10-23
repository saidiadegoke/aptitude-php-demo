<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Aptitude Test App</title>
  </head>
  <body>
    <div class="container">

      

      <div class="row">
        <form class="form-wrapper" action="login_process.php" method="post">
          <h4>Login form</h4>

          <?php if(!empty($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
          <?php endif ?>
          
  <div class="form-group">
    <label for="email">Username</label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="phone" placeholder="*************" name="password">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Login</button>
  <div>
    <p><a href="register.php">Click here</a> if you don't have an account</p>
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