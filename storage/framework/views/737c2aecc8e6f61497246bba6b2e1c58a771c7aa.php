
;

<?php $__env->startSection('title'); ?>
    Show
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>;
<div class="container">
  <h1>Product Details</h1>
<h3><?php echo e($product->product_name); ?></h3>
<h4><?php echo $product->product_description; ?></h4>
<h4><?php echo e($product->product_price); ?></h4>
<hr>
<small>Written in <?php echo e($product->created_at); ?></small>
<hr>
<a href="./<?php echo e($product->id); ?>/edit" class="btn btn-default">Edit</a>

<?php echo Form::open(['action'=>['ProductController@destroy',$product->id],'method'=>'POST','class'=>'pull-right']); ?>

<?php echo e(Form::hidden('_method','DELETE')); ?>

<?php echo e(Form::submit('Delete',['class'=>'btn btn-danger'])); ?>

<?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\basicweb\resources\views/products/show.blade.php ENDPATH**/ ?>