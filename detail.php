<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	
	<title></title>
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
		.image-detail img {
	    margin-top: 5%;
	    width: 100%;
	    align-items: center;
	    border-radius: 100%;
	    margin-bottom: 30px;
	    animation: app-logo-spin infinite 20s linear
		}
		@keyframes app-logo-spin {
		    from {
		        transform: rotate(0deg);
		    }
		    to {
		        transform: rotate(360deg);
		    }
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
	<div class="container">
	<div class="row">
		<?php
		session_start();
		$connect = mysqli_connect('3.132.234.157','thaipl','123@123a','thaipl');
		if (!$connect)
			{
				echo (" Not connect");
			}
		$id = $_GET["song_id"];
		$sql = "SELECT * FROM song,singer,genre WHERE song.genre_id = genre.genre_id and song.singer_id = singer.singer_id and song_id = {$id}";
		$result = mysqli_query($connect, $sql);
		while($row= mysqli_fetch_array($result)){
			$id = $row['song_id'];
			?>
			<div class="col-md-6" style="text-align: left;">
				<h2> Name of Music: <?php echo $row['song_name'];?> </h2>
				<h3>Price: <?php echo $row['song_price'];?> </h3>
				<audio controls controlsList="nodownload" ontimeupdate="myAudio(this)" style="width: 250px;">
					   	<source src="audio/<?php echo $row['song_audio'];?>" type="audio/mpeg">
					   </audio>
					   <script type="text/javascript">
					   	function MyAudio(event){
					   		if(event.currentTime>30){
					   			event.currentTime=0;
					   			event.pause();
					   			alert("You need to pay to continue listening song")
					   		}
					   	}
					   </script>
					   <h3> Singer:<?php echo $row["singer_name"] ;?></h3>
					   <h3> Genre:<?php echo $row["genre_name"]; ?></h3>
					    <textarea cols="40" rows="10" disabled><?php echo $row['song_lyric'];?></textarea>
					  
					  <!-- Khi click vào nút này có thể kiểm tra xem trong giỏ hàng đã có bài hát này chưa và kiểm tra đã đăng nhập chưa? -->
					

			</div>  
			<!-- cho ảnh quay tròn-->
			<div class="image-detail">
			<div class="col-md-6">
				<img src="Image/<?php echo $row['song_img'] ?>" style = "width: 500px;height: 500px;">
			</div> 
		</div>
			<?php
		}

	?>
	</div>
</div>
</body>
</html>