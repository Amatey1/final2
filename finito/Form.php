<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="cssfiles/form.css" type="text/css">
<link rel="stylesheet" href="cssfiles/loggercss.css" type="text/css">
<Title>Loginform</Title>
</head>
<body>
<form class="form" action="logic.php" method= "post">
  <table>
    <tr>
      <td>Company Id:<input type="text" name="standarduser" placeholder="enter your username"></td>
    </tr>
    <tr>
    <td>Password:<input type="password" name="userpass" placeholder="enter your password"></td>
    </tr>
    <tr>
      <td>
        Kindly choose your user type: <select name="typeofuser"> 
          <option value="admin">admin</option>
          <option value="user">user</option>
          <option value="logger">logger</option>       
        </select>
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="login" value="login"></td>
    </tr>
  </table>
</form>
</body>

</html>