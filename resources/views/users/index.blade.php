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
    <h2 class="text-center">MY BUSINESSES</h2>
    <div class="text-end">
      <h5>
        <a href="{{ route('users.company.create')}}">Create Business</a>
      </h5>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($company as $company)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->address }}</td>
            <td>{{ $company->phone }}</td>
            <td>{{ $company->status === 0 ? 'Pending' : 'Approved' }}</td>
            <td>
              <a href="{{ route('user.company',[$company->id]) }}"><i class="fa fa-edit"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    

</div>


@endsection