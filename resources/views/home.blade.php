@extends('isGuest')

@section('content')
<div>
    <div class=" bg-[#2C3333]  h-[100vh] flex justify-center items-center ">
        <img class=" h-[500px] w-[500px] mr-[100px]" src={{ asset("storage\images\camera.png") }} alt="" />
        <div class="ml-[200px]">

            <h5 class="text-[#F0B974]  font-bold font-montserrat">Antique Gallery</h5>
            <h1 class="text-[#F0E9D2] text-[60px] font-bold  font-montserrat">Toko Barang Antik <br> Paling Lengkap</h1>
            <p class="text-[#F0E9D2] font-montserrat font-"  >Yuk, temukan harta karun waktu <br>
                di toko kami, dan temukan barang antik <br>
                berkualitas</p>
                <form method="GET" action={{ route('showcase') }}>
                    <button type="submit" class="text-[#F0B974] font-montserrat  hover:text-black border hover:bg-[#F0B974] 
                    focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 
                    ">Toko Kami</button>
                </form>
                
    
        </div>
        
    </div>
    <div class="bg-[#F2F2F2]  h-[100vh] flex justify-center items-center ">
        <div class="mr-[150px]">
            @csrf
            <h5 class="text-[#F0B974]  font-bold font-montserrat">Antique Gallery</h5>
            <h1 class="text-[#393E46] text-[60px] font-bold  font-montserrat">Terpercaya di <br>
                Samarinda</h1>
            <p class="text-[#393E46] font-montserrat font-"  >
                Sejak tahun 1957  toko kami berdiri untuk <br>
                menjual dan membeli barang antik.<br>
                Barang yang di jual telah dicek keaslian<br>
                dan kualitasnya.<br>
                <br>
                Kami juga memiliki staf reparasi bersertifikat<br>
                untuk melakukan perbaikan pada barang<br>
                antik dengan kerusakan kecil sampai sedang.<br>
                Jadi tunggu apalagii?Temukan harta karunmu<br>
                untuk di koleksi.</p>
                <form method="GET" action={{ route('showcase') }}>
                    <button type="submit" class="text-[#F0B974] bg-[#393E46] font-montserrat  hover:text-black border hover:bg-[#F0B974] 
                    focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 
                    ">Tentang Kami</button>
                </form>
                
                
            </div>
            
            <img class=" ml-[50px]" src={{ asset("storage/images/tik2.png") }} alt="" />
    </div>
    
    
</div>


@endsection