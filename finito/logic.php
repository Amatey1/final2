<?php
 
require_once('connector.php');
session_start(); 

 if(isset($_POST['login']))
  {

  
   if(empty($_POST['standarduser']) Or empty($_POST['userpass']))
    {
        header("location:Form.php?Empty=Kindly enter login details");
 
    }
    else
    {
    	$query="SELECT * FROM `logincreds` WHERE compid='".$_POST['standarduser']."' and password ='".$_POST['userpass']."' and usercat='".$_POST['typeofuser']."'";
    	 $result = mysqli_query($db_conn,$query);

    	 if(mysqli_fetch_assoc($result))
    	 {
    	 	$_SESSION['User']=$_POST['standarduser'];

	    	if($_POST['typeofuser']=="user")
	    	{
	     	 header("location:userpanel.php");
	        }
	    	else if($_POST['typeofuser']=="logger"){
	    	  header("location:logger.php");
	    	}
	    	else if($_POST['typeofuser']=="admin"){
	    	  header("location:administratorpanel.php");
	    	}
    	 }
    	 else 
    	 {
    	 	header("location:Form.php?Invalid= Kindly enter the right authentication details ");
    	 }

    }



   }
?>
