<?php use App\Models\Product;
use App\Models\User;
?>

<div class="dash">
    <!-- Toggle button for the sidebar -->
<button id="toggleButton"><i class='bx bx-menu'></i></button>
    <div id="lay">
        <?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
    </div>

</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
    <link rel="stylesheet" href="csshome/adminindex.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"/>
</head>
<body>
    <?php if($errors->any()): ?>
            <div class="alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

        <?php if(session('success')): ?>
            <div id="alert-success">
            <li> <?php echo e(session('success')); ?></li>
            </div>
        <?php endif; ?>
    <!--sidebar---->

    <div class="sidebar" id="sidebar">
        <ul>
            <button id="toggleButtonclose"><i class='bx bx-menu'></i></button>

            <li id="addProduct">Add a Product</li>

            <li id="addCategory">Add a Category</li>

            <li><a href="<?php echo e(route('categories.showall')); ?>">Show all categories</a></li>
            <li><a href="<?php echo e(route('products.showall')); ?>">Show all products</a></li>
            <li><a href="<?php echo e(route('orders.showall')); ?>">Show all orders</a></li>
        </ul>
    </div>



    <div class="content">

        <!--------------------------------------------------Adding a category ------------------------------------>
        <form id="addcategoryform" action="<?php echo e(route('admin.storeCategory')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
           <label for="Categoryname">Category name:</label>
           <br>
           <input type="text" name="Categoryname" placeholder=" Enter Category Name"  style="display: block; margin-bottom: 10px;">
            <br>
            <input type="submit" value="Add category">


          </form>

          <!--------------------------------------------------Adding a Product ------------------------------------>
          <form id="addproductform" action="<?php echo e(route('admin.storeProduct')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

           <label for="ProductName">Product Name:</label>
           <br>
           <input type="text" name="ProductName" placeholder=" Enter Product Name"  style="display: block; margin-bottom: 10px;">
            <br>

            <p>Product description</p>
            <br>
            <textarea name="ProductDesc" id="ProductDesc" cols="45" rows="3"></textarea>
            <br>
            <label for="Image">Product Image:</label>
            <br>
            <input type= 'file' name='Image'>
            <br>

            <label for="Quantityinstock">Quantity in stock:</label>
            <br>
            <input type="number" name="Quantityinstock" placeholder=" Enter the quantity"  style="display: block; margin-bottom: 10px;">
            <br>

            <label for="price">Product price:</label>
            <br>
            <input type="number" name="price" placeholder=" Enter the price"  style="display: block; margin-bottom: 10px;">
            <br>

            <label for="categoryid">Product Category id:</label>
            <br>
            <input type="number" name="categoryid" placeholder=" Enter the category id"  style="display: block; margin-bottom: 10px;">
            <br>

            <input type="submit" value="Add product">



          </form>

    <!------Stat calculations------>
    <?php $totalwinnings = 0; ?>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $totalwinnings += $order->price; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php
    $orderArray = $orders->toArray();

    $productCounts = array_count_values(array_column($orderArray, 'product_id'));

    arsort($productCounts);
    $mostOrderedProductId = key($productCounts);
    $mostOrderedProductCount = current($productCounts);
    $product = Product::find($mostOrderedProductId);
    ?>
    <?php
     $orderArray = $orders->toArray();

     $userCounts = array_count_values(array_column($orderArray, 'user_id'));

     arsort($userCounts);
     $mostcommonuser = key($userCounts);
     $user = User::find($mostcommonuser);
     ?>
    <!-- Statistics Dashboard -->
    <h1 id="stathead">Electro store Statistics</h1>
    <div class="statistics-dashboard" id="statdash">


        <div class="statistic-card1">
            <h3>Total Order sales</h3>
            <p><?php echo e($totalwinnings); ?></p>
        </div>

        <div class="statistic-card2">
            <h3>Our top sold product by users is</h3>
            <p><?php echo e($product->name); ?></p>
        </div>

        <div class="statistic-card3">
            <h3>Our top Customer is</h3>
            <p><?php echo e($user->name); ?></p>
        </div>




    </div>


    </div>

    <script src="pageinteractions/admin.js"></script>
</body>
</html>
<?php /**PATH C:\Users\20109\Desktop\ItI_FinalProject\e_comm\resources\views/admin/home.blade.php ENDPATH**/ ?>