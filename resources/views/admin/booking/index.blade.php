@extends('admin.layout.main')

@section('content')

<div class="col-lg-12">
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div>
            <h4 class="mb-3">Booking Room List</h4>
            <p class="mb-0">Use category list as to describe your overall core business from the
                provided list. <br>
                Click the name of the category where you want to add a list item. .</p>
        </div>
        {{-- <a href="{{ route('hotels.create') }}" class="btn btn-primary add-list"><i
                class="las la-plus mr-3"></i>Add Hotels</a> --}}
    </div>
</div>

<div class="col-lg-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    <div class="table-responsive rounded mb-3">
        <table class="data-table table mb-0 tbl-server-info">
            <thead class="bg-white text-uppercase">
                <tr class="ligth ligth-data">
                    <th>
                        <div class="checkbox d-inline-block">
                            <input type="checkbox" class="checkbox-input" id="checkbox1">
                            <label for="checkbox1" class="mb-0"></label>
                        </div>
                    </th>
                    <th>STT</th>
                    <th>Room ID</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Now what?</th>
                </tr>
            </thead>
            <tbody class="ligth-body">
                @foreach ($bookings as $p => $booking)
                <tr>
                    <td>
                        <div class="checkbox d-inline-block">
                            <input type="checkbox" class="checkbox-input" id="checkbox10">
                            <label for="checkbox10" class="mb-0"></label>
                        </div>
                    </td>
                    <td>{{$p+1}}</td>
                    <td>{{$booking->room_id}}</td>
                    <td>{{$booking->check_in}}</td>
                    <td>{{$booking->check_out}}</td>
                    <td>{{$booking->guest_name}}</td>
                    <td>{{$booking->guest_email}}</td>
                    {{-- <td>
                        <form action="{{ route('hotels.destroy',$hotel->id) }}" method="post">
                        <div class="d-flex align-items-center list-action">
                            <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                href="#"><i class="ri-eye-line mr-0"></i></a>
                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                href="{{route('hotels.edit',$hotel->id)}}"><i class="ri-pencil-line mr-0"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-warning mr-2 border-0" data-original-title="Delete" style="tab"
                                onclick="return confirm('Xóa là không Ctrl lại cuộc đời ?')">
                                <i class="ri-delete-bin-line mr-0"></i>
                            </button>
                            
                        </div>
                         </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection