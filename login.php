<?php require "header.php"; ?>
<?php require "config.php"; ?>
<?php 

if(isset($_SESSION['username'])) {
  echo "<script>window.location.href=".APPURL." </script>";
}

if(isset($_POST['submit'])) {
  if(empty($_POST['phone_number']) OR empty($_POST['password'])){
    echo "<script>alert('one or more input are empty')</script>";
  } else{
    $phone_number = $_POST['phone_number']; 
    $password = $_POST['password'];

    $login = $conn->query("SELECT * FROM users WHERE phone_number='$phone_number'");
    $login->execute();

    $fetch = $login->fetch(PDO::FETCH_ASSOC);

    if($login->rowCount() > 0)
    {
      if(password_verify($password, $fetch['mypassword'])){
        //echo "<script>alert('Logged In')</script>";
        $_SESSION['username'] = $fetch['username'];
        $_SESSION['id'] = $fetch['id'];

        header("location: ".APPURL."");
      }
      else{
        echo "<script>alert('Phone Number or Password is wrong')</script>";
      }
    } else{
      echo "<script>alert('Phone_Number or Password is wrong')</script>";
    }
  }
}
  ?>

    <div class="hero-wrap js-fullheight" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
      <div class="container">
        <div class="row justify-content-middle" style="margin-left: 397px;">
          <div class="col-md-6 mt-5">
            <form action="login.php" method = "POST" class="appointment-form" style="margin-top: -568px;">
              <h3 class="mb-3">Login</h3>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                      </div>
                </div>
                     
                <div class="col-md-12">
                  <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                      </div>
                </div>
                
              
              
                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Login" class="btn btn-primary py-3 px-4">
                                    </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<?php require "footer.php"; ?>