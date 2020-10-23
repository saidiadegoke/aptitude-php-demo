<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>