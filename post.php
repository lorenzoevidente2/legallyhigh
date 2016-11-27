
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="stylex.css">
    <link rel="shortcut icon" href="titlebar.ico" />
	


	<title>LH</title>
	
	
</head>
<body>
<div class="jumbotron text-center">
   	<h1>Share Your Genius Idea!</h1>

<nav class="navbar navbar-inverse" id="navi">
	<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">LegallyHigh</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="recipe.php">Rad Solutions</a></li>
      <li><a href="doit.php">Do it yourself HIGH!</a></li> 
      <li><a href="post.php">Submit your idea! </a></li>
       
    </ul>
  </div>
</nav>
   </div>


	<div class="container-fluid" id="first" >
		<div class="row">	
			<div class="col-sm-1"></div>
			<!--form-->

			<div class="col-sm-5">
			    <h1></h1>
				<form name="mainform" action="post.php" method="POST">
					<div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control" id="name" name="nam" value="" required="">
                    </div>

                    <div class="form-group">
                      <label for="title">Title:</label>
                      <input type="text" class="form-control" id="title" name="tit" value="" required="">
                    </div>

                    <div class="form-group">
                     <label for="post">Your Idea</label>
                      <textarea class="form-control" rows="10" id="post" name="pos" value="" required=""></textarea>
                    </div>
                    
                    <div class="form-group">
                      
                      <input type="submit" class="form-control" id="submit" name="sub">
                    </div>

                     
				</form>


			</div>
             <!--latest posters-->

			<div class="col-sm-5" id="comments">
			
     <?php 
      
        if(isset($_POST['sub'])){

               $server="localhost";
               $username="root";
               $password="";
               $database="poster";
               $counter=2;
               $conn = mysqli_connect($server, $username, $password,$database);



              $name=$_POST['nam'];
              $title=$_POST['tit'];
              $idea=$_POST['pos'];
   
              $sql = "INSERT INTO users(name,title,idea) VALUES ('$name','$title','$idea')";

              $insertion=mysqli_query($conn,$sql);

              if ($insertion) {
              echo "New record created successfully";
   
              } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              }

                }
              ?>
<br>
<br>


             <?Php
               $server="localhost";
               $username="root";
               $password="";
               $database="poster";
               $counter=2;
               $conn = mysqli_connect($server, $username, $password,$database);
               $sql = "SELECT name,title,idea FROM users";
               $result = $conn->query($sql);
 
	            if ($result->num_rows > 0) {
              // output data of each row
		          while($row = $result->fetch_assoc()) {
              echo "<div class='ha'><h3 class='haha'>Title: ".$row["title"]."</h3> <p class='hahaha'>Posted by:&nbsp".$row["name"]."<br>&nbsp&nbsp ".$row["idea"]."</p></div><br><br>";
		           }
		          } else {
             echo "0 results";
              }

          	?>
               

             


			</div>
			<div class="col-sm-1"></div>

		</div>
	</div>


</body>
</html>