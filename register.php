<?php require "header.php"; ?>
<?php require "config.php"; ?>
<?php 

if(isset($_SESSION['username'])) {
    echo "<script>window.location.href=".APPURL." </script>";
}

if(isset($_POST['submit'])) {
    if(empty($_POST['username']) OR empty($_POST['phone_number']) OR empty($_POST['password'])){
      echo "<script>alert('one or more input are empty')</script>";
    } else{
      $username = $_POST['username'];
      $phone_number = $_POST['phone_number']; 
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  
      // Prepare the SQL statement
      $insert = $conn->prepare("INSERT INTO users (username, phone_number, mypassword) VALUES (:username, :phone_number, :mypassword)");

  
      // Execute the statement
      $insert->execute([
        "username" => $username,
        "phone_number" => $phone_number,
        "mypassword" => $password,
      ]);
      header("location: login.php");
    }
  }
?>
   
   <div class="hero-wrap js-fullheight" style="background-image: url('images/room-1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
            <!-- <h2 class="subheading">Welcome to Vacation Rental</h2>
            <h1 class="mb-4">Rent an appartment for your vacation</h1>
            <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row justify-content-middle" style="margin-left: 397px;">
                <div class="col-md-6 mt-5">
                        <form action="register.php" method="POST" class="appointment-form" style="margin-top: -568px;">
                            <h3 class="mb-3">Register</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                </div>
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
                                        <input type="submit" name="submit" value="Register" class="btn btn-primary py-3 px-4">
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php require "footer.php" ?>