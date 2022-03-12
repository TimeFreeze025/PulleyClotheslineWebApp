<?php
  session_start();
  include '../plugins.php';
  include '../config/dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN DASHBOARD</title>
</head>
<body>
  <!-- Side Navbar -->
  <div id="sideNav">
    <div class="navLinks">
      <hr>
      <p class="navLink"><span><a href="#"><i class="fa fa-home">Dashboard</i></a></span></p>
      <hr>
      <p class="navLink"><span><a href="#"><i class="fa fa-users">Users</i></a></span></p>
      <hr>
      <p class="navLink"><span><a href="#"><i class="fa fa-file">Reports</i></a></span></p>
      <hr>
      <p class="navLink"><span><a href="#"><i class="fa fa-gear">Settings</i></a></span></p>
      <hr>
    </div>
  </div>
  <!-- container -->
  <div class="myContainer container-fluid">
    <h1>ADMIN DASHBOARD</h1>
    <p>Welcome Juan G. Dela Cruz</p>
    <hr class="admin-hr">


<!-- Graph -->
    <canvas id="myChart" style="width:100%;max-width:600px; display:inline-block; vertical-align:top;"></canvas>
    <script>
      var xValues = [50,60,70,80,90,100,110,120,130,140,150];
      var yValues = [7,8,8,9,9,9,10,11,14,14,15];

      new Chart("myChart", {
        type: "line",
        data: {
          labels: xValues,
          datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.1)",
            data: yValues
          }]
        },
        options: {
          legend: {display: false},
          scales: {
            yAxes: [{ticks: {min: 6, max:16}}],
          }
        }
      });
    </script>

    <canvas id="myPie" style="width:100%;max-width:600px; display:inline-block; vertical-align:top;"></canvas>

    <script>
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];

    new Chart("myPie", {
      type: "doughnut",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "World Wide Wine Production 2018"
        }
      }
    });
    </script>
<!-- end of script -->

    <hr class="admin-hr">
    <div id="users">
      <h3>LIST OF USERS</h3>
      <p><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-plus"></i></button></p>
      <?php
        if(isset($_SESSION['message'])) {
          echo "
            <div class='col-md-6'>
              <p class='alert alert-success'>".$_SESSION['message']."</p>
            </div>
          ";
          unset($_SESSION['message']);
        }
      ?>
      <table class="table table-bordered table-hover">
        <tr>
          <th>LAST NAME</th>
          <th>FIRST NAME</th>
          <th>MIDDLE NAME</th>
          <th>USERNAME</th>
          <th>PASSWORD</th>
          <th>USER TYPE</th>
          <th colspan="2">ACTION</th>
        </tr>
        <?php
          $sqlLoadUsers = "SELECT * FROM users";
          $result = $conn->query($sqlLoadUsers);
          if($result->num_rows > 0){
            while($rowUsers = $result->fetch_assoc()){
        ?>
        <tr>
          <td><?=$rowUsers['Lname']?></td>
          <td><?=$rowUsers['Fname']?></td>
          <td><?=$rowUsers['Mname']?></td>
          <td><?=$rowUsers['username']?></td>
          <td>*****</td>
          <td><?=$rowUsers['Type']?></td>
          <td><a href="" data-bs-toggle="modal" data-bs-target="#updateModal<?=$rowUsers['userID']?>"><i class="fa fa-pencil alert-warning"></i></a></td>
          <td><a href="deleteUser.php/?userID=<?=$rowUsers['userID']?>"><i class="fa fa-trash alert-danger"></i></a></td>
        </tr>
        <?php
              include './updateUser.php';
            }
          }
        ?>
      </table>
    </div>
  </div>

  <!-- The Modal Add User-->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="../config/addUser.php" method="post">
            <label for="">LAST NAME:</label>
            <input type="text" name="Lname" maxlength="100" required> <br><br>

            <label for="">FIRST NAME:</label>
            <input type="text" name="Fname" maxlength="100" required> <br><br>

            <label for="">MIDDLE NAME:</label>
            <input type="text" name="Mname" maxlength="100" required> <br><br>

            <label for="">USERNAME:</label>
            <input type="text" name="username" maxlength="100" required> <br><br>

            <label for="">PASSWORD:</label>
            <input type="password" name="password" maxlength="100" required> <br><br>

            <label for="">USER TYPE:</label>
            <select name="Type" required>
              <option value="">...</option>
              <option value="ADMIN">ADMIN</option>
              <option value="USER">USER</option>
            </select>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">SAVE</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </form>
        </div>

      </div>
    </div>
  </div>
</body>
</html>