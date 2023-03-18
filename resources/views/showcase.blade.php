@extends('isLogin')

@section('content')
<div class="h-[auto] p-[100px] bg-[#D9D9D9] drop-shadow-xl flex  flex-wrap  justify-center ">
   @foreach ($items as $item)
       <div class="p-[20px] rounded-[20px]  m-[20px] h-[300px] w-[300px] bg-[#F2F2F2] flex justify-center items-center flex-col">
           <img  class=" w-[auto] h-[auto] " src={{ asset("storage/".$item->image) }} alt="" />
           <h5>{{$item->itemname}}</h5>
       </div>
   @endforeach
    
</div>


@endsection