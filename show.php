<?php include 'inc/header.php'; ?>
<?php
require_once './app.php';
?>
<?php
$id = $request->get('id');
$product = $product->getOne($id);
?>



<div class="container my-5">

    <div class="row">


    <div class="col-lg-6">
            <img src="images/<?= $product['img']?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?= $product['name']?></h5>
            <p class="text-muted"><?= $product['price']?></p>
            <p><?= $product['description']?></p>
            <a href="index.php" class="btn btn-primary">Back</a>
            <a href="edit.php?id=<?= $product['id']?>" class="btn btn-info">Edit</a>
            <a href="./handlers/handleDelete.php?id=<?= $product['id']?>" class="btn btn-danger">Delete</a>
        </div>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>