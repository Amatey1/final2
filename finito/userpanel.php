<!DOCTYPE html>
<?php
$Assignee = '';
$IncidentId = 0 ;
$Incident_urgency = '';
$Incident_notes = '';
$Incident_status = '';
$Incident_details = '';

Include 'connector.php'; 
 session_start();
 $edit_record= false;
 if(isset($_SESSION['User']))
   {
   echo 'Welcome       '.$_SESSION['User'].'<br/>';
   echo '<a href="endit.php?logout">Logout</a>';

    if(isset($_GET['edit'])){
        $IncidentId= $_GET['edit'];
        $edit_record= true;

        $reply =mysqli_query($db_conn,"SELECT * FROM incidents WHERE IncidentId = '".$_GET['edit']."' and Assignee = '{$_SESSION['User']}' ");
        $answer=mysqli_fetch_array($reply);
        $Assignee = $answer['Assignee'];
        $IncidentId = $answer['IncidentId'];
        $Incident_urgency = $answer['Incident_urgency'];
        $Incident_notes = $answer['Incident_notes'];
        $Incident_status = $answer['Incident_status'];
        $Incident_details = $answer['Incident_details'];
    }

      if(isset($_POST['amend'])){
        $IncidentId= $_POST['IncidentId'];
        $Incident_details= $_POST['Incident_details'];
        $Incident_urgency= $_POST['$Incident_urgency'];
        $Incident_notes= $_POST['Incident_notes'];    
        $Incident_status=  $_POST['Incident_status'];


        mysqli_query($db_conn,"UPDATE incidents SET Incident_status = '$Incident_status' , Incident_notes= '$Incident_notes' WHERE IncidentId= '$IncidentId' ");

        header('location:userpanel.php');
      }

      $retriever = mysqli_query($db_conn," SELECT * FROM incidents WHERE Assignee = '{$_SESSION['User']}' ");
      

   }
   else
   {
    header("location:Form.php");
   }

?>
<html>
<link rel="stylesheet" type="text/css" href="cssfiles/adminstyle.css">
<head>
  <title>Admin Dashboard</title> 
</head>
<body>
<a class="Edit_button" href="Userprofiledit.php?">Edit profile</a> 
  <table>
    <thead>
      <tr>
        <th>Incident Id</th>
        <th>Incident details</th>
        <th>incident urgency</th>
        <th>notes</th>
        <th>Incident_status</th>

        <th colspan="6">Action</th>        
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($retriever)) {?>
          <tr>
            <td><?php echo $row['IncidentId'];?></td>
            <td><?php echo $row['Incident_details'];?></td>
            <td><?php echo $row['Incident_urgency'];?></td>
            <td><?php echo $row['Incident_notes'];?></td>
            <td><?php echo $row['Incident_status'];?></td>
            <td>
              <a class="Edit_button" href="userpanel.php?edit=<?php echo $row['IncidentId']; ?>">Edit</a>
            </td>
      </tr>  
      <?php }?>
    </tbody>  
  </table>
  <form method="post" action=userpanel.php >
    <div class="input-group">
      <label>IncidentId</label>
      <input type="text" name="IncidentId" placeholder="enter the username"value="<?php echo $IncidentId; ?>">
    </div>
    <div class="input-group">
      <label>Incident details</label>
      <textarea type="text" rows="4" cols="50"  name="Incident_details" value="<?php echo $Incident_details; ?>"><?php echo $Incident_details; ?></textarea>
    </div>
     <div class="input-group">
      <label>Incident Urgency</label>
      <input type="text" name="Incident_urgency" placeholder="enter the new username" value="<?php echo $Incident_urgency; ?>">
    </div>
     <div class="input-group">
      <label>Incident notes</label>
      <textarea type="text" rows="4" cols="50"  name="Incident_notes" required value="<?php echo $Incident_notes; ?>"><?php echo $Incident_notes; ?></textarea>
    </div>
     <div class="input-group">
      <label>Incident status </label>
      <input type="text" name="Incident_status" placeholder="If complete enter the word : Complete else leave as is  " value="<?php echo $Incident_status; ?>">
    </div>
    
    <?php if($edit_record == false):  ?>
        <button type="Submit" name="amend" class="btn">Amend</button>
    <?php else:  ?>  
      <button type="Submit" name="amend" class="btn">Amend</button>
    <?php endif ?> 
    <div class="input-groups">
    </div>
  </form>

</body>
</html>



    
