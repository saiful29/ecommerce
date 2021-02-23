@extends('layouts.admin_frame')
@section('title')
    Create Category
    @endsection
@section('page_title')
    Category Manager
    @endsection
@section('main')
        <div class="row">
            <div class="col-md-8">
                <div class="border shadow p-5">
                    <div class="h4 mb-3">Create New category</div>
                    @if(session('message'))
                        <div class="p-2 bg-info text-light m-2">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form action="{{ route('category.index') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">


                            <label for="name">Enter Category Name: </label>
                            <input type="text" name="name" id="name" class="form-control">


                        </div>

                        <div class="mb-3">


                            <label for="description">Enter Category Description: </label>
                            <textarea name="description" id="description" cols="30" rows="6" class="form-control"></textarea>


                        </div>

                        <div class="mb-3">

                            <label for="img">Upload Image (Jpg/Jegp Formate): </label>
                            <input type="file" accept="image/jpeg" name="image" id="image" class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <input type="submit" name="submit" value="Create" id="submit" class="btn form-control btn-success">

                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
