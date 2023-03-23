<?php $__env->startSection('content'); ?>
<div class="bg-[#F2F2F2]  h-[100vh] flex justify-center items-center " >
    <h1 class="font-montserrat font-bold">Hallo-Admin;</h1>
    <i><?php echo e(session()->get('msg')); ?></i>
       
    
</div>
<div class=" bg-[#2C3333]  h-[100vh] lg:p-[50px]  flex justify-center items-center ">
        <form class="drop-shadow-xl z-0 bg-[#D9D9D9] font-montserrat flex rounded-[20px] justify-left items-left flex-col xl:p-[50px] lg:p-[10px]" method="POST" enctype="multipart/form-data" action=<?php echo e(route('dashboard_action')); ?>>
                <?php echo csrf_field(); ?>
                <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Item Name</label>
                <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="itemname" name="itemname">
                <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Quantity</label>
                <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="quantity" name="quantity">
                <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Price</label>
                <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="price" name="price">
                <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Tag</label>
                <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="tag" name="tag">
                <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Image</label>
                <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="file" placeholder="image" name="image">
                <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Description</label>
                <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="description" name="description">
                <button class="m-[5px] text-[#F0E9D2] text-[24px] font-bold bg-[#393E46] font-montserrat   hover:text-black border hover:bg-[#F0E9D2] 
                focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 
                " type="submit">submit</button>
            
            
            </form>
            
</div>
<div>
    <table class="table table-striped table-dark">
        <thead class="thead-light"> 
            <tr>
                <th>Item Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>description</th>
                <th>Tag</th>
                <th>Action</th>
                    
            </tr>
        </thead>
        <tbody>
         <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->itemname); ?></td>
                <td><?php echo e($item->image); ?></td>
                <td><?php echo e($item->price); ?></td>
                <td><?php echo e($item->quantity); ?></td>
                <td><?php echo e($item->description); ?></td>
                <td><?php echo e($item->tag); ?></td>
                

                <td>
                    <div>
                        
                        <form method="post" action=<?php echo e(route('item_delete')); ?>>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value=<?php echo e($item->id); ?>>
                            <button type="submit">Delete</button>
                        </form>
                        
                        <form method="get" action=<?php echo e(route('edit_form')); ?>>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value=<?php echo e($item->id); ?>>
                            <button type="submit">Edit</button>
                        </form>
                        
                        
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>
                
        </div>
    



<?php $__env->stopSection(); ?>
<?php echo $__env->make('isLogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\agilg\OneDrive\Desktop\project\projectsangkuni\resources\views/admin_dashboard.blade.php ENDPATH**/ ?>