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
		.register{
			text-align: center;
			float: right;
			width: 880px;
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
            list-style:none
      
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
<form method="POST">
	<div class="register">
		<fieldset style="width:250px;">
		<table>
			
		<tr>
			<td style="color:white;">user_id: </td>
			<td><input type="text" name="userid"></td>
		</tr>
		<tr>
			<td style="color:white;">username: </td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td style="color:white;"> password: </td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td> </td>
			<td><input type="submit" name="register" value="register"></td>
		</tr>
			
		</table>
	</fieldset>
	</div>
</form>
<?php 
	$connect =mysqli_connect('localhost','root','','tunesourcewebsite');
if(!$connect)
	{
		echo "Not connect";
	}

   ////nêus click vào register thì mwois thực hiện
   if(isset($_POST['register']))
   {
   	$user_id = $_POST['user_id'];
   	$username= $_POST['username'];
   	$password= $_POST['password'];
   	$sql ="INSERT INTO users VALUES('$user_id','$username','$password','null')";
   	//thực thi truy vấn
   	$result= mysqli_Query($connect,$sql);
   	//trả về các kết quả được truy vấn vào từ csdl
   	if($result)
   	{
   		echo "<br>";
   		echo "<script> alert('Register Succesfully')</script>";
   		echo "<script> window.open('Demo-menu.php','_self') </script>";
   	}
   	else
   	{
   		echo "<script> alert('Register Not Succesfully')</script>";
   	}
   }
?>
</body>
</html>