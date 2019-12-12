<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/bc2i-64.ico">

    <title>Register | BC2I</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link href="assets/css/register.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alatsi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">

    <script src="assets/js/register.js"></script>
  </head>

  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <img class="img-icon" src="assets/icons/bc2i-64.ico" alt="img-bc2i">&nbsp
            <a style="font-family: 'Play', sans-serif;" class="navbar-brand p-1" href="index.php">BC2I</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Register
                      <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

    
    <div class="container">
    <form class="form-register" action="register-user.php" method="POST" >
      <div class="text-center mb-4">
        <img class="mb-4" src="assets/icons/secure.png" alt="logo" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal register-title">REGISTER</h1>
        <?php if(isset($_GET['email'])){?>
    <div class="message">
      <span id="msg" class="text-center text-danger font-bold">Email already exists!</span>
    </div>
    <?php } ?>
      </div>
      <div class="row">
        <div class="col">
      <div class="form-label-group">
          <input type="text" id="fname" name="name" class="form-control" placeholder="First Name" required autofocus>
          <label for="fname">First Name*</label>
      </div>
    </div>
    <div class="col">
        <div class="form-label-group">
            <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required autofocus>
            <label for="lname">Last Name*</label>
        </div>
    </div>
    </div>

      <div class="form-label-group pt-0">
        <input type="email" id="inputEmail" class="form-control form-custom username" name="uemail" placeholder="Email address"  required autofocus>
        <label for="inputEmail">Email address*</label>
      </div>

      <div class="form-label-group">
          <input type="tel" id="inputPhone" class="form-control phone" name="phone" placeholder="Phone Number" autofocus>
          <label for="inputPhone">Phone Number*</label>
        </div>


      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control password" name="password" placeholder="Password"  required>
        <label for="inputPassword">Password*</label>
      </div>

      <div class="form-label-group">
          <input type="password" id="conPassword" class="form-control password" name="conpassword" placeholder="Password"  required>
          <label for="conPassword">Confirm Password*</label>
      </div>
      <span id="message"> </span>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block submit-text" type="submit">SUBMIT</button>
      <div class="pb-2 pt-0">
        <span class="font-italic">* Mandatory Fields</span><br/>
    </div>
      <p class="pt-2 mt-3 mb-3">Already Registered?<strong><a href="login.php">Login Here</a></strong></p>
    </form>
  </div>
    
    <!-- <footer class="bg-dark" id="footer">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; BC2I 2019</p>
        </div>
        <!-- end of Footer container -->
      </footer> -->

      
      
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
