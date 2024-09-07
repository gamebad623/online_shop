<?php
require_once '../app.php';
$id = $request->get('id');



if($request->hasRequest($request->post('submit')))
{
    $name = $request->post('name');
    $price = $request->post('price');
    $description = $request->post('description');
    $img = $request->file('img');

    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($price) || !is_numeric($price) || $price <= 0) {
        $errors[] = "Price is required and must be a positive number.";
    }
    if (strlen($description) > 255) {
        $errors[] = "Description should not exceed 255 characters.";
    }
    if (empty($img['name'])) {
        $errors[] = "Image is required.";
    }
    if (empty($errors)){
    $img = new Img($img);

    $result = $product->updateProduct($name , $price ,$description ,$img->new_name , $id);
    if($result){
        $img->upload();
        $request->redirect("../index.php");
    }
    
}
else{
    foreach ($errors as $error) {
       echo "<p>$error</p>";
   }
}
}


else{
    $request->redirect("../edit.php?id=$id");
}

?>