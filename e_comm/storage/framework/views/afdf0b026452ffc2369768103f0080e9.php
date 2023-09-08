<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('csshome/cart.css')); ?>">
    <title>cart</title>
</head>
<body>
<h1>Hope you enjoyed your visit and we are sure you will enjoy the games</h1>
<?php $totalprice=0 ?>
<table border=2>
    <tr>
        <th>product</th>
        <th>qunatity bought</th>
        <th>total price</th>
        <th>Remove from cart</th>

    </tr>
        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <img src="<?php echo e(asset('images/' . $cart->product->image)); ?>" width="100">
            </td>
            <td><?php echo e($cart->quantity_bought); ?></td>
            <td><?php echo e($cart->price); ?></td>
            <td>
                <form action="<?php echo e(route('cart.destroy', $cart->id)); ?>" method="POST">

                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit">x</button>

                </form>
            </td>
            <?php $totalprice+= $cart->price?>
    </tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr id="finalcost">
    <td colspan="4">Total Cart Price : <?php echo e($totalprice); ?></td>
</tr>
</table>


<a href="<?php echo e(route('orderitems')); ?>" class="btn-order">Order Now !</a>

</body>
</html>
<?php /**PATH C:\Users\20109\Desktop\ItI_FinalProject\e_comm\resources\views/home/showcart.blade.php ENDPATH**/ ?>