<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
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
	.song-group ul li{
		list-style: none;
	}
	.song-group{
		margin-left: 20px;
	}
</style>
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
	<div class="A">
		<h3 style="text-align: center; font-size:45px; color: red; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><span>MUSIC OFFICER 6</span></h3>
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
		$connect =mysqli_connect('localhost','root','','tunesourcewebsite');
		if(!$connect){
			echo "Not connect";
		}
		?>
		<?php
		$sql="SELECT * FROM song";
		$result=mysqli_query($connect,$sql);
		////trả về kết quả dưới dạng 1 mảng
		while($row_song=mysqli_fetch_array($result))
		{
			$song_id=$row_song['song_id'];
			$song_name=$row_song['song_name'];
			$song_img=$row_song['song_img'];
			$song_audio=$row_song['song_audio'];
			$song_price=$row_song['song_price'];
			$singer_id=$row_song['singer_id'];
			$song_lyric=$row_song['song_lyric'];
		?>
			<div class="song-group">
					<div class="col-md-3 col-sm-6 col-12">
						<ul>
							<li><h5 style="text-align: center;"><b><?php echo "$song_name"?></b> </h5></li>
							<li><img class="card-img-top"src="Image/<?php echo "$song_img"?>"class="rounded-cirlce" style="margin: auto;width: 250px;height: 200px;"></li>
							<li><audio controls controlslist="nodownload" style="width:250px;" ontimeupdate="Myaudio(this)">
									<source src="audio/<?php echo  "$song_audio"?>" type="audio/mpeg">
									</audio>
									<script type="text/javascript">function Myaudio(event){if(event.currentTime>20){event.currentTime=0;event.pause();
										alert("you need to pay to continue listening")}
									}
									</script></li>
									<a href="detail.php?song_id=<?php echo $song_id?>" class="btn btn-primary"> Detail</a>
									
						</ul>
					</div>
			</div>
		<?php
		}
		?> 
</body>
</html>