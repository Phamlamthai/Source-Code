<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.login{
			float: right;
			width: 890px;
			font-size: 20px;
			margin-top: 200px;
			}
		.header{
            height:66px;
            border:1px none solid black;
            background:pink
        }
        .header img{
            float:left
        }
        #Search{
            padding-top:10px
        }
        #Search input[type=text]{
            width:190px;
            height:30px
        }
        #Search input[type=submit]{
            height:26px;
        }
        .menu {
            height: 80px;
            
            text-align: center;
        }
            .menu img {
                position: relative;
                top: 10px;
                background-image: url(https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg)

            }
        .menu ul li{
            display:inline-table;
            text-align:center;
            list-style:none;
            color: white;
        }
        .menu ul li a{
            padding:15px;
            margin:7px;
            text-decoration:none;
            font-size:20px
        }
        .carousel-inner .item img {
		margin: auto;
	}
	.navbar-inverse{
		
	}
	.Search{
		margin-top:10px;
		float: right;
		margin-right: 125px;
	}
	body{
		background-image: url(https://i.pinimg.com/originals/2c/84/5a/2c845a66b8ad2a8aafd288bdc16cd459.jpg);
	}
	</style>
	
</head>
<body>
<div>
		<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>	
				</button>	
			</div>

			<div class="collapse navbar-collapse" id="MyNavbar"> 
				<ul class="nav navbar-nav">
					<li><a href="http://localhost:8080/Tunesource/Demo-menu.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
					<li><a href=""><span class="glyphicon glyphicon-music"></span>Music</a></li>
					<li><a href="https://baomoi.com/"><span class="glyphicon glyphicon-asterisk"></span>Breaking New</a></li>
					<li><a href=""><span class="glyphicon glyphicon-pencil"></span>Contact</a></li>
					<li><a href=""><span class="glyphicon glyphicon-envelope"></span>Email</a></li>	
					
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="http://localhost:8080/Tunesource/Register.php"><span class="glyphicon glyphicon-user"></span>Sign-Up</a></li>
					<li><a href="http://localhost:8080/Tunesource/Login.php"><span class="glyphicon glyphicon-log-in"></span>Sign-in</a></li>
				</ul>ss
				<div class="Search">
					<form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
						<input class="form-control mr-sm-2" type="search" placeholder="Search for song..." style="width: 300px" name="Search">
						<input type="submit"name="search" value="Search" />
					</form>
				</div>
			</div>
		</div>
	</nav>
	<div class="LT">
		
			<form action="" method="POST">
		<div class="login">
			<fieldset style="width: 250px;">
			<table>	
			<tr>
				<td style="color:white;"> Username: </td>
				<td><input type="text" name="Username"></td>
			</tr>
			<tr>
				<td style="color:white">Password: </td>
				<td><input type="Password" name="Password"></td>
			</tr>
			<tr>
				<td> </td>
				<td><input type="submit" name="Login" value="Login"></td>
			</tr>	
			</table>
		    </fieldset>
	        </form>
		</div>
	    <div class="foot"></div>
	</div>
<?php 
	$connect=mysqli_connect('3.132.234.157','thaipl','123@123a','tunesourcewebsite');
	if (!$connect)
	{
		echo (" Not connect");
	}
//nếu click vào nút login thì mới thực hiện//
	if(isset($_POST['Login']))
	{
		$user_name = $_POST['Username'];
		$password = $_POST['Password'];
		/////muốn đăng nhập thì cần lấy đúng giái trị ở form nhập từ csdl
		$sql="SELECT * FROM users WHERE username='" . $user_name . "' AND password='" . $password . "'";
		// thực thi truy vấn
		$result=mysqli_query($connect,$sql);
		//trả về các kết quả là các dòng được truy vấn vào
		$row=mysqli_num_rows($result);
		// nếu row>0 thì kq trùng với 1 kq trong csdl
		if ($row>0)
		{
			echo "<script> alert('Login Successfuly')</script>";
    		echo "<script> window.open('Demo-menu.php','_self') </script>";
	//đăng nhập thành công thì mới lưu acc vào biến toàn cục $_session
	///$_SESSION['Username']=$Username;
	///echo $_SESSION['Username'];
		}
		else
		{
			echo "<script> alert('Fail')</script>";
		}
	}
?>
</body>
</html>