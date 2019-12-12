<?php   session_start();

$myHost = "localhost";
$myUserName = "root";
$myPassword = "";
$myDataBaseName = "bc2i"; 
$con = mysqli_connect("$myHost", "$myUserName", "$myPassword", "$myDataBaseName");
if( !$con )
{ 
    include("error.html");
    // die("Connection object not created: ".mysqli_error($con));
}
$username = $_SESSION['email'];
$query="SELECT * FROM `user` WHERE `email`= '$username'";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint | BC2I</title>

    <link rel="icon" href="assets/icons/bc2i-32.png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/reg-complaint.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Google Icons
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <script src="assets/js/reg-complaint.js"></script>

</head>

<body>
<?php
      if(!isset($_SESSION['email'])) 
       {
           header("Location:login.php");  
       }
?>
    
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <img class="img-icon" src="assets/icons/bc2i-64.ico" alt="img-bc2i">&nbsp
              <a class="navbar-brand p-1" href="index.html">BC2I</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="user-index.php"><i class="fas fa-home"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php"><i class="fa fa-phone"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-sign-out-alt"></i></a>
                  </li>
                  <li>
                    <a class="nav-link" href="#"><?php echo $username;?></a>
                  </li>
                </ul>
              </div>
            </div>
            <div>
          </div>
          </nav>


          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-lock"></i>&nbsp;Logout</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <a href="logout.php" class="btn btn-primary">Yes, Logout</a>
                </div>
              </div>
            </div>
          </div>
        
        <div class="container pb-5">
          <div class="row">
              <div class="col-md-2">
              </div>
              <div class="col-md-8">
                <form method="post" action="lodgecomp.php" class="shadow p-3 mb-5 bg-white rounded needs-validation" name="comp" onsubmit="return compValidate()" novalidate>
                  <br>
                  <center><img src="assets/icons/bc2i-32.png" alt="logo"><br><br>
                  <span class="head h3">Complaint Registration Form</span></center>
                  <br>
                  <hr>
                  <div>
                    <span style="font-size: 18px;"><strong>Complaint Details</strong></span><hr>
                    <div class="form-group">
                      <label for="subject">Subject</label> 
                      <input type="text" class="form-control form-control-sm" name="subject" id="subject" placeholder="Mention subject here" required>
                      <div class="invalid-feedback">
                                Please add subject.
                          </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group pt-3">
                            <label for="date">Date of Incident</label>
                            <input type="date" name="date" class="form-control form-control-sm" id="date" required>
                            <div class="invalid-feedback">
                                Please enter a valid date.
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group pt-3">
                          <label for="time">Time of Incident</label>
                          <input type="time" name="time" class="form-control form-control-sm" id="time" required>
                          <div class="invalid-feedback">
                                Please enter a valid time.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group pt-3">
                        <label for="type">Type of crime</label>
                        <select class="custom-select" name="type" required>
                          <option value="">Select anyone</option>
                          <option value="Hacking">Hacking</option>
                          <option value="Identity-theft">Identity Theft</option>
                          <option value="Transaction-fraud">Transaction Fraud</option>
                          <option value="Piracy">Piracy</option>
                          <option value="Other">Other</option>
                        </select>
                        <div class="invalid-feedback">Please select anyone.</div>
                    </div>
                    <div class="form-group pt-3">
                      <label for="complaint">Write Complaint</label>
                      <textarea name="complaint" id="complaint" name="complaint" cols="30" rows="5" class="form-control" placeholder="Write your detailed complaint" required></textarea>
                      <div class="invalid-feedback">
                                Please write detailed complaint.
                      </div>
                    </div>
                  </div>
                  <br>
                  <div>
                    <span style="font-size: 18px;"><strong>Personal Details</strong></span>
                    <hr>
                    <div class="form-group">
                      <label for="name">Complaintant Name</label>
                      <input type="text" id="name" class="form-control form-control-sm" value="<?php echo $row['name'];?>" required disabled>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group pt-3">
                          <label for="phone-number">Phone Number</label>
                          <input type="tel" id="phone-number" class="form-control form-control-sm" value="<?php echo $row['phone'];?>" required disabled>
                          <div class="invalid-feedback">
                                Please provide a valid Phone number.
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group pt-3">
                         <label for="email">Email ID</label>
                         <input type="email" class="form-control form-control-sm" value="<?php echo $row['email'];?>" required disabled>
                         <div class="invalid-feedback">
                                Please provide a valid email.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group pt-3 mb-4">
                      <label for="address"><strong>Address</strong></label><br>
                      <label for="line1">Address Line 1</label>
                      <input type="text" id="line1" class="form-control form-control-sm" required>
                      <div class="invalid-feedback">
                                Please enter a valid address in line 1.
                      </div>
                      <label for="line2" class="pt-3">Address Line 2</label>
                      <input type="text" id="line2" class="form-control form-control-sm" required>
                      <div class="invalid-feedback">
                                Please enter a valid address in line 2.
                      </div>
                      <div class="row pt-3">
                        <div class="col">
                          <label for="city">City/Town</label>
                          <input type="text" id="city" class="form-control form-control-sm" required>
                          <div class="invalid-feedback">
                                Please provide a valid City/Town.
                          </div>
                        </div>
                        <div class="col">
                          <label for="state">State</label>
                          <input type="text" id="state" class="form-control form-control-sm" required>
                          <div class="invalid-feedback">
                                Please provide a valid State.
                          </div>
                        </div>
                      </div>  
                    </div>
                    <div class="form-group form-check pl-4 mb-3 pt-3">
                      <input type="checkbox" class="form-check-input" id="customCheck1" required>
                      <label class="form-control-label" for="customCheck1">I hereby declare that the details furnished above are true and correct to the best of my knowledge and belief and I undertake to inform <strong>BC2I</strong> of any changes therein, immediately.</label required>
                      <div class="invalid-feedback">
                      You must agree before submitting.
                      </div>
                    </div>
                    <div class="form-group pt-4">
                      <input type="submit" name="Submit" class="btn btn-primary btn-md btn-block submit" value="SUBMIT">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-2">
              </div>
          </div>
        </div>

        <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
        })();
</script>
          
        <footer class="py-5 bg-dark pt-5 mt-5">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; BC2I 2019</p>
    </div>
    <!-- end of Footer container -->
  </footer>  
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>