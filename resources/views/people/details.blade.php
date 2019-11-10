@extends('main')

@section('content')

<div class="text-right" style="padding-top:3%;">
        <a  href="/person" class="btn btn-primary"> My People</a>
        <a href="/person/create" class="btn btn-success"> New Person</a>
</div>
<hr>

<form method="put" action="/person/{{$people->id}}"  id="update">
        @csrf
        
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="name" id="name" value="{{$people->name}}">
          </div>
        </div>
        <div class="form-group row">
                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control"  name="email" id="Email" value="{{$people->email}}" >
                </div>
        </div>

        <input type="hidden" value="{{$people->id}}" name="id">

        <button type="submit" class="btn btn-primary" >Update</button>
        <a href="/person" class="btn btn-danger" >Back</a>

</form>

<script type="text/javascript">
    $(document).ready(function() {
      var myForm = $("form#update");
      myForm.submit(function(e) {
          e.preventDefault();
          $.ajax({
              type: 'put',
              url: myForm.attr('action'),
              data: myForm.serialize(),
              success: function(data) {
                Swal.fire(
                  'Good job!',
                  'User Created Successfully!',
                  'success'
                ).then((result) => {
                window.location.href = "{{route('person.index')}}";
            })
          },
              error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire(
                  'Error!',
                  'Fix it boi!',
                  'error'
                ).then((result) => {
                location.reload();
            })
              }
          });
      });
    });
</script>

@endsection