@extends('layouts.app')
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
                    <div class="col-md-6 col-xs-4 col-sm-6">
                        
                        <div class="card-body">
                        <div class="card" style="width: 18rem; ">
                            <div class="card-body">
                                <h4 class="card-title">{{$company->name}}</h4>
                                <p class="card-text">{{ $company->address}}</p>
                                <div class="text-center">
                                    <a href="/company/show/{{ $company->id}}" class="btn btn-success">View</a>                    <a href="#" class="btn btn-success text-end">GO</a>
                                </div>
                                <small class="text-muted text-end">{{ number_format($company->distance) }} k.m away</small>
                            </div>
                            </div>
                        </div>
                    </div>
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
                        
                        <div class="card-body">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $featured->name }}</h5>
                                <p class="card-text">{{ $featured->address }}</p>
                                <div class="text-center">
                                    <a href="/company/show/{{ $featured->id}}" class="btn btn-success">View</a>                    <a href="#" class="btn btn-success text-right">GO</a>
                                </div>
                                <small class="text-muted text-end km"> k.m away</small>
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