<!-- The Modal Edit User-->
  <div class="modal fade" id="updateModal<?=$rowUsers['userID']?>">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit User</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="./editUserQuery.php" method="POST">
            <label for="">LAST NAME:</label>
            <input type="hidden" name="userID" value="<?=$rowUsers['userID']?>"/>
            <input type="text" name="Lname" value="<?=$rowUsers['Lname']?>" required> <br><br>

            <label for="">FIRST NAME:</label>
            <input type="text" name="Fname" value="<?=$rowUsers['Fname']?>" required> <br><br>

            <label for="">MIDDLE NAME:</label>
            <input type="text" name="Mname" value="<?=$rowUsers['Mname']?>" required> <br><br>

            <label for="">USERNAME:</label>
            <input type="text" name="username" value="<?=$rowUsers['username']?>" required> <br><br>

            <label for="">PASSWORD:</label>
            <input type="password" name="password" value="<?=$rowUsers['password']?>" required> <br><br>

            <label for="">USER TYPE:</label>
            <select name="Type" required>
              <option value="<?=$rowUsers['Type']?>"><?=$rowUsers['Type']?></option>
              <option value="ADMIN">ADMIN</option>
              <option value="USER">USER</option>
            </select>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">UPDATE</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </form>
        </div>

      </div>
    </div>
  </div>