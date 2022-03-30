
<table class="table table-hover table-striped mt-3 text-center table-border">
    <thead>
      <tr>
        <th class="col-md-4 text-primary">Time</th>
        <th class="col-md-4 text-primary">Command</th>
        <th class="col-md-4 text-primary" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      $arr_military_time = array();
      $i = 0;
      include '../config/dbcon.php';
      $sqlLoadCommands = "SELECT * FROM commands WHERE username = '{$_COOKIE['user']}' ORDER BY timeCommand";
      $result = $conn->query($sqlLoadCommands);
      if($result->num_rows > 0){
        while($rowCommands = $result->fetch_assoc()){
          $time = date("g:i A",strtotime($rowCommands['timeCommand']));
          $arr_military_time[$i] = $rowCommands['timeCommand'];
    ?>
    <tbody>
      <tr>
        <td><?=$time?></td>
        <td><?=$rowCommands['userCommand']?></td> 
        <td><a href="" data-bs-toggle="modal" data-bs-target="#editCommand<?=$rowCommands['id']?>"><i class="fa fa-pencil alert-warning bg-transparent"></i></a></td>
        <td><a href="./config/deleteCommand.php/?timeCommand=<?=$rowCommands['timeCommand']?>" onclick="confirmAction()"><i class="fa fa-trash alert-danger bg-transparent"></i></a></td>
      </tr>
    </tbody>
    <?php
          $i++;
          include "../editCommandModal.php";
        }
      }
    ?>
  </table>