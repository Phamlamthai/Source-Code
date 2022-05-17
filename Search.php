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
	.title{
		text-align: center;
	}
	.container{
		text-align: center;
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
					<li><a href=""><span class="glyphicon glyphicon-asterisk"></span>Breaking New</a></li>
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
	<div class="A">
		<h3 style="text-align: center; font-size:45px; color: red; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><span>MUSIC OFFICER</span></h3>
	</div>
	<div id=Mycarousel class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#Mycarousel" data-slide-to="0" class="active"></li>
			<li data-target="#Mycarousel" data-slide-to="1"></li>
			<li data-target="#Mycarousel" data-slide-to="2"></li>
		</ol>
		<!---Wrapper for slide-->
		<div class="carousel-inner">
			<div class="item active">
				<img src="Image/4.jpg"  class="img-rounded"style="width: 1920px;height:530px; " alt=" LOS">
			</div>

			<div class="item">
				<img src="Image/2.jpg" style="width: 1920px;height:530px;"alt="OLS">
			</div>
			<div class="item">
				<img src="Image/5.jpg" style="width: 1920px;height:530px;"alt="LSS">
			</div>
		</div>
		<!-- left and right controls-->
		<a class="left carousel-control" href="#Mycarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#Mycarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<?php
	$connect=mysqli_connect('localhost','root','','tunesourcewebsite');
	if (!$connect)
	{
		echo (" Not connect");
	}
	$search = "";
	if( !empty($_GET['Search']))
	{
		$search = $_GET['Search'];
	}
	?>
	<h3 class="title" style="text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"> Search Result for: <?= $search ?></h3>
	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<?php
				if( !empty($search))
				{
					$sql="SELECT * FROM song,singer,genre WHERE song.song_name LIKE'%{$search}%' AND song.singer_id=singer.singer_id AND song.genre_id=genre.genre_id";
					$rs=mysqli_query($connect,$sql);
					while($row = mysqli_fetch_assoc($rs))
					{
			?>
			<div class="card" style="background-color: white;margin-top:20px;margin-left: 35px;overflow: auto; width: 270px; border: 2px solid #F8ABAB; border-radius: 1px;border-bottom: 6px solid #FCA5A5; float: left;">
					<a href="detail.php?id=<?php echo $row['song_id']?>" style="text-decoration: none;text-align: center;"> 
				<div style="height: 80px;">
						<h2><?php echo $row['song_name'] ?></h2>
				</div>

				<div><img src="Image/<?php echo $row['song_img']?>" style="width: 247px;height: 200px;padding: 7px;">
					<p style="color: red"><?php echo $row['song_price'] ."$"; ?></p>
					<h4 style="color: #3BA33D"><?php echo $row['singer_name']?></h4>
					<h3>Genre: <?php echo $row['genre_name'] ?></h3>
					</a>
				</div>
				<?php
					}
				}
			?>
			</div>
				
		</div>
	</div>
</body>
</html>