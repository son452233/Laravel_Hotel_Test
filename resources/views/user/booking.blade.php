@extends('user.layout.main')
@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Booking now</h2>
                        <div class="bt-option">
                            <a href="home.html">Home</a>
                            <span>Booking your room</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="mb-4">Add Book</h2>
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Chọn Mã Phòng</label>
                        <select class="form-select" id="room_id" name="room_id" required>
                            <option value="" selected disabled>Chọn...</option>
                            <!-- Lặp qua biến $rooms để tạo các tùy chọn cho dropdown -->
                            @foreach($rooms as $i => $room)
                                <option value="{{ $room->room_id }}">{{ $room->room_type }}</option>
                            @endforeach
                        </select>
                        @error('room_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Check-in Date</label>
                        <input type="date" class="form-control" id="check_in" name="check_in" required>
                        @error('check_in')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="check_out" class="form-label">Check-out Date</label>
                        <input type="date" class="form-control" id="check_out" name="check_out" required>
                        @error('check_out')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="guest_name" class="form-label">Guest Name</label>
                        <input type="text" class="form-control" id="guest_name" name="guest_name" required>
                        @error('guest_name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="guest_email" class="form-label">Guest Email</label>
                        <input type="email" class="form-control" id="guest_email" name="guest_email" required>
                        @error('guest_email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"  class="btn btn-primary">Add Booking</button>
                </form>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection
