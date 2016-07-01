@include('layouts.header')
@include('layouts.sidebar')
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Edit User list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<div class="row">
<div class="col-md-10">
<div class="pull-right">
<a href="{{url('adduser')}}"><i class="fa fa-plus-square" aria-hidden="true"></i>Add user </a>
</div>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-md-6">
 <form role="form" method="post" action="saveuser">
  <div class="form-group">
    <label for="inputdefault">First-Name</label>
    <input class="form-control" id="inputdefault" value="{{$val->firstname}}"	 name="firstname" type="text" required>
  </div>
  <div class="form-group">
    <label for="inputlg">Last-Name</label>
    <input class="form-control input" id="inputlg" name="lastname" value="{{$val->lastname}}" type="text">
  </div>
 <div class="form-group">
    <label for="inputsm">Mobile Number</label>
    <input class="form-control input-sm" id="inputsm"  name="mobileno" value="{{$val->mobileno}}" type="text" required>
  </div>
 
  <div class="form-group">
    <label for="inputsm">Address</label><br>
<textarea name="address" cols="20" rows="5">value="{{$val->address}}"</textarea>
  </div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit" class="btn btn-info" value="Save User">
</form>
</div>
      </div>
</div>
</div>
<!-- ./wrapper -->
@include('layouts.footer')
