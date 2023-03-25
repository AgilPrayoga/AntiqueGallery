@extends ('isLogin')


@section('content')
<div class="h-[100vh] flex justify-center items-center">
    <form class="drop-shadow-xl z-0 bg-[#D9D9D9] font-montserrat flex rounded-[20px] justify-left items-left flex-col p-[50px] xl:px-[80px]" method="POST" action={{route('edit_profile') }}>
        @csrf
        <h1 class="font-bold mb-[50px]">Ubah Profile</h1>
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold xl:w-[500px]" for="">UserName</label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="username" name="username" value="{{$users->username}}">
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="hidden" placeholder="username" name="id" value="{{$users->id}}">
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Email</label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="Email" name="email" value="{{$users->email}}">
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">No-telp</label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="No-Telp" name="Notlep" value="{{$users->Notelp}}">
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Alamat</label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="Alamat" name="alamat" value="{{$users->alamat}}">
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Password Lama</label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="******" name="oldpassword">
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Password Baru</label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="******" name="password"value="">
        <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Konfirmasi Password Baru</label>
        <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="******" name="password_confirmation"value="">

        <i>{{session()->get('msg')}}</i>

        <button class="m-[5px] text-[#F0E9D2] text-[24px] font-bold bg-[#393E46] font-montserrat   hover:text-black border hover:bg-[#F0E9D2] 
        focus:ring-yellow-300  rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 
        " type="submit">Edit</button>
    
    
    </form>
</div>
    
@endsection