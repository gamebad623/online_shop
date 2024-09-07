<?php
require_once '../app.php';
$id = $request->get('id');

if($request->hasRequest($request->post('submit'))){
    
    if ($product->deleteProduct($id)) {
        echo "Product deleted successfully!";
        $request->redirect("../index.php");
    } else {
        echo "Failed to delete product.";
    }
    
}else{
    $request->redirect("../index.php");
}


?>