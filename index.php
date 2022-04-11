<?php session_start(); ?>
<html>
<head><title>Login</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
body
{
  font-family: 'Roboto', sans-serif;
  background-image: url("image1.png");
  background-size: 1600px;
}
.box
{
  border-radius: 15px;
  width: 500px;
  padding: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #222230;
  text-align: center;
  box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
}
 h1
{
  color: white;
  text-transform: uppercase;
  font-weight: 500;
  position:relative;
  bottom: 20px;
}
h2
{
  color: #c48cef;
  text-transform: uppercase;
  padding: 10px;
  font-weight: 700;
  font-size: 33px;
  border-radius: 15px;
  position: relative;
  bottom: 15px;
}
.box .name, .password
{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #e6e1e4;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: #3b4654;
  border-radius: 10px;
  transition: 0.25s;
}

input{
position:relative;
bottom:15px;
}

input::placeholder{
  color: white;
  font-weight:bold;
}

.box .name:focus, .password:focus
{
  width: 280px;
  border-color: #2ecc71;
  background-color:#39304d;
  color: white;
}
.box .button
{
  border:0;
  background:#04a2b3;
  display: block;
  margin: 20px auto;
  text-align: center;
  font-weight:bold;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 20px;
  transition: 0.25s;
  cursor: pointer;
}

</style>
</head>
<script>
function validate()
{
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  if (username == null || username == "") 
  {
     alert("Username can't be blank");
     return false;
   }
   if (password == null || password == "") 
  {
      alert("Password can't be blank");
      return false;
   }
      alert('Login successful');
}
</script>
<body>
	<form class="box" method="post" action="check_login.php">
    <h2>Students’ Industrial Training Management System</h2>
			<h1>Login</h1>
	 <input type="text" class="name" name="username" placeholder="Username">
	 <input type="password" class="password" name="password" placeholder="Password">
	 <input type="submit" class="button" value="LOG IN" onclick="validate()">
 </form>
</body>
</html>
