<?php
  session_start();
	include './plugins.php';
  include './weatherapi.php';
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
                <input type="text" id="typeUsername" name="typeUsername" class="form-control form-control-lg" placeholder="Username"/>
              </div>
              <div class="form-outline mb-4">
                <input type="password" id="typePassword" name="typePassword" class="form-control form-control-lg" placeholder="Password"/>
              </div>
              <div class="d-grid gap-2 mb-3">
                <button class="btn btn-primary btn-lg" style="border-radius: 2rem;" type="submit">Login</button>
              </div>
            </form>
            <?php
            if(isset($_SESSION['message'])){
              echo "<p class = 'alert alert-danger py-2'>".$_SESSION['message']."</p>";
            }
            ?>
            <hr class="mb-4">
            <p class="mt-4">Don't have an account?
              <a href="" class="link-primary">Sign Up</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End of Container -->

<?php
session_destroy();
?>