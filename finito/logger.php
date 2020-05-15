<!DOCTYPE html>
<?php

Include 'connector.php'; 
 session_start();

 if(isset($_SESSION['User']))
   {
   echo 'Welcome       '.$_SESSION['User'].'<br/>';
   echo '<a href="endit.php?logout">Logout</a>';

	 if($_SERVER['REQUEST_METHOD'] == 'POST')
	  {
	    $log_id = ($_POST['log_id']);
	    $incident_details = ($_POST['incidentdetails']);
	    $incident_status = ($_POST['incident_status']);
	    $assignee = ($_POST['assignee']);
	    $incident_urgency = ($_POST['incident_urgency']);

	    $sql= "INSERT INTO incidents(loggerId,Incident_details,Incident_status,Assignee,Incident_urgency) "
	           ."VALUES ('$log_id','$incident_details','$incident_status','$assignee','$incident_urgency')";

	    $result = mysqli_query($db_conn,$sql);   

	    if($result){
	    	echo '<script type="text/javascript">';
			echo ' alert("Incident Created, create another or logout")';
			echo '</script>';
	    	header("location: logger.php");
	       }
      }

   }
   else
   {
   	header("location:Form.php");
   }


?>
<html>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="cssfiles/loggercss.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Log an incident</h1>
    <form class="form" action="logger.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>

      <input type="text" placeholder="logger Id" name="log_id" required />

      <textarea type="text" rows="4" cols="50"  name="incidentdetails" required> Enter incident Details </textarea>

      <select placeholder= "Incident status" name="incident_status"> 
          <option value="Pending">Pending</option>  
        </select>

      <input type="text" placeholder="Assignee" name="assignee" required />

       <select placeholder="Incident urgency" name="incident_urgency"> 
          <option value="Critical">Critical</option>
          <option value="Major">Major</option>  
          <option value="Minor">Minor</option>  
        </select>

      

      <input type="submit" value="assign" name="assign" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
   
	
</html>