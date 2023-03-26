<?php $__env->startSection('content'); ?>
<a href="">
    <div class="h-[auto] p-[150px] bg-[#D9D9D9] drop-shadow-lg flex  flex-wrap  justify-center ">
        <div class="h-auto w-auto">
            <img  class="drop-shadow-lg rounded-[20px] w-[auto] h-[auto] hover:animate-pulse m-2" src="storage/images/banner.png" alt="" />
        </div>
    </a>
    
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a class="no-underline text-[#2C3333]"href="/showcase/<?php echo e($item->id); ?>">
        <div class=" w-[300px] h-[300px] flex flex-col justify-center font-montserrat m-2  bg-[#ffff] p-[10px] rounded-xl hover:w-[320px] hover:h-[320px] transition-all xl:w-[200px] xl:h-[200px] xl:hover:w-[210px] xl:hover:h-[210px] ">
            <div class="  h-[190px] xl:h-[105px]  flex justify-center">
                <img  class=" rounded-xl object-cover " src=<?php echo e(asset("storage/".$item->image)); ?> alt="" />
            </div>
            
            <div class="h-[100px] w-[300px]">
                <h6 class="m-[2px] xl:text-[14px] " ><?php echo e($item->itemname); ?></h6>
                <h6 class="font-bold xl:text-[14px]">Rp<?php echo e($item->price); ?></h6>
                <form method="POST" action="#">
                    <?php echo csrf_field(); ?>
                    <button class="drop-shadow-lg text-[#F0E9D2] text-[18px]  bg-[#393E46] font-montserrat   hover:text-black border hover:bg-[#F0E9D2] 
                    focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-2 mb-2 xl:text-[14 px]
                    ">Pesan </button>
                    
                </form>
            </div>
            
        </div>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('isLogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\agilg\OneDrive\Desktop\project\projectsangkuni\resources\views/showcase.blade.php ENDPATH**/ ?>