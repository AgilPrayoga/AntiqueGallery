<?php $__env->startSection('content'); ?>
<div class="h-[100vh] bg-[#2C3333] flex justify-center items-center">
    <?php echo csrf_field(); ?>
    <form class="drop-shadow-xl z-0 bg-[#D9D9D9] font-montserrat flex rounded-[20px] justify-left items-left flex-col p-[50px]" method="POST"  action=<?php echo e(route('login_action')); ?>>
        <?php echo csrf_field(); ?>
        <h1 class="text-[#2C3333] font-extrabold">login page</h1>
        <label class="text-[#2C3333] text-[18px] font-bold" for="">Username*</label>
        <input class="p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="username" name="username">
        <label class="text-[#2C3333] text-[18px] font-bold" for="">password*</label>
        <input class="p-[5px] rounded-lg drop-shadow-xl" type="password" placeholder="password" name="password">
        <p><?php echo e(session()->get('msg')); ?></p>
        <p>belum memiliki akun? <a href=<?php echo e(route('sign_up_form')); ?>>daftar sekarang!</a></p>
        <button class="text-[#F0E9D2] text-[24px] font-bold bg-[#393E46] font-montserrat   hover:text-black border hover:bg-[#F0E9D2] 
        focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 
        " type="submit">Login</button>


    </form>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('isGuest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\agilg\OneDrive\Desktop\project\projectsangkuni\resources\views/login.blade.php ENDPATH**/ ?>