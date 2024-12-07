<?php 

include 'config/config.php';
include 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1 ");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

print_r($_SESSION);

session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<header>
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-title">
        <strong>Oddisey WEB</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarHeader">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-list">
            <a href="#" class="nav-link active">Catalogo</a>
         </li> 
          <li class="nav-list">
           <a href="#" class="nav-link">Contactos</a>
         </li> 
         </ul>
         <a href="mostrar.php" class="btn btn-primary">Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a>
      </div>
    </div>
  </div>
</header>
<main id="main-page">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
         <?php foreach($resultado as $row) { ?>
         <div class="col">
              <div class="card shadow-sm">
                 <?php
                 
                 $id = $row['id'];
                 $imagen = "images/productos/$id/principal.jpg";

                 if(!file_exists($imagen)){
                    $imagen = "images/no-photo.jpg";
                 }
                 ?>
                 <img src="<?php echo $imagen; ?>" alt="Imagen de producto">
                 <div class="card-body">
                     <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                     <p class="card-text">$ <?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                       <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                              <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha384', $row['id'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>  
                          </div>
                          <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha384', $row['id'], KEY_TOKEN); ?>')">Agregar</button>
                     </div>                       
                 </div>
             </div>
         </div>
         <?php } ?>
      </div>
  </div>       
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    function addProducto(id, token){
        let url = 'clases/carrito.php'
        let formData = new FormData()
        formData.append('id', id)
        formData.append('token', token)

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data =>{
            if(data.ok){
                let elemento = document.getElementById("num_cart")
                elemento.innerHTML = data.numero
            }
        })
    }
</script>
</body>
</html>