@extends('isGuest')

@section('content')
<div>
    <h1>Admin</h1>
    <form method="POST"  action={{route('admin_action')}}>
        @csrf
        <label for="">Username</label>
        <input type="text" placeholder="username" name="username">
        <label for="">password</label>
        <input type="password" placeholder="password" name="password">
        <button type="submit">login</button>


    </form>
</div>
<div class="h-[100vh] bg-[#2C3333] flex justify-center items-center">
    
    <form class="drop-shadow-xl z-0 bg-[#D9D9D9] font-montserrat flex rounded-[20px] justify-left items-left flex-col p-[50px]" method="POST"  action={{route('admin_action')}}>
        @csrf
        <h1 class="text-[#2C3333] font-extrabold">login Admin</h1>
        <label class="text-[#2C3333] text-[18px] font-bold" for="">Username*</label>
        <input class="p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="username" name="username">
        <label class="text-[#2C3333] text-[18px] font-bold" for="">password*</label>
        <input class="p-[5px] rounded-lg drop-shadow-xl" type="password" placeholder="password" name="password">
        <p>{{session()->get('msg')}}</p>
        <button class="text-[#F0E9D2] text-[24px] font-bold bg-[#393E46] font-montserrat   hover:text-black border hover:bg-[#F0E9D2] 
        focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 
        " type="submit">Login</button>


    </form>
</div>


@endsection