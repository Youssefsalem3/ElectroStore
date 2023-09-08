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
        <h1>All categories</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Delete this category</th>
            </tr>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($category->name); ?></td>
                <td>
                <form action="<?php echo e(route('category.destroy', $category->id)); ?>" method="POST">

                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit">x</button>

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
<?php /**PATH C:\Users\20109\Desktop\ItI_FinalProject\e_comm\resources\views/admin/categories.blade.php ENDPATH**/ ?>