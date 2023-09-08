<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('csshome/categories.css')); ?>">
    <title>Document</title>
</head>

<body>
    <h1>All orders</h1>
    <table border=1 id="ordertable">
        <tr>
            <th>Order_id</th>
            <th>User_name</th>
            <th>User_Address</th>
            <th>Product_name</th>
            <th>quantity</th>
            <th>price</th>

            <th>Delete order</th>
        </tr>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($orders->id); ?></td>
            <td><?php echo e($orders->user->name); ?></td>
            <td><?php echo e($orders->user->address); ?></td>
            <td><?php echo e($orders->product->name); ?></td>
            <td><?php echo e($orders->quantity_bought); ?></td>
            <td><?php echo e($orders->price); ?></td>
        <td>
        <form action="<?php echo e(route('order.destroy', $orders->id)); ?>" method="POST">

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
<?php /**PATH C:\Users\20109\Desktop\ItI_FinalProject\e_comm\resources\views/admin/orders.blade.php ENDPATH**/ ?>