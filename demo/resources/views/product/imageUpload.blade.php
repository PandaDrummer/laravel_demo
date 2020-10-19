@extends('layouts.back')
@section('content')
    <form action="{{ route('product.image.post',$id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=«row»>
            <div class=«col-md-6»>
                <input type="file" name="image" >
            </div>

            <div class=«col-md-6»>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>

        </div>
    </form>
@endsection