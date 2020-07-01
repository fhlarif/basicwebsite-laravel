
;

<?php $__env->startSection('title'); ?>
    Edit
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>;
<div class="container">
    <?php if(Session::has('error')): ?>
    <p class="alert alert-danger">
        <?php echo e(Session::get('error')); ?>

        <?php echo e(Session::put('error',null)); ?>

    </p>
    <?php endif; ?>

    <?php echo Form::open(['action'=>['ProductController@update',$product->id],'method'=>'post','class'=>'form-horizontal']); ?>

    <?php echo e(csrf_field()); ?>

    
      <div class="form-group">
          
          <?php echo e(Form::label('','Product Name')); ?>

          <?php echo e(Form::text('product_name',$product->product_name,['placeholder'=>'Product Name','class'=>'form-control'])); ?>

      </div>
      <div class="form-group">
          
          <?php echo e(Form::label('','Product Price')); ?>

          <?php echo e(Form::number('product_price',$product->product_price,['placeholder'=>'Product Price','class'=>'form-control'])); ?>

      </div>
      <div class="form-group">
          
          <?php echo e(Form::label('','Product Description')); ?>

          <?php echo e(Form::textarea('product_description',$product->product_description,['id'=>'editor','placeholder'=>'Product Description','class'=>'form-control'])); ?>

          <?php echo e(Form::hidden('_method','PUT')); ?>

      </div>
      
      <?php echo e(Form::submit('Update Product',['class'=>'btn btn-primary'])); ?>

      <?php echo Form::close(); ?>

  
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\basicweb\resources\views/products/edit.blade.php ENDPATH**/ ?>