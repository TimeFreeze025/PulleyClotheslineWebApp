<?php
	include './config/plugins.php';
?>

<!-- Start of Container -->
<div class="modal" tabindex="-1" id="addCommand">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fw-bold">Add Schedule</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="./config/addCommand.php" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <div class="form-outline form-floating mb-4">
                <label for=""></label>
                <input type="time" name="timeCommand" id="timeCommand" class="form-control form-control-lg" required/>
                 <label for="timeCommand">Time</label>
              </div>
            </div>
          </div>
          <div class="form-floating">
            <select class="form-select" name="userCommand" id="userCommand">
              <option value="Retrieve-In">Retrieve-In</option>
              <option value="Retrieve-Out">Retrieve-Out</option>
            </select>
            <label for="userCommand">Command</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" id="submit" class="btn btn-primary text-center bi bi-plus-circle"> Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Container -->