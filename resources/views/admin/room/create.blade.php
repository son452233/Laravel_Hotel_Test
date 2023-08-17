@extends('admin.layout.main')
@section('content')
  <div class="container-fluid add-form-list">
      <div class="row">
          <div class="col-sm-12">
              <div class="card">
                  <div class="card-header d-flex justify-content-between">
                      <div class="header-title">
                          <h4 class="card-title">Add new Room</h4>
                      </div>
                  </div>
                    <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Room ID*</label>
                                    <input type="text" class="form-control" placeholder="Enter Room ID" name="room_id">
                                    @error('room_id')
                                    <div class="help-block with-errors">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Hotel Name*</label>
                                    <select class="form-control" name="hotel_id">
                                        <option value="">Select a Hotel Name</option>
                                        @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                   
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Room Number*</label>
                                    <input type="text" class="form-control" placeholder="Enter Room Number" name="room_number">
                                    @error('room_number')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Room Type*</label>
                                    <input type="text" class="form-control" placeholder="Enter Room Type" name="room_type" data-errors="Please Enter Cost.">
                                    @error('room_type')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Price Per Night*</label>
                                    <input type="text" class="form-control" placeholder="Enter Price Per Night" name="price_per_night">
                                    @error('price_per_night')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Room Image</label>
                                    <input type="file" class="form-control" placeholder="Enter Room Image URL" name="room_image">
                                    @error('room_image')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" name="nut" value="nut">Add Room</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="" class="btn btn-primary">List Rooms</a>
                            <!-- @if(session('status'))
                            <div class="alert alert-success mb-1 mt-1">
                             {{ session('status') }}
                             </div>
                             @endif -->
                    </form>                    
                  </div>
              </div>
          </div>
      </div>
      <!-- Page end  -->
  </div>
@endsection