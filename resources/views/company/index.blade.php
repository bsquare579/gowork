@extends('layouts.app')
<!-- <body onload="if (location.search.length < 1){setInterval(function(){ document.getElementById('getloc').submit()}, 6000)}"> -->
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

    <a href="{{ route('company.create')}}" ><button class="btn btn-primary" style="float: right">ADD NEW COMPANY</button></a>
    <br>
    <form action="{{url('/company/search')}}" method="GET">
      <input type="text" name="name" id="name" placeholder="Search by name">
      <input type="email" name="email" id="email" placeholder="Search by email">
      <input type="text" name="phone" id="phone" placeholder="Search by phone">
      <input type="date" name="date" id="date" placeholder="Search by date">
      <button type="submit" class="btn btn-primary">Submit <i class="fa fa-archive"></i></button>
    </form>


  <table class="table">

    
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Company Name</th>
    <th scope="col">Email</th>
    <th scope="col">Address</th>
    <th scope="col">Phone Number</th>
    <th scope="col">Date Registered</th>
    <th scope="col">Status</th>
    <th scope="col-3">Action</th>
 
  </tr>
</thead>

<tbody>
    @foreach($company as $company)
    <?php
    if($company->status == '0'){
      $color = 'btn btn-warning';

    }
    else if($company->status == '1' ){
      $color = 'btn btn-success';
    }else {
      $color = 'btn btn-danger';
    }
    ?>
    <?php
    if($company->status == '0'){
      $company->status = 'Not Verified';

    }
    else if($company->status == '1' ){
      $company->status = 'Verified';
    }else {
      $company->status = 'Blocked';
    }
    ?>
     
  <tr>
    <td scope="row">{{ $loop->iteration }}</td>
    <td>{{ $company->name }}</td>
    <td>{{ $company->email}}</td>
    <td>{{ $company->address}}</td>
    <td>{{ $company->phone}}</td> <td>{{ $company->created_at }}</td>
    <td><button type="button" class="{{ $color}}">{{ $company->status }}</button></td>
    <td>
        
      
    <a class="btn btn-success edit" href="{{ route('company.edit', [$company->id]) }}"><i class="fa-solid fa-edit"></i></a>
    <a class="btn btn-primary" href="{{ route('status', [$company->id]) }}"><i class="fa-solid fa-cog"></i></a>
    <a class="btn btn-danger" href="{{ route('company.delete', [$company->id]) }}" onclick="return confirm('Are you sure you want to delete the company')"><i class="fa-solid fa-trash"></i></a>
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
</html>