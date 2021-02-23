@extends('layouts.admin_frame')
@section('title')
    Subcategory Manager
@endsection
@section('main')
    <div class="row">
        <div class="col-md-6">
            <div class="border shadow p-4">
                <div class="h4 text-dark font-weight-bolder">Subcategory Create</div>
                <hr>
                <form action="{{route('subcategory.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Select category Name</label>
                    <select name="categories_id" id="categories_id" required class="form-control">
                        <option value="">Select</option>
                        @foreach($cat_data as $cat_item => $cat_value)
                            <option value=" {{ $cat_value->id }} "> {{ $cat_value->name }}</option>
                        @endforeach
                    </select>

                    <label for="name">Enter Subcategory Name</label>
                    <input type="text" name="name" id="name" class="form-control mb-4" required>
                    <label for="name">Enter Subcategory Details</label>
                    <input type="text" name="description" id="description" class="form-control mb-4" required>
                    <label for="image">Upload Image:</label>
                    <input type="file" name="image" id="image" class="form-control mb-4" required accept="image/jpeg">
                    <input type="submit" value="Create" class="btn btn-success fas fa-check">
                </form>
            </div>
        </div>


        <div class="col-md-6">
            <div class="border shadow p-4">
                <div class="h4 font-weight-bolder text-dark">All Registered Subcategory <p class="float-lg-right">{{$count}}</p> </div>
                <hr>
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($datas as $data => $value)
                        <tr>
                            <td> {{ $value->id }} </td>
                            <td> {{ $value->name }} </td>
                            <td>
                                <a href="{{ route('subcategory.destroy', $value->id) }}"
                                   onclick="event.preventDefault();
                                document.getElementById('brand-delete').submit()">

                                    <i class="fas fa-trash"></i> </a>
                            </td>
                        </tr>
                        <form id="brand-delete" action="{{ route('subcategory.destroy', $value->id) }}" method="post">
                            {{method_field('delete')}}
                            @csrf
                        </form>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
