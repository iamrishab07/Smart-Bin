<?php

session_start();

// Connecting to the database

$servername = "localhost";
$username = "root";
$password = "**********";
$dbname = "smartbin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from bin";
$result = $conn->query($sql);
$result2 = $conn->query($sql);

// 	$data = mysqli_fetch_assoc($result);
$numrows = mysqli_num_rows($result);
// echo $data["id"];

// while($rows = mysqli_fetch_assoc($result)){
// 	echo $rows["content"];
// }

?>



<!DOCTYPE html>
<html>
<head>
	<title>Smart Bin</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>


<!-- Header Section -->
<div class="container-fluid" style="margin-bottom: 3%;background-color: rgba(0,0,0,0.5);color:white;padding-bottom: 13px;">
	<center><h2>Smart Bin</h2></center>
</div>





<!-- Alert Section -->

<?php

if(isset($_SESSION['clean_id'])){
	echo '<div class="alert alert-success">
		  	<center><strong>Success!</strong>A person has been sent to clean Bin No. : '. $_SESSION['clean_id'].'</center>
			</div>';
}
unset($_SESSION['clean_id']);
?>


<!-- Main body section -->

<div class="container-fluid row">
	<!-- Left section -->
	<div class="col-md-7" style="">
		<!-- Data entry -->

		<?php

			while($row = mysqli_fetch_assoc($result)){

				if($row["content"]<70){
					echo '<div class="jumbotron">
							<div class="row"><div class="col-md-12"><b>Smart Bin id :</b>  '.$row["id"].'</div></div>
							<br>
							<div class="row"><div class="col-md-12"><b>Location :  </b>'.$row["address"].'</div>
							</div>
							<br>
							<div class="row">

								<div class="col-md-3"><b>Content :  </b>'.$row["content"].' %</div>

								<div class="col-md-9">
									<div class="progress">
										<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="'
											. round($row["content"]).'" aria-valuemin="0" aria-valuemax="100" style="width:'.$row["content"].'%;">
										</div>
									</div>
								</div>

							 </div>
							</div>';
				}
			}

		?>

		<!-- 	Progress Bar 
		
		<div class="progress">
		  <div class="progress-bar" role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:70%">
		    <span class="sr-only">70% Complete</span>
		  </div>
		</div>
		-->

		<!-- <div class="jumbotron">
		  <h3>Hello, world!</h3>
		</div> -->
	</div>

	<div class="col-md-1">
		
	</div>

	<div class="col-md-4">
		<!-- Data entry with php code -->
		<?php
				
			while($row2 = mysqli_fetch_assoc($result2)){

				if($row2["content"]>=70){

					echo '<div class="jumbotron">
							<div class="row"><div class="col-md-12"><b>Smart Bin id :</b>  '.$row2["id"].'</div></div>
							<br>
							<div class="row"><div class="col-md-12"><b>Location :  </b>'.$row2["address"].'</div>
							</div>
							<br>
							<div class="row">

								<div class="col-md-6"><b>Content :  </b><span style="color:red;">'.$row2["content"].'</span></div>

								<div class="col-md-6">
									<a href="clean.php?id='.$row2["id"].'"><button type="button" class="btn btn-danger">
									Clean</button></a>
								</div>

							 </div>
							</div>';
				}
			}



			// for ($i=0; $i < sizeof($data)-2; $i++) { 
			// 	echo '<div class="jumbotron">
			// 	<div class="row">
			// 			<div class="col-md-8"><b>'. $data[$i] .'</b></div>
						
			// 			<div class="col-md-2">
			// 				<button type="button" class="btn btn-danger" style="border-radius:15%;">
			// 							Alert
			// 				</button>
			// 			</div>
			// 	</div>
			// 	</div>';
			// }

		?>
	</div>
	</div>
</div>

</body>
</html>
