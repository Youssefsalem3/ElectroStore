<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="csshome/index.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"/>
    <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Bebas Neue">
    <title>Main page</title>
</head>
<body>
<!---------------Header container------------------>
<div class="header-container">
    <a href="#" class="logo"><i class='bx bx-headphone'></i> Electro Store</a>

    <ul class="navbar-container">
    <?php if(Route::has('login')): ?>

    <?php if(auth()->guard()->check()): ?>
    <li><a href="<?php echo e(route('showcart')); ?>"><span><i class='bx bx-cart-alt'></i></span></i> My Cart</a></li>
    <li>
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
    </li>

    <?php else: ?>
    <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
    <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
    <?php endif; ?>
    <?php endif; ?>



    </ul>
</div>

 <!---------------Home container------------------>
 <div class="home-container" id="home">
    <h1>The home of gamers !</h1>
</div>

<?php if(session('success')): ?>
<div id="alert-success">
<li> <?php echo e(session('success')); ?></li>
</div>
<?php endif; ?>

 <!---------------search container------------------>
<div class="search-container">
    <i class='bx bx-search-alt-2'></i>
    <input type="text" id="searchInput" placeholder="Search for products...">
</div>


<!-----------------------Products container----------------->

<div class="container">
    <div class="meteor-container">
        <img src="images/meteor.png" alt="Meteor 1" class="meteor">
        <img src="images/meteor.png" alt="Meteor 2" class="meteor2">
        <img src="images/meteor.png" alt="Meteor 3" class="meteor3">

    </div>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h1 id="categoryname"><?php echo e($category->name); ?></h1>
        <div class="products">
            <div class="product-container">
                <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product">
                        <?php if($product->quantity > 0): ?>
                            <a href="<?php echo e(route('product.show', $product->id)); ?>">
                                <img src="<?php echo e(asset('images/' . $product->image)); ?>" width="200">
                                <p><?php echo e($product->name); ?></p>
                            </a>
                        <?php else: ?>
                            <div class="out-of-stock">
                                <img src="<?php echo e(asset('images/' . $product->image)); ?>" width="200">
                                <p><?php echo e($product->name); ?> (Out of Stock)</p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-----------------------footer----------------->
<footer>
    <div class="footer-content">

        <div class="contact-info">
            <h2>All Copyrights Reserved @ electostore.com</h2>
            <p>LinkedIn: <a href="https://www.linkedin.com/in/youssef-salem-67a0a2233/" target="_blank"><i class='bx bxl-linkedin'></i></a></p>
            <p>Phone:+201097742237</p>
        </div>
    </div>
</footer>





<script src="pageinteractions/home.js"></script>
</body>
</html>

<?php /**PATH C:\Users\20109\Desktop\ItI_FinalProject\e_comm\resources\views/home/homepage.blade.php ENDPATH**/ ?>