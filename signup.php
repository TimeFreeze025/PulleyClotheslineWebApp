<?php
	include './config/plugins.php';
?>

<!-- Start of Container -->
<div class="modal" tabindex="-1" id="userSignUp">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fw-bold">Sign Up</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="./config/createUser.php" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <div class="form-outline mb-4">
                <input type="text" name="signupFname" class="form-control form-control-lg" placeholder="First Name" required/>
              </div>
            </div>
            <div class="col">
              <div class="form-outline mb-4">
                <input type="text" name="signupLname" class="form-control form-control-lg" placeholder="Last Name" required/>
              </div>
            </div>
          </div>
          <div class="form-outline mb-4">
            <input type="text" name="signupUsername" class="form-control form-control-lg" placeholder="Username" onkeypress="return blockSpecialChar(event)" required/>
          </div>
          <div class="form-outline mb-4">
            <input type="password" name="signupPassword" id="signupPassword" onkeyup='check();' onkeypress="return blockSpecialChar(event)" class="form-control form-control-lg" placeholder="Password" required/>
          </div>
          <div class="form-outline mb-4">
            <input type="password" name="signupConfirmPassword" id="signupConfirmPassword" onkeyup='check();' onkeypress="return blockSpecialChar(event)" class="form-control form-control-lg" placeholder="Confirm Password" required/>
          </div>
          <span id="errorMessage" class="text-danger"></span>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" id="submit" class="btn btn-primary text-center">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Container -->