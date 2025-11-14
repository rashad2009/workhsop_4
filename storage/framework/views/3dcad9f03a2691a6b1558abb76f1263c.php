<?php $__env->startSection("title","Home Page"); ?>
<?php $__env->startSection("content"); ?>
<div class="container mt-4">
    <div class="d-flex align-items-center justify-content-between">
        <h1>Products List</h1>
        <a href="/create" class="btn btn-primary">Add New Product</a>
    </div>
<?php if(session("res")): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle-fill"></i> <?php echo e(session("res")); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
<?php if(session("upd")): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle-fill"></i> <?php echo e(session("upd")); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>



<?php endif; ?>
<?php if(session("del")): ?>

  
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="bi bi-x-circle"></i> <?php echo e(session("del")); ?>

   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>

<?php endif; ?>

    
    <?php if($products->count()>0): ?>

    <table class=" table table-stripped  table-hover mt-4 ">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($product->id); ?></th>
                <td><?php echo e($product->name); ?></td>
                <td><img src="<?php echo e(asset("/storage/".$product->image )); ?>" style="border-radius:20px;" alt="" width="80" height="40"></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->quantity); ?></td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="/edit/<?php echo e($product->id); ?>" class="btn btn-warning">Edit</a>
                    <a href="/show/<?php echo e($product->id); ?>" class="btn btn-info">View</a>
                    <form action="/delete/<?php echo e($product->id); ?>" class="form-inline" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("delete"); ?>
                        <button type="submit" onclick="confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
        <?php else: ?>
        <div class="alert alert-info alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">

            <p> Ohh! There is no data yet.</p>
            <p>MadeBy | Rashad Diab</p>
         </div>
        <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Downloads\Crud_App-main\Crud_App-main\CRUD_App\CRUD_App\resources\views/products/index.blade.php ENDPATH**/ ?>