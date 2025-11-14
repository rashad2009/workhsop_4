
<?php $__env->startSection("title","Product View"); ?>
<?php $__env->startSection("content"); ?>
<div class="card w-50 my-4 mx-auto  d-flex" style="width: ; ">
    <div class="card-body">
      <h5 class="card-title"> Name: <?php echo e($product->name); ?></h5>
      <h6 class="card-subtitle mb-2 text-muted">Added At: <?php echo e($product->created_at); ?></h6>
      <p class="card-text"><?php echo e($product->description); ?></p>
      <img src="<?php echo e(asset("storage/".$product->image)); ?> " width="350" class="d-block my-3" style=" border-radius:10px;" alt="">
      <a href="/edit/<?php echo e($product->id); ?>" class="btn btn-outline-warning">Edit</a>
      <a href="/index" class="btn btn-secondary">Cencel</a>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Khames\Desktop\CRUD_App\resources\views/products/view.blade.php ENDPATH**/ ?>