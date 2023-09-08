<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('csshome/product.css')); ?>">
</head>
<body>

<div class="product-container ">
    <div class="product-image">
        <img src="<?php echo e(asset('images/' . $product->image)); ?>" width="500">
    </div>

    <div class="product-details">
        <h2>Game name: <?php echo e($product->name); ?></h2>
        <br>

        <h2>Description: <?php echo e($product->description); ?></h2>
        <br>

        <h2>price: <?php echo e($product->price); ?> $</h2>
        <br>

        <h2>Category: <?php echo e($product->category->name); ?></h2>
        <br>

        <h2>Available quantites: <?php echo e($product->quantity); ?></h2>
        <br>
        <br>
        <form id="addtocart" action="<?php echo e(route('add_to_cart', $product->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="Quantity">Quantity to Buy:</label>
                <input type="number" name="Quantity" max="<?php echo e($product->quantity); ?>" min="1" class="form-control" required>
                <button type="submit" class="btn">Add to Cart</button>
            </div>
        </form>

    </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\20109\Desktop\ItI_FinalProject\e_comm\resources\views/home/product.blade.php ENDPATH**/ ?>