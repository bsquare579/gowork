@extends('layouts.app')
<body onload="if (location.search.length < 1){setInterval(function(){ document.getElementById('getloc').submit()}, 6000)}">
@section('content')
<body>
  
@if(Session('message'))
<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000" >
      <div class="toast-header">
        <strong class="me-auto">{{ Session::get('alert-class') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        <strong> {{ Session('message') }} </strong>
      </div>
</div>
  @endif

    <br/>

  <div class="alert container-md alert-dismissible">
     </div>


<a href="/create" ><button class="btn btn-primary" style="float: right">ADD NEW COMPANY</button></a>
<br>
<form action="/search" method="GET">
  <input type="text" name="name" id="name" placeholder="Search by name">
  <input type="email" name="email" id="email" placeholder="Search by email">
  <input type="text" name="phone" id="phone" placeholder="Search by phone">
  <input type="date" name="date" id="date" placeholder="Search by date"> 
  <input type="submit">
</form>


  <table class="table">

    
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Company Name</th>
    <th scope="col">Email</th>
    <th scope="col">Address</th>
    <th scope="col">Phone Number</th>
    <th scope="col">Distance</th>
    <th scope="col">Date Registered</th>
    <th scope="col">Status</th>
    <th scope="col-3">Action</th>
 
  </tr>
</thead>

<tbody>
    @foreach($company as $company)
    <?php
    if($company->status == '0'){
      $company->status = 'Not Verified';

    }
    else if($company->status == '1' ){
      $company->status = 'Verified';
    }else {
      $company->status = 'Undefined';
    }
    ?>
  <tr>
    <td>{{ $company->id }}</td>
    <td>{{ $company->name }}</td>
    <td>{{ $company->email}}</td>
    <td>{{ $company->address}}</td>
    <td>{{ $company->phone}}</td>
    <td><a href="http://maps.google.com/?q={{$company->latitude}} + ',' + {{$company->longitude}}"></a>{{ number_format($company->distance)}}</span>K.M</td>
    <td>{{ $company->created_at }}</td>
    <td>{{ $company->status }}</td>
    <td>
        
      
    <a class="btn btn-success edit" href="/company/edit/{{$company->id}}"><i class="fa-solid fa-pencil"></i></a>
    <a class="btn btn-primary" href="./status<%=data[i].id%>"><i class="fa-solid fa-cog"></i></a>
    
    <a class="btn btn-danger" href="/company/{{$company->id}}"  onclick="return confirm('Are you sure you want to delete the company')"><i class="fa-solid fa-trash"></i></a>
  </form>
   </td>
  </tr>
  @endforeach
  
  <!-- <% }
           
   }else{ %>
       <tr>
          <td colspan="3">No Information</td>
       </tr>
    <% } %>     -->
  
</tbody>
</table>
  </div>
</body>
@endsection
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
</html>