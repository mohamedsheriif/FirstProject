<html>
    <script>
      function stringContainsNumber(_string) {
        return /\d/.test(_string);
      }
      function validateform(){
        var name = document.myform.uname.value;
        var password = document.myform.upassword.value;
        var repassword = document.myform.urepassword.value;
        var email = document.myform.uemail.value;
        var atposition = email.indexOf("@");
        var dotposition = email.lastIndexOf(".");
         //logical sa7 bs lma b7otha fe ela5er msh btsht8l
        if(name == '' || stringContainsNumber(name)){
          alert('please enter avalid name');
          return false;
        }
        else if(password.length<6){
          alert("password must be longer than 6 characters");
          return false;
        }
        else if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length || email == '')
        {
          alert("please enter avalid email");
          return false;
        }
        else if(password == '' || repassword=='')
        {
          alert("missing password field");
          return false;
        }
        else if(password != repassword )
        {
          alert("please enter the same code again");
          return false;

        }
        else{
        return true;
        }
      }
    </script>
    <title>signUp</title>
    <link rel="stylesheet" href="web.css">
    <form name="myform" method="post" onsubmit="return validateform()">
    <div class="signup">
    
    <h1 style="color:rgb(160, 60, 60);">SIGNUP</h1>
    <label>UserName</label>
    <input type="text" placeholder="Enter E-mail" name="uname" >
    <label>E-mail</label>
        
        <input type="text" placeholder="Enter E-mail" name="uemail" >
        
        <label>password</label>
        
        <input type="password" placeholder="Enter password" name="upassword" >
        
        <label>re-password</label>
        <input type="password" placeholder="Enter password again" name="urepassword">
        <button type="submit" name="done">DONE</button>
        <button type="button" style="background: teal;" name="CANCEL" onclick="location.href='https://localhost/firstProject/login.php#'">BACK</button>
</div>
</form>

</html>
<?php
session_start();
if(isset($_POST['done']))
{
 $sq = mysqli_connect('localhost','root','') ;
 mysqli_select_db($sq,'registration') ;
 $uname = $_POST['uname'];
 $email = $_POST['uemail'];
 $password = $_POST['upassword'];
 $password = md5($password);
//  $repassword = $_POST['urepassword'];

 $query=mysqli_query($sq,"select * from user where email='".$email."'");
if($query->num_rows != 0)
{
    echo '<script>alert("email already exist")</script>';
}
// else if($password != $repassword)
// {
//     echo '<script>alert("password incorrect")</script>';
// }
else
{
$sql = "INSERT INTO user (email, name , password)
VALUES ('$email', '$uname',' $password')";

if (mysqli_query($sq, $sql)) {
  echo "email created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
?>