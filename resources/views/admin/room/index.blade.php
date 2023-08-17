@extends('admin.layout.main')

@section('content')

<div class="col-lg-12">
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div>
            <h4 class="mb-3">Room List</h4>
            <p class="mb-0">Use category list as to describe your overall core business from the
                provided list. <br>
                Click the name of the category where you want to add a list item. .</p>
        </div>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary add-list"><i
                class="las la-plus mr-3"></i>Add Room</a>
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
                    <th>Room ID</th>
                    <th>Hotel ID</th>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Price Per Night</th>
                    <th>Room Image</th>
                    <th>Now what?</th>
                </tr>
            </thead>
            <tbody class="ligth-body">
                @foreach ($rooms as $i => $room)
                <tr>
                    <td>
                        <div class="checkbox d-inline-block">
                            <input type="checkbox" class="checkbox-input" id="checkbox10">
                            <label for="checkbox10" class="mb-0"></label>
                        </div>
                    </td>
                    <th>{{$room->room_id}}</th>
                    <th>{{$room->hotel_id}}</th>
                    <th>{{$room->room_number}}</th>
                    <th>{{$room->room_type}}</th>
                    <th>{{$room->price_per_night}}</th>
                    <th><img src="{{ asset($room->room_image) }}" style="height: 50px;width:50px;"></th>
                    <td>
                        <div class="d-flex align-items-center list-action">
                            <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                href="#"><i class="ri-eye-line mr-0"></i></a>
                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                href="{{route('rooms.edit',$room->room_id)}}"><i class="ri-pencil-line mr-0"></i></a>
                            <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                href="" onclick="return confirm('Xóa là không Ctrl lại cuộc đời ?')"><i class="ri-delete-bin-line mr-0"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection