@extends('isLogin')

@section('content')
<div class="bg-[#F2F2F2]  h-[100vh] flex justify-center items-center " >
   
    <form method="POST" action={{ route('logout') }}>
        @csrf
        <h1>Hallo Admin</h1>
        <input type="hidden" name="token" value={{$db_token}}>
        <i>{{session()->get('msg')}}</i>
        <button>Logout </button>

    </form>
</div>
<div class=" bg-[#2C3333]  h-[100vh] flex justify-center items-center ">
        <form class="drop-shadow-xl z-0 bg-[#D9D9D9] font-montserrat flex rounded-[20px] justify-left items-left flex-col p-[50px]" method="POST" enctype="multipart/form-data" action={{ route('dashboard_action') }}>
                @csrf
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
         @foreach ($items as $item)
            <tr>
                <td>{{$item->itemname}}</td>
                <td>{{$item->image}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->tag}}</td>
                

                <td>
                    <div>
                        
                        <form method="post" action={{route('item_delete')}}>
                            @csrf
                            <input type="hidden" name="id" value={{$item->id}}>
                            <button type="submit">Delete</button>
                        </form>
                        
                        <form method="get" action={{route('edit_form')}}>
                            @csrf
                            <input type="hidden" name="id" value={{$item->id}}>
                            <button type="submit">Edit</button>
                        </form>
                        
                        
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
                
        </div>
    



@endsection