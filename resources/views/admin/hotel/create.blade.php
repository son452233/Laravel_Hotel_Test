@extends('admin.layout.main')
@section('content')
  <div class="container-fluid add-form-list">
      <div class="row">
          <div class="col-sm-12">
              <div class="card">
                  <div class="card-header d-flex justify-content-between">
                      <div class="header-title">
                          <h4 class="card-title">Add new Hotel</h4>
                      </div>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('hotels.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Thêm các trường của bảng hotels vào đây --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" class="form-control" placeholder="Enter Hotel Name" name="name">
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address*</label>
                                    <input type="text" class="form-control" placeholder="Enter Hotel Address" name="address">
                                    @error('address')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Phone*</label>
                                    <input type="text" class="form-control" placeholder="Enter Hotel Phone" name="phone">
                                    @error('phone')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input type="email" class="form-control" placeholder="Enter Hotel Email" name="email">
                                    @error('email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" placeholder="Enter Hotel Image URL" name="image">
                                    @error('image')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter Hotel Description" name="description"></textarea>
                                    @error('description')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" name="nut" value="nut">Add Hotel</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="{{ route('hotels.index') }}" class="btn btn-primary">List Hotels</a>
                    </form> 
                  </div>                   
                  </div>
              </div>
          </div>
      </div>
      <!-- Page end  -->
  </div>
@endsection