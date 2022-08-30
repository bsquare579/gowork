@extends('layouts.app')
        @section('content')
<div class="container-fluid">
        @foreach($company as $company)
        
       
        <p>{{ $company->name}}</p></br>
        <p>{{ $company->email}}</p></br>
        <p>{{ $company->address}}</p></br>
        <p class="user-lat" hidden>{{ $company->latitude }}</p>
        <p class="user-long" hidden>{{ $company->longitude}}</p>
        <p><strong> {{ $company->phone}}</strong></p>
        <ul class="list-group">
        <li class="list-group-item"><p><a href="http://maps.google.com/?q={{ $company->latitude }},{{ $company->longitude}}"><i class="fa fa-map-marker"></i></p></li>
        <li class="list-group-item"><p><a href="http://www.google.com/search?q={{ $company->phone }}"><i class="fa fa-whatsapp"></i></a></p></li>
        <li class="list-group-item"><p><a href="tel://{{ $company->phone }}"><i class="fa fa-phone"></i></a></p></li>
        </ul>
</br>

        <span class="km"></span> k.m Away</br>
        

        @endforeach
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