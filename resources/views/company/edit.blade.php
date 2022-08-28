@extends('layouts.app')
        @section('content')
<div class="container mt-4">
    <div class="card col-md-6">
      <div class="card-body">
       
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

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete&language=eng&output=json&key={{ env('API_KEY') }}&callback=initAutocomplete" async defer></script>


        <h2>Edit Bussiness</h2>
        @foreach ($company as $row)

        <form action="{{ url('/company', $row->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control col-lg-9" id="name" placeholder="Enter Bussiness Name" name="name" value="{{$row->name}}" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control col-lg-9" id="email" placeholder="Enter Your Email" name="email" value="{{$row->email}}" required>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control col-lg-9" id="address" spellcheck="false" autocomplete="off" placeholder="Enter Bussiness Address" name="address" value="{{$row->address}}" required>
          </div>
          <!-- <div class="form-group">
            <label for="latitude">Latitude</label> -->
            <input type="hidden" class="form-control col-lg-9" id="latitude" placeholder="Get Latitude" name="latitude" value="{{$row->latitude}}" readonly required>
          <!-- </div>
          <div class="form-group">
            <label for="Longitude">Longitude</label> -->
            <input type="hidden" class="form-control col-lg-9" id="longitude" placeholder="Get Longitude" name="longitude" value="{{$row->longitude}}" readonly required>
          <!-- </div> -->
          
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel"  maxlength="11" minlength="11" class="form-control col-lg-9" id="phone" placeholder="Enter Your Phone No" name="phone" value="{{$row->phone}}" required>
          </div>

          <br/>
          <button type="submit" class="btn btn-primary">Submit</button>&ensp;<a href="/company/create"><button type="button" class="btn btn-primary"> Register New Bussiness</button></a>
        </form>
        @endforeach
  </div>
</div>
<script>
  function initAutocomplete() {


var address = document.getElementById('address');
var options = {
componentRestrictions: {country: ['ng']}
};

var autocomplete = new google.maps.places.Autocomplete(address, options);

autocomplete.addListener('place_changed', function() {
  var place = autocomplete.getPlace();
  var latitude = place.geometry.location.lat();
  var longitude = place.geometry.location.lng();;
  document.getElementById('latitude').value = latitude;
  document.getElementById('longitude').value = longitude;
  
});

}

</script>

@endsection