@extends('isLogin')

@section('content')
<div class=" bg-[#2C3333]  h-[100vh] flex justify-center items-center ">
    <form class="drop-shadow-xl z-0 bg-[#D9D9D9] font-montserrat flex rounded-[20px] justify-left items-left flex-col p-[50px]" method="post" enctype="multipart/form-data" action={{ route('edit_action') }}>
            @csrf
            <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Item Name</label>
            <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="itemname" name="itemname" value="{{$items->itemname}}">
            <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="hidden" placeholder="itemname" name="id" value="{{$items->id}}">
            <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Quantity</label>
            <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="quantity" name="quantity" value="{{$items->quantity}}">
            <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Price</label>
            <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="price" name="price" value="{{$items->price}}">
            <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Tag</label>
            <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="tag" name="tag" value="{{$items->tag}}">
            <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Image</label>
            <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="file" placeholder="image" name="image">
            <label class="m-[5px] text-[#2C3333] text-[18px] font-bold" for="">Description</label>
            <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="text" placeholder="description" name="description"value="{{$items->description}}">
            <i>{{session()->get('msg')}}</i>
            <button class="m-[5px] text-[#F0E9D2] text-[24px] font-bold bg-[#393E46] font-montserrat   hover:text-black border hover:bg-[#F0E9D2] 
            focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 
            " type="submit">submit</button>
        
        
        </form>
        
</div>
@endsection