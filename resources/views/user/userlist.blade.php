@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.functions')

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<!--
      <h1>
        Dashboard
        <small>User list</small>
      </h1>
-->
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
@include('layouts.message')
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Role</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Mobileno</th>
      <th>Email</th>
      <th>Company</th>
      <th>Createby</th>
      <th>Status</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=1;
//print_r($user_data);exit;?>
@foreach($user_data as $val)  
    <tr>
      <th scope="row">{{$i}}</th> 
      <td>
          <?php 
          if($val->role_id==2)
          {
     echo "Admin";
          }
     else  
     {
     echo "User";
     }
     
          ?></td>
      <td>{{$val->firstname}}</td>
      <td>{{$val->lastname}}</td>
      <td>{{$val->mobileno}}</td>
      <td>{{$val->email}}</td>
            <td>{{$val->company_name}}</td>
      <td>@if($val->status==1)
      Active
      @else
      Deactive
      @endif
      </td>


  					       <input type="hidden" value="userlist" name="route">

      <td><button type="button"  data-toggle="modal" data-target="#myModal{{$val->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
      <td><a href="{{URL::to('deluser/'.$val->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></td>

    </tr>

<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal{{$val->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
<form role="form" method="post" action="Updateuser">
  <div class="form-group">
    <label for="inputdefault">First Name</label>
    <input class="form-control" id="inputdefault" value="{{$val->firstname}}"	 name="user[firstname]" type="text" required>
  </div>
    <div class="form-group">
    <label for="inputdefault">Last Name</label>
    <input class="form-control" id="inputdefault" value="{{$val->lastname}}"	 name="user[lastname]" type="text" required>
  </div>
  <div class="form-group">
    <label for="inputlg">E-mail</label>
    <input class="form-control input" id="inputlg" name="user[email]" value="{{$val->email}}" type="text">
  </div>
 <div class="form-group">
    <label for="inputsm">Mobile Number</label>
    <input class="form-control input-sm" id="inputsm"  name="user[mobileno]" value="{{$val->mobileno}}" type="text" required>
  </div>
 <div class="form-group">
	     <label for="inputsm">Status</label>

		<select name="user[status]" style='width:250px'>
			<option value="1">Active</option>
			<option value="0">Deactive</option>
		</select>
</div>
  <div class="form-group">
    <label for="inputsm">Address</label><br>
<textarea name="user[address]" cols="20" rows="5">{{$val->address}}</textarea>
  </div>
    <input value="{{$val->id}}"	 name="id" type="hidden" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
      </div>
 					       <input type="hidden" value="userlist" name="route">

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-info" value="Update User">
</form>

      </div>
    </div>

  </div>
</div>
<?php $i++; ?>
@endforeach
  </tbody>
</table>

</div>
      </div>
</div>
</div>
<!-- ./wrapper -->
@include('layouts.footer')
