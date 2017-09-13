<?php
ob_start();
  @session_start();
 if (isset($_SESSION['sessionname']) and isset($_SESSION['sessionpass'])) {
 header("Location: cpanel.php");
 exit();
  }


?>
<html>
<head><title>login !!</title>
 <style>

     *,
*:before,
*:after {
   box-sizing: border-box;
}
form {
  border: 1px solid #c6c7cc;
  border-radius: 5px;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  overflow: hidden;
  width: 240px;
}
fieldset {
  border: 0;
  margin: 0;
  padding: 0;
}
input {
  border-radius: 5px;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  margin: 0;
}
.account-info {
  padding: 20px 20px 0 20px;
}
.account-info label {
  color: #395870;
  display: block;
  font-weight: bold;
  margin-bottom: 20px;
}
.account-info input {
  background: #fff;
  border: 1px solid #c6c7cc;
   box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
  color: #636466;
  padding: 6px;
  margin-top: 6px;
  width: 100%;
}
.account-action {
  background: #f0f0f2;
  border-top: 1px solid #c6c7cc;
  padding: 20px;
}
.account-action .btn {
  background: linear-gradient(#49708f, #293f50);
  border: 0;
  color: #fff;
  cursor: pointer;
  font-weight: bold;
  float: left;
  padding: 8px 16px;
}
.account-action label {
  color: #7c7c80;
  font-size: 12px;
  float: left;
  margin: 10px 0 0 20px;
}


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
  </style>

</head>

<body background="gg.jpg" >   <br> <br> <br> <br>   <center>





 <form  action="ok.php" method='post'> <fieldset class="account-info">
<input type='text' name='username'  placeholder="User name" />   <br>
 <input type='password' name='userpass' placeholder="Password"/>  </fieldset>
        <br>
<input height='50' width='50'type=image src=login.png alt="Submit feedback">
    <label for="remember" class="pure-checkbox">
<input id="remember" type="checkbox"> Remember me</font></label> <br>
 </form></body></html>
 <br> <br>  <hr>
  <?php

$con=mysql_connect("localhost","root","rootroot") or die (mysql_error());
$sel=mysql_select_db("admin",$con)or die(mysql_error());


$a=addslashes(strip_tags($_POST['username']));
$e=($_POST['email']);
$b=addslashes(strip_tags($_POST['userpass']));
$c=addslashes(strip_tags($_POST['userpassa']));
$ad=addslashes(strip_tags($_POST['ipadd']));

$time =@date("d.m.Y");
$da=$_POST['date'];

echo"<h1>"."<center>";
if (isset($_POST['do']) && $_POST['do'] == 'send'){
if($a=='' or $e=='' or $b=='' or $c=='' ){
echo "(أكملّ الحقول)";
}else if(strlen($a)<10){
echo " الاسم قصير جداً";
}


else if ($b==$c){
$ins= mysql_query("
   INSERT INTO user1
(username,email,userpass,userpassa,date,ipadd)
VALUES
('$a','$e','$b','$c','$da','$ad')
");

echo "تم التسجيل بنجاح ";
echo '<meta http-equiv="refresh" content="3; url=login1.php">';
} else {
echo "كلمة المرور ليست متطابقة";
echo '<meta http-equiv="refresh" content="3; url=login1.php">';
}
}echo"</h1>";



  ob_end_flush();
  ?>
<html >
<body background="">


<form action="login1.php"method="post">   <fieldset class="account-info">
<label for="name"></label>
<input type="text" name="username" placeholder="User name"/>
<label for="email"></label>
<input type="email" name="email" placeholder="Email"/>
<label for="pass"></label>
<input type="password" name="userpass"  placeholder="Password"/>
<label for="pass"></label>
<input type="password" name="userpassa"  placeholder="Password again"/> </fieldset>
 <br>
<input height='80' width='160'type=image src=signup.png alt="Submit feedback">
<input type="hidden" name="date" value="<?php echo $time; ?>"/>
<input type="hidden" name="ipadd" value="<?php echo @$_SERVER['SERVER_ADDR']?>"/>
<input type="hidden" name="do" value="send"/>
</form>  </center>


</body>
</html>
