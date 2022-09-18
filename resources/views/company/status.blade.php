@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card col-md-4">
      <div class="card-body">
        @if (Session('message'))
            <p class="alert alert-success m2-4 mb-2">{{ Session('message') }}</p>
        @endif
@foreach ($company as $row)
        <h1 style="text-align: center;">{{ $row->name }}</h1>
        <form action="{{ url('/status', [$row->id])}}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="status">Change Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0">Not Verify</option> 
                <option value="1">Verified</option>
                <option value="2">Blocked</option>
            </select>
            
          </div>
          <br/>
          <i class="fa fa-archive"></i><input type="submit" value="SUBMIT">
        </form>
  </div>
  @endforeach
</div>
@endsection