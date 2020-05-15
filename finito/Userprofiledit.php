<?php
 
$compid="";
$password="";
$usercat= '';

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
        $usercat= $answer['usercat'];
      
      }

      if(isset($_POST['amend'])){
        $compid= $_POST['compid'];
        $password= $_POST['userpass'];
        $usercat= $_POST['typeofuser'];

        mysqli_query($db_conn,"UPDATE logincreds SET password = '$password' , usercat= '$usercat' WHERE compid = '$compid' ");

        header('location:Userprofiledit.php');
      }

      $retriever = mysqli_query($db_conn,"SELECT * FROM logincreds WHERE compid = '{$_SESSION['User']}'");
      

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
  <table>
    <thead>
      <tr>
        <th>compid</th>
        <th>password</th>
        <th colspan="4">Action</th>        
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($retriever)) {?>
          <tr>
            <td><?php echo $row['compid'];?></td>
            <td><?php echo $row['password'];?></td>
            <td>
              <a class="Edit_button" href="Userprofiledit.php?edit=<?php echo $row['compid']; ?>">Edit</a>
            </td>
      </tr>  
      <?php }?>
    </tbody>  
  </table>
  <form method="post" action=Userprofiledit.php >
    <div class="input-group">
      <label>compid</label>
      <input type="text" name="compid" placeholder="enter the username"value="<?php echo $compid; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="text" name="userpass" placeholder="enter the new username" value="<?php echo $password; ?>">
    </div>
    <div class="input-group">
      select user type:<select type="hidden" name="typeofuser" value="<?php echo $usercat; ?>"> 
          <option value="user">user</option>   
        </select>
    </div>  
    <?php if($edit_record == false):  ?>
        <button type="Submit" name="save" class="btn">Save</button>
    <?php else:  ?>  
      <button type="Submit" name="amend" class="btn">Amend</button>
    <?php endif ?> 
    <div class="input-groups">
    </div>
    <a class="Edit_button" href="Userpanel.php?">Return</a> 
  </form>

</body>
</html>
?>