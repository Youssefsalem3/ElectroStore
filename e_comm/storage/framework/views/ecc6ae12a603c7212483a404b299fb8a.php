<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('csshome/categories.css')); ?>">
</head>
<body>
    <form action="<?php echo e(route('product.edit',$product->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
    <label for="name">Product name</label>
    <br>
     <input type="text" name="name" value="<?php echo e($product->name); ?>">
     <br>
     <label for="description">Product description</label>
     <br>
     <textarea name="description"><?php echo e($product->description); ?></textarea>
     <br>
     <label for="qunatity">Product quantity</label>
     <br>
     <input type="number" name="quantity" value="<?php echo e($product->quantity); ?>">
     <br>
     <label for="price">Product price</label>
     <br>
     <input type="number" name="price" value="<?php echo e($product->price); ?>">
     <br>
     <label for="category_id">Product Category id</label>
     <br>
     <input type="number" name="category_id" value="<?php echo e($product->category_id); ?>">
     <br>
     <label for="Image">Product image</label>
     <br>
     <input type= 'file' name='Image'>

<br>
<br>
     <input type="submit" >


    </form>
</body>
</html>
<?php /**PATH C:\Users\20109\Desktop\ItI_FinalProject\e_comm\resources\views/admin/update.blade.php ENDPATH**/ ?>