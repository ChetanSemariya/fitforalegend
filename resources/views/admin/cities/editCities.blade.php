@extends('admin.layout.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>{{ $common['title'] }}</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">{{ $common['title'] }} </li>
                  </ol>
              </div>
          </div>
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title">{{ $common['heading_title'] }}</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form name="StatesForm" id="StatesForm" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="name">State*</label>
                              <select class="form-control" id="state" name="state">
                                <option value="">Select State</option>
                                @foreach($get_states as $value)
                                   <option value={{ $value['id'] }} {{ $value['id'] == $cities['state_id'] ? 'selected' : ''}}>{{ $value['name'] }}</option>
                                @endforeach
                              </select> 
                              @error('name')
                              <div class="col-form-alert-label">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="name">Name*</label>
                              <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $cities['name'])}}" placeholder="Enter City">
                              @error('name')
                              <div class="col-form-alert-label">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                        </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- /.content -->
</div>
@endsection