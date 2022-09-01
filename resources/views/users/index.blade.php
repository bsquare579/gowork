@extends('layouts.app')

@section('content')

<div class="container">
    <h1>
        Hello <b>{{ Auth::user()->name }}</b>
    </h1>

    <h2>
    E-mail: {{ Auth::user()->email }}    
    </h2>
    <h3 id="lat">

    </h3>
    <script>
        function display(){
          let  lat = sessionStorage.getItem('lat');
          let  lng = sessionStorage.getItem('lng');
          document.getElementById('lat').value = lat;
        }
    </script>

    
</div>


@endsection