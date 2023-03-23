@extends('isLogin')

@section('content')
<div class="h-auto flex justify-center items-center p-[10%] ">
    <div class="rounded-xl bg-[#eaeaea] p-[3%] flex flex-row justify-center items-center shadow-xl ">
        <img class=" h-[500px] w-[500px] rounded-xl object-cover" src={{ asset("storage/".$item->image) }} alt="">
        <div class="ml-[10%] w-[500px]">
        <h1>{{$item->itemname}}</h1>  
        <H3>Rp. {{$item->price}}</H3>
        <p>{{$item->description}}</p> 
        <form method="POST" action="">
            @csrf
            <input type="hidden" name="token" value={{$db_token}}>
            <button class="text-[#F0E9D2] text-[24px] font-bold bg-[#393E46] font-montserrat   hover:text-black border hover:bg-[#F0E9D2] 
            focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 
            ">Pesan </button>
    
        </form>
        </div>
       
        
    </div>
</div>

@endsection