@extends('main')

@section('content')


<hr>
<div class="col-md-12">
    <h1> My People</h1> 
    <div class="text-right">
        <a  href="/person" class="btn btn-primary"> My People</a>
        <a href="/person/create" class="btn btn-success"> New Person</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
        
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($person as $persons)
        <tr>
           
            <td> {{$persons->name}} </td>
            <td> {{$persons->email}}</td>
        <td> <a href="/person/{{$persons->id}}" class="btn btn-primary" >Details</a>
                <button class="btn btn-danger" id="delete">Delete</button></td>
        </tr>
        @endforeach
    </tbody>
      </table>

      <script>


      
      </script>

@endsection