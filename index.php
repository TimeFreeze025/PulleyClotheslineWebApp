<?php
  session_start();
	include './config/plugins.php';
  //include './signup.php';

  if(isset($_COOKIE['user'])){
    header("Location:./home.php");
  }
?>

<!-- Start of Container -->
<section class="vh-100 h-auto bg-primary">
  <div class="container-fluid py-5 h-auto bg-primary">
    <div class="row d-flex justify-content-center ">
      <div class="col-md-4 col-sm-4 text-center">
        <div class="card shadow-lg" style="border-radius: 1rem;">
          <div class="card-body px-3 py-4">
            <p class="display-4 fw-bold pb-3">Weather <i class="bi bi-cloud-sun text-black"></i></p>
            <h3 class="mb-4 text-primary">Sign in</h3>
            <form action="./config/loginAuthentication.php" method="POST">
              <div class="form-outline mb-4">
                <input type="text" name="loginUsername" class="form-control form-control-lg" placeholder="Username" required/>
              </div>
              <div class="form-outline mb-4">
                <input type="password" name="loginPassword" class="form-control form-control-lg" placeholder="Password" required/>
              </div>
              <div class="d-grid gap-2 mb-3">
                <button type="submit" name="submit" class="btn btn-primary btn-lg" style="border-radius: 2rem;">Login</button>
              </div>
            </form>
            <?php
              if(isset($_SESSION['error-message'])){
                echo "<p class = 'alert alert-danger py-2'>".$_SESSION['error-message']."</p>";
                unset($_SESSION['error-message']);
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End of Container -->

<?php
  //session_destroy();
?>