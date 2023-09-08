<?php if(Auth::user()->usertype == 1): ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Categories</title>
        <link rel="stylesheet" href="<?php echo e(asset('csshome/categories.css')); ?>">
    </head>
    <body>
        <h1>All products</h1>
        <table border=1>
            <tr>
                <th>Name</th>
                <th>description</th>
                <th>price</th>
                <th>quantity</th>
                <th>category name</th>
                <th>image</th>
                <th>Delete product</th>
                <th>Edit product</th>
            </tr>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->description); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->quantity); ?></td>
                <td><?php echo e($product->category->name); ?></td>
                <td>
                <img src="<?php echo e(asset('images/' . $product->image)); ?>" width="100">
            </td>
            <td>
            <form action="<?php echo e(route('product.destroy', $product->id)); ?>" method="POST">

                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <button type="submit">x</button>

            </form>
        </td>
        <td>
            <form action="<?php echo e(route('product.update',$product->id)); ?>" >
            <button type="submit">Update</button>
         </form>
        </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </body>
    </html>
<?php else: ?>
    <?php
        return redirect()->route('returnmainpage');
    ?>
<?php endif; ?>
<?php /**PATH C:\Users\20109\Desktop\ItI_FinalProject\e_comm\resources\views/admin/products.blade.php ENDPATH**/ ?>