@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
@if($search->count() > 0)

        @foreach($search as $search)
        <div class="col-md-3 col-xs-4 col-sm-6">
            
            <div class="card" style="width: 18rem;">
                <img src="{{ config('$search->image', 'img/bg-banner.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-home"></i>&nbsp;{{ $search->name }}</h5>
                    <p class="card-text"><i class='fas fa-map-marker-alt'></i>&nbsp; {{ $search->address }}</p>
                    <p class="card-text"><i class='fas fa-phone'></i>&nbsp;{{ $search->phone }}</p>
                    <div class="row">
                            <div class="col">
                                <a href="{{ route('company.show',[$search->id]) }}" class="btn btn-success"><i class="fa-solid fa-circle-arrow-right"></i></a>
                                <i class='fas fa-route'></i>  <span class="km"></span>&nbsp; k.m Away
                            </div>
                            <p class="user-lat" hidden>{{ $search->latitude }}</p>
                            <p class="user-long" hidden>{{ $search->longitude}}</p>
                        </div>
                </div>
            </div>
        </div>
        @endforeach

        @else 
        <h1 class="text-center">No results found</h1>
        @endif
        
        
    </div>
</div>


<script>

  let userLat = document.getElementsByClassName("user-lat");
  let userLong = document.getElementsByClassName("user-long");
  let km = document.getElementsByClassName("km");

  const lng = sessionStorage.getItem("lng");
  const lat = sessionStorage.getItem("lat");
  function addLatAndLong(latitude1, longitude1, latitude2, longitude2) {
          let R = 6371; // km
          let dLat = toRad(latitude2 - latitude1);
          let dLon = toRad(longitude2 - longitude1);
          latitude1 = toRad(latitude1);
          latitude2 = toRad(latitude2);

          let a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
          Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(latitude1) * Math.cos(latitude2);
          let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
          let result = R * c;
          

          function toRad(Value) {
            return Value * Math.PI / 180;
          }

          let i = 0;
          return parseFloat(result).toFixed(2);

    }

    function displayKm() {
      for (let i = 0; i < km.length; i++) {
        km[i].innerHTML = addLatAndLong(lat, lng, userLat[i].innerHTML, userLong[i].innerHTML);
      }
    }

    displayKm();
</script>

    @endsection