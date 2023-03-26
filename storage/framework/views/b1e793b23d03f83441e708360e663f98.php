<?php $__env->startSection('content'); ?>
<div class="h-[100vh] bg-[#2C3333] flex justify-center items-center">
    <form class="p-[60px] w-[600px] drop-shadow-xl z-0 bg-[#D9D9D9] font-montserrat flex rounded-[25px] justify-left items-left flex-col " method="POST"  action=<?php echo e(route('sign_up_action')); ?>>
        <?php echo csrf_field(); ?>
        <h1 class="m-[5px] text-[#2C3333] font-extrabold">Sign UP</h1>
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold after:content-['*'] after:text-[#B46060]" for="">Username </label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="username" name="username">
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold after:content-['*'] after:text-[#B46060]" for="">Email </label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="email" name="email">
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">No-telp</label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="Notelp" name="no_telp">
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold after:content-['*'] after:text-[#B46060]" for="">Password </label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="password" placeholder="password" name="password">
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold after:content-['*'] after:text-[#B46060]" for="">Confirm password </label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="password" placeholder="confirm password" name="password_confirmation">
        <div >
            <p class=" mt-[10px] rounded-[5px] bg-[#80b460] text-[#333] text-center " ><?php echo e(session()->get('msg')); ?></p> 
        </div>
        <div >
            <p class=" rounded-[5px] bg-[#B46060] text-[#333] text-center " ><?php echo e(session()->get('err')); ?></p> 
        </div>
        <?php if($errors->has('username')): ?>
        <span class="rounded-[5px] m-[10px] bg-[#B46060] text-[#333] text-center"><?php echo e($errors->first('username')); ?></span>
        <?php endif; ?>
        <?php if($errors->has('email')): ?>
        <span class="rounded-[5px] m-[10px] bg-[#B46060] text-[#333] text-center"><?php echo e($errors->first('email')); ?></span>
        <?php endif; ?>
        <?php if($errors->has('Notelp')): ?>
        <span class="rounded-[5px] m-[10px] bg-[#B46060] text-[#333] text-center"><?php echo e($errors->first('Notelp')); ?></span>
        <?php endif; ?>
        <?php if($errors->has('password')): ?>
        <span class="rounded-[5px] m-[10px] bg-[#B46060] text-[#333] text-center"><?php echo e($errors->first('password')); ?></span>
        <?php endif; ?>
        <?php if($errors->has('password_confirmation')): ?>
        <span class="rounded-[5px] m-[10px] bg-[#B46060] text-[#333] text-center"><?php echo e($errors->first('pasword confirmation')); ?></span>
        <?php endif; ?>
        
        <button class="m-[5px] text-[#F0E9D2] text-[24px] font-bold bg-[#393E46] font-montserrat   hover:text-black border hover:bg-[#F0E9D2] 
         focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 
        " type="submit">Sign Up</button>


    </form>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('isGuest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\agilg\OneDrive\Desktop\project\projectsangkuni\resources\views/signup.blade.php ENDPATH**/ ?>