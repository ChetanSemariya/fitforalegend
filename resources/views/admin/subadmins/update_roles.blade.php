@extends('admin.layout.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Sub Admin</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">{{ $title}} </li>
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
                          <h3 class="card-title">{{ $title}}</h3>
                          <a href="{{ url('admin/subadmins')}}">
                            <button onClick="back();"
                                class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger"
                                data-modal="modal-13" style="float: right; background-color:gray; font-weight:bold"> <i class="ti-control-backward m-r-5"></i> Back
                            </button>
                        </a>
                          
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif
                      @if(Session::has('success_message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success:</strong> {{ Session::get('success_message') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>  
                    @endif
                      <form name="subadminForm" id="subadminForm" action="{{ url('admin/update-role/'.$id)}}" method="post">
                      @csrf
                      <input type="hidden" name="subadmin_id" value="{{ $id }}">
                      @if(!empty($subadminRoles))
                      @foreach($subadminRoles as $role)
                        @if($role['module'] =="cms_pages")
                           @if($role['view_access'] == 1)
                              @php $viewCMSPages = "checked" @endphp
                              @else
                              @php $viewCMSPages = "" @endphp
                           @endif
                           @if($role['edit_access'] == 1)
                              @php $editCMSPages = "checked" @endphp
                              @else
                              @php $editCMSPages = "" @endphp
                           @endif
                           @if($role['full_access'] == 1)
                              @php $fullCMSPages = "checked" @endphp
                              @else
                              @php $fullCMSPages = "" @endphp
                           @endif
                        @endif
                        @if($role['module'] =="categories")
                           @if($role['view_access'] == 1)
                              @php $viewCategories = "checked" @endphp
                              @else
                              @php $viewCategories = "" @endphp
                           @endif
                           @if($role['edit_access'] == 1)
                              @php $editCategories = "checked" @endphp
                              @else
                              @php $editCategories = "" @endphp
                           @endif
                           @if($role['full_access'] == 1)
                              @php $fullCategories = "checked" @endphp
                              @else
                              @php $fullCategories = "" @endphp
                           @endif
                        @endif
                        @if($role['module'] =="products")
                           @if($role['view_access'] == 1)
                              @php $viewProducts = "checked" @endphp
                              @else
                              @php $viewProducts = "" @endphp
                           @endif
                           @if($role['edit_access'] == 1)
                              @php $editProducts = "checked" @endphp
                              @else
                              @php $editProducts = "" @endphp
                           @endif
                           @if($role['full_access'] == 1)
                              @php $fullProducts = "checked" @endphp
                              @else
                              @php $fullProducts = "" @endphp
                           @endif
                        @endif
                      @endforeach
                      @endif
                      <div class="card-body">
                        <div class="form-group col-md-6">
                            <label for="cms_pages">CMS Pages: &nbsp;&nbsp;&nbsp;</label>
                            <input type="checkbox" name="cms_pages['view']" value="1" @if(isset($viewCMSPages)) {{$viewCMSPages}} @endif>&nbsp;&nbsp; View Access &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="cms_pages['edit']" value="1" @if(isset($editCMSPages)) {{$editCMSPages}} @endif>&nbsp;&nbsp; View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="cms_pages['full']" value="1" @if(isset($fullCMSPages)) {{$fullCMSPages}} @endif>&nbsp;&nbsp; Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="form-group col-md-6">
                            <label for="categories">Categories: &nbsp;&nbsp;&nbsp;</label>
                            <input type="checkbox" name="categories['view']" value="1" @if(isset($viewCategories)) {{$viewCategories}} @endif>&nbsp;&nbsp; View Access &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="categories['edit']" value="1" @if(isset($editCategories)) {{$editCategories}} @endif>&nbsp;&nbsp; View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="categories['full']" value="1" @if(isset($fullCategories)) {{$fullCategories}} @endif>&nbsp;&nbsp; Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="form-group col-md-6">
                            <label for="products">Products: &nbsp;&nbsp;&nbsp;</label>
                            <input type="checkbox" name="products['view']" value="1" @if(isset($viewProducts)) {{$viewProducts}} @endif>&nbsp;&nbsp; View Access &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="products['edit']" value="1" @if(isset($editProducts)) {{$editProducts}} @endif>&nbsp;&nbsp; View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="products['full']" value="1" @if(isset($fullProducts)) {{$fullProducts}} @endif>&nbsp;&nbsp; Full Access &nbsp;&nbsp;&nbsp;&nbsp;
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