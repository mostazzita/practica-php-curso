<?php 
	session_start();
	if ($_POST) {
		if ( ($_POST['user']=='angel1802') && ($_POST['password']=='30474952') ) {
			$_SESSION['user']='angel1802';
			header('location:index.php');
		} else {
			echo "<script> alert('usuario o contraseña incorrecto') </script>";
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>

	<div class="container">

		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<br/>
				<div class="card">
  					<div class="card-header">
    					Log in
  					</div>
  					<div class="card-body">
						<form action="login.php" method="post">
							
							User: <input class="form-control" type="text" name="user">
							<br/>
							Password: <input class="form-control" type="password" name="password">
							<br/>

							<button class="btn btn-success" type="submit">Entrar al album</button>
						</form>
  					</div>
				</div>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>
</body>
</html>