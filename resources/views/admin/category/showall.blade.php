@extends('layouts.admin_frame')
@section('title')
    Create Category
@endsection
@section('main')
        <div class="row">
            <div class="h4">
                Show all categories
            </div>
            @if(session('message'))
                {{ session('message') }}
            @endif
            <hr>
            <br>
            <div class="col-md-10">
                {{ $count }}
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    @foreach($data as $item => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>
                                    <a href="{{ route('category.destroy', ['category' => $value->id]) }}" onclick="event.preventDefault();
                                       document.getElementById('delete').submit();" class="btn btn-danger btn-circle btn-sm">  <i class="fas fa-trash"></i> </a>







                            </td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->description }}</td>
                            {{--<td>{{ $value->img }}</td>--}}
                            <td><img src="{{ $value->img }}" width="100px" height="100px" alt=""> </td>
                            <form id="delete" action="{{ route('category.destroy', ['category' => $value->id]) }}" method="post">
                                {{ method_field('delete') }}
                                @csrf
                            </form>

                        </tr>

                    @endforeach
                </table>


            </div>
        </div>
@endsection
