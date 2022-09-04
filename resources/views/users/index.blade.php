@extends('layouts.app')

@section('content')

<div class="container">
    <h1>
        Hello <b>{{ Auth::user()->name }}</b>
    </h1>

    <h2>
    E-mail: {{ Auth::user()->email }}    </br>
    
    Status: {{  Auth::user()->status === 0 ? 'Not Verified' : 'Verified'}}
    </h2>
    <p> <a href="{{ url('company/create')}}">Create Business</a></p>


<!-- <ul class="list-group list-group-horizontal">
  <li class="list-group-item">An item</li>
  <li class="list-group-item">A second item</li>
  <li class="list-group-item">A third item</li>
</ul> -->


    <script>
        function display(){
          let  lat = sessionStorage.getItem('lat');
          let  lng = sessionStorage.getItem('lng');
          document.getElementById('lat').value = lat;
        }
    </script>

    
</div>


@endsection