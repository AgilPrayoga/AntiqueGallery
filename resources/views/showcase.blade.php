@extends('isLogin')

@section('content')
<a href="">
    <div class="h-[auto] p-[150px] bg-[#D9D9D9] drop-shadow-lg flex  flex-wrap  justify-center ">
    <div class="h-auto w-auto">
        <img  class="drop-shadow-lg rounded-[20px] w-[auto] h-[auto] hover:animate-pulse m-2" src="storage/images/banner.png" alt="" />
    </div>
</a>

   @foreach ($items as $item)
   <a class="no-underline text-[#2C3333]"href="">
       <div class=" w-[300px] h-[300px] flex flex-col justify-center font-montserrat m-2  bg-[#ffff] p-[10px] rounded-xl hover:w-[320px] h-[320px] transition-all lg:w-[200px] lg:h-[200px] lg:hover:w-[210px] lg:hover:h-[210px] lg:transition-all">
        <div class="  h-[190px] lg:h-[105px]  flex justify-center">
            <img  class=" rounded-xl object-cover " src={{ asset("storage/".$item->image) }} alt="" />
        </div>
        
        <div class="h-[100px] w-[300px]">
            <h6 class="m-[2px] lg:text-[14px] " >{{$item->itemname}}</h6>
            <h6 class="font-bold lg:text-[14px]">Rp{{$item->price}}</h6>
            <form method="POST" action="#">
                @csrf
                <button class="drop-shadow-lg text-[#F0E9D2] text-[18px] font-bold bg-[#393E46] font-montserrat   hover:text-black border hover:bg-[#F0E9D2] 
                focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-1 text-center mr-2 mb-2 
                ">Pesan </button>
        
            </form>
        </div>
        
       </div>
    </a>
   @endforeach
    
</div>


@endsection