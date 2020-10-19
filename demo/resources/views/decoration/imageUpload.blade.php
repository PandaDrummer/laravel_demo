@extends('layouts.back')
@section('content')
    <form action="{{ route('decoration.image.post',$id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-mb-6">
                <input type="file" name="image" >
            </div>

            <div class="col-mb-6">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>

        </div>
    </form>
@endsection
