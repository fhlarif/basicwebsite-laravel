
;

<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>
<?php

//1) firstway::  $products =DB::table('products')->get();

?>
<?php $__env->startSection('content'); ?>;
<div class="container">
  <h1>Products</h1>
  <?php if(Session::has('success')): ?>
  <p class="alert alert-success">
      <?php echo e(Session::get('success')); ?>

      <?php echo e(Session::put('success',null)); ?>

  </p>
  <?php endif; ?>

  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class='well'>
  <h3><a href="./products/<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></a></h3>
  <hr>
  <small>Written in <?php echo e($product->created_at); ?></small>

  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php echo e($products->links()); ?>

  
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\basicweb\resources\views/products/index.blade.php ENDPATH**/ ?>