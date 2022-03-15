<?php
  session_start();
	include './plugins.php';
  include './weatherapi.php';
?>

<!-- Start of Container -->
<section class="vh-100 h-auto bg-primary">
  <div class="container-fluid py-5 h-auto bg-primary">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-4">
        <div class="card shadow-lg" style="border-radius: 2rem;">
          <div class="card-body p-5">
            <p class="display-4 text-center fw-bold pb-5">Weather <i class="bi bi-cloud-sun text-black"></i></p>
            <h3 class="text-center mb-4">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="email" id="typeEmail" class="form-control form-control-lg" placeholder="Email"/>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePassword" class="form-control form-control-lg" placeholder="Password"/>
            </div>

            <!-- Checkbox -->
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
              <label class="form-check-label" for="flexCheckChecked">
                <span>Remember Me</span>
              </label>
            </div>
            <div class="d-grid gap-2">
              <button class="btn btn-primary btn-lg" style="border-radius: 2rem;" type="submit">Login</button>
            </div>
            <hr class="my-4">
            <p class="text-center mt-5">Don't have an account?
              <span class="text-primary">Sign Up</span>
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