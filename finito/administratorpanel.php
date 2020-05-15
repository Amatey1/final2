<!DOCTYPE html>
<?php
$compid="";
$password="";
$usercat="";

Include 'connector.php'; 
 session_start();
 $edit_record= false;
 if(isset($_SESSION['User']))
   {
   echo 'Welcome       '.$_SESSION['User'].'<br/>';
   echo '<a href="endit.php?logout">Logout</a>';

    if(isset($_GET['edit'])){
        $compid = $_GET['edit'];
        $edit_record= true;

        $reply =mysqli_query($db_conn,"SELECT * FROM logincreds WHERE compid = '".$_GET['edit']."' ");
        $answer=mysqli_fetch_array($reply);
        $compid = $answer['compid'];
        $password = $answer['password'];
        $usercat = $answer['usercat'];


      }
   if(isset($_POST['save']))
    {
      $compid = $_POST['compid'];
      $password = $_POST['userpass'];
      $usercat = $_POST['typeofuser'];
      

      $sql= "INSERT INTO logincreds(compid,password,usercat) "
             ."VALUES ('$compid','$password','$usercat')";

      $result = mysqli_query($db_conn,$sql);


      if($result){
        echo '<script type="text/javascript">';
      echo ' alert("Incident Created, create another or logout")';
      echo '</script>';
        header("location: administratorpanel.php");
         }
      
      }
      if(isset($_POST['amend'])){
        $compid= $_POST['compid'];
        $password= $_POST['userpass'];
        $usercat=  $_POST['typeofuser'];

        mysqli_query($db_conn,"UPDATE logincreds SET password = '$password' , usercat= '$usercat' WHERE compid = '$compid' ");

        header('location:administratorpanel.php');
      }
      if(isset($_GET['del'])){
        $compid = $_GET['del'];
        $reply =mysqli_query($db_conn,"DELETE FROM logincreds WHERE compid = '".$_GET['del']."' ");
        header('location:administratorpanel.php');
      }

      $retriever = mysqli_query($db_conn,"SELECT * FROM logincreds");
      

   }
   else
   {
    header("location:Form.php");
   }
?>

<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="cssfiles/adminstyle.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="title icon" href="images/title-img.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="cssfiles/style.css">
  <title>Admin Dashboard</title> 
</head>
<body>
  <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-400 col-md-100 mb-9 mx-auto ">
            <div class="row pt-md-5 mt-md-3 mb-5">
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-wrench fa-3x text-warning" aria-hidden="true"></i>
                      <div class="text-right text-secondary">
                        <h5>Total number of incidents</h5>
                        <?php

                          $queryone = mysqli_query($db_conn,"SELECT IncidentId FROM incidents ORDER BY IncidentId ");
                          $row= mysqli_num_rows($queryone);
                          echo '<h3>'.$row.'</h3>';

                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-thumbs-up  fa-3x text-success" aria-hidden="true"></i>
                      <div class="text-right text-secondary">
                        <h5>Resolved Incidents</h5>
                        <?php

                          $querytwo = mysqli_query($db_conn,"SELECT * FROM `incidents` WHERE `Incident_status`= 'Complete' ORDER BY IncidentId ");
                          $row2= mysqli_num_rows($querytwo);
                          echo '<h3>'.$row2.'</h3>';

                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-thumbs-down  fa-3x text-warning" aria-hidden="true"></i>
                      <div class="text-right text-secondary">
                        <h5>Unresolved Incidents</h5>
                         <?php

                          $querythree = mysqli_query($db_conn,"SELECT * FROM `incidents` WHERE `Incident_status`= 'Pending' ORDER BY IncidentId ");
                          $row3= mysqli_num_rows($querythree);
                          echo '<h3>'.$row3.'</h3>';

                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-exclamation-triangle fa-3x text-danger"></i>
                      <div class="text-right text-secondary">
                        <h5>Unresolved Critical</h5>
                        <?php

                          $querythree = mysqli_query($db_conn,"SELECT * FROM `incidents` WHERE `Incident_urgency`= 'Critical' and `Incident_status`= 'Pending'  ORDER BY IncidentId ");
                          $row3= mysqli_num_rows($querythree);
                          echo '<h3>'.$row3.'</h3>';

                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of cards -->
  <table>
    <thead>
      <tr>
        <th>compid</th>
        <th>password</th>
        <th>usercategory</th>
        <th colspan="4">Action</th>        
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($retriever)) {?>
          <tr>
            <td><?php echo $row['compid'];?></td>
            <td><?php echo $row['password'];?></td>
            <td><?php echo $row['usercat'];?></td>
            <td>
              <a class="Edit_button" href="administratorpanel.php?edit=<?php echo $row['compid']; ?>">Edit</a>
            </td>
            <td>
              <a class= "delete_button" href="administratorpanel.php?del=<?php echo $row['compid']; ?>">Delete</a>
        </td>
      </tr>  
      <?php }?>
    </tbody>  
  </table>
  <form method="post" action=administratorpanel.php >
    <div class="input-group">
      <label>compid</label>
      <input type="text" name="compid" placeholder="enter the username"value="<?php echo $compid; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="text" name="userpass" placeholder="enter the new username" value="<?php echo $password; ?>">
    </div>
    <div class="input-group">
      select user type:<select name="typeofuser" value="<?php echo $usercat; ?>"> 
          <option value="admin">admin</option>
          <option value="user">user</option>
          <option value="logger">logger</option>       
        </select>
    </div>  
    <?php if($edit_record == false):  ?>
        <button type="Submit" name="save" class="btn">Save</button>
    <?php else:  ?>  
      <button type="Submit" name="amend" class="btn">Amend</button>
    <?php endif ?> 
    <div class="input-groups">
    </div>
  </form>

</body>
</html>