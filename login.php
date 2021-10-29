<html> 
  <script>
    function emptyFields(){
      var inemail = document.login.uemail.value;
      var inpass = document.login.upassword.value;

      if(inemail == '')
      {
        alert("please enter your email");
        return false;
      }
      else if(inpass == ''){
        alert("please enter your password");
        return false;
      }
      else{
      return true;
    }}

    </script>
  <title>LOGIN</title>

  <form name= "login" method="post" onsubmit="return emptyFields()">
    <link rel="stylesheet" href="web.css">
    <div class="container">
        <h1 style="color:rgb(160, 60, 60);">WELCOME</h1>
        
        <label>UserName</label>
        <br/>
        <input type="text" placeholder="Enter E-mail" name="uemail" >
        <br/>
        <label>password</label>
        <br/>
        <input type="password" placeholder="Enter password" name="upassword">
        <br/>
        <button type="submit" name="usubmit">LOGIN</button>
        <button type="button" style="background: teal;" name="register" onclick="location.href='https://localhost/firstProject/signUp.php#'">SIGNUP</button>
    
    </div>
</form>
<?php
session_start();
if(isset($_POST['usubmit']))
{
 $sq = mysqli_connect('localhost','root','') or die(mysqli_error($sq));
 mysqli_select_db($sq,'registration') or die(mysqli_error($sq));
 $email=$_POST['uemail'];
 $pwd=$_POST['upassword'];
 $pwd=md5($pwd);
//  echo $pwd;
 
 if($email!=''&& $pwd!='')
 {
   $query=mysqli_query($sq,"select * from user where email='".$email."' and password='".$pwd."'") ;
   $res=mysqli_fetch_row($query);
   $_SESSION['name'] = $res[2];
   if($res)
   {
    header('location:welcome.php');
   }
   else
   {
    echo '<script>alert("the username or the password is incorrect")</script>';
   }
}}


?>
</html>

