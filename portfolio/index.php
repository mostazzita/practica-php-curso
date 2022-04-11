<?php include('header.php'); ?>
<?php include('conn.php'); ?>
<?php 

	$objConnection = new connection();

	$projects = $objConnection->consultar('SELECT * FROM proyecto'); 

?>

	<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenidos a todos!</h1>
        <p class="col-md-8 fs-4">Este es un proyecto sobre un album de fotos</p>
      </div>
    </div>


<div class="row row-cols-1 row-cols-md-3 g-4">

<?php foreach ($projects as $project) { ?>
  <div class="col">
    <div class="card">
      <img src="images/<?php echo $project['archivo'];?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $project['nombre']; ?></h5>
        <p class="card-text"><?php echo $project['descripcion'] ?></p>
      </div>
    </div>
  </div>
<?php } ?>

</div>

<?php include('footer.php'); ?>