@extends('isGuest')

@section('content')
<div class="h-[100vh] bg-[#2C3333] flex justify-center items-center">
   
    <form method="POST" action={{ route('showcase_logout') }}>
        @csrf
        <input type="hidden" name="token" value={{$db_token}}>
        <button>Logout </button>

    </form>
</div>


@endsection