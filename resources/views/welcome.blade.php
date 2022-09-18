@extends('layouts.app')
<body onload="if (location.search.length < 1){setInterval(function(){ document.getElementById('getloc').submit()}, 6000)}">
@section('content')

<!-- SECTION -->
<div class="section mainn mainn-raised">
		
		
        <!-- container -->
        <div class="container">
        
            <!-- row -->
            <div class="row">
                
                <div class="col-md-6 col-xs-6">

                <div class="card-body text-center card-header">
                            <h3><b>TOP RATED</b></h3>
                </div>
                <div class="row">
                    <!-- starting...... -->
                    @foreach($company as $company)
                    <div class="col-md-6 col-xs-6 col-sm-6">
                        
                        
                        <div class="card" style="width: 18rem; ">
                            <img src="{{ config('$company->image', 'img/bg-banner.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-home"></i>&nbsp;{{$company->name}}</h4>
                                    <p class="card-text"><i class='fas fa-map-marker-alt'></i>&nbsp; {{ $company->address}}</p>
                                    <p class="card-text"><i class='fas fa-phone'></i>&nbsp;{{ $company->phone }}</p>
                                    <div class="row">
                                        <div class="col">
                                                <a href="{{ route('company.show',[$company->id]) }}" class="btn btn-success"><i class="fa-solid fa-circle-arrow-right"></i></a>
                                            
                                                <i class='fa fa-route'></i> &nbsp; {{ number_format($company->distance) }} k.m away
                                        
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
</br>
                    @endforeach
                  
                    
                </div>
            </div>

            <div class="col-md-6 col-xs-6">

                <div class="card-body text-center card-header">
                            <h3><b>FEATURING</b></h3>
                </div>
                <div class="row">

                    @foreach($featured as $featured)
                    <div class="col-md-6 col-xs-6 col-sm-6">
                        
                        <div class="card" style="width: 18rem;">
                            <img src="{{ config('$featured->image', 'img/bg-banner.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-home"></i>&nbsp;{{ $featured->name }}</h5>
                                <p class="card-text"><i class='fas fa-map-marker-alt'></i>&nbsp; {{ $featured->address }}</p>
                                <p class="card-text"><i class='fas fa-phone'></i>&nbsp;{{ $featured->phone }}</p>
                                <div class="row">
                                        <div class="col">
                                            <a href="{{ route('company.show',[$featured->id]) }}" class="btn btn-success"><i class="fa-solid fa-circle-arrow-right"></i></a>
                                        <i class='fas fa-route'></i> &nbsp; {{ number_format($featured->distance) }} k.m away
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
            </div>

               
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- <script>

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
</script> -->
      

@endsection