<?php include('header.php'); ?>
<?php include('conn.php'); ?>
<?php
	if ($_POST) {
		
		print_r($_FILES['file']);

		$name = $_POST['name'];
		$description = $_POST['description'];

		$fecha = new DateTime();

		$file = $fecha->getTimestamp().'_'.$_FILES['file']['name'];

		$tmpFile = $_FILES['file']['tmp_name'];
		move_uploaded_file($tmpFile, 'images/'.$file);
		$objConnection = new connection();

		$sql = "INSERT INTO proyecto (id, nombre, archivo, descripcion) VALUES (NULL, '$name', '$file', '$description');";

		$objConnection->ejecutar($sql);
		header('location:album.php');
	
	}

	if ($_GET) {

		$id = $_GET['del'];

		$objConnection = new connection();

		$image = $objConnection->consultar("SELECT archivo FROM proyecto WHERE proyecto. id = $id");
		unlink("images/".$image[0]['archivo']);

		$sql = "DELETE FROM proyecto WHERE proyecto. id = $id";

		$objConnection->ejecutar($sql);
		header('location:album.php');
	
	}

	$objConnection = new connection();

	$projects = $objConnection->consultar('SELECT * FROM proyecto');

?>
 <br/>

 <div class="container">
 	<div class="row">
 		<div class="col-md-6">
 			<div class="card">
 				<div class="card-header">
 					Datos del proyecto
 				</div>
 				<div class="card-body">

 					<form action="album.php" method="post" enctype="multipart/form-data">

 						<label>Nombre del proyecto: <input class="form-control" type="text" name="name" required><br/></label>
						<label>Imágen del proyecto: <input class="form-control" type="file" name="file" required><br/></label>
						<label>Descripción: <br/><textarea class="form-control" placeholder="Leave a comment" name="description" cols="30" rows="10" required></textarea></label><br/>
						<br/><input class="btn btn-success" type="submit" value="Enviar">
					</form>
				</div>
			</div>
		</div>
 		<div class="col-md-6">
 			<table class="table table-bordered">
 				<thead>
 					<tr>
 						<th scope="col">ID</th>
		      			<th scope="col">Name</th>
		      			<th scope="col">Image</th>
		      			<th scope="col">Action</th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		<?php foreach ($projects as $project) { ?>
		    		<tr>
		      			<td><?php echo $project['id']; ?></td>
		      			<td><?php echo $project['nombre']; ?></td>
		      			<td><img width="100" src="images/<?php echo $project['archivo'];?>"></td>
		      			<td><?php echo $project['descripcion']; ?></td>
		      			<td><a class="btn btn-danger" href="?del=<?php echo $project['id'];?>">Eliminar</a></td>
		    		</tr>
		    		<?php } ?>
		  		</tbody>
			</table>
		</div>
 	</div>
 </div>
<br/>

<?php include('footer.php'); ?>