@section('edit')
    <div class="container">
        <form method="post" action="{{ route('shape.update',$shape->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name"> Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $shape->name }}" />
            </div>

            <div class="form-group">
                <label for="description">description:</label>
                <input type="text" class="form-control" name="description" value="{{ $shape->description }}"/>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" value="{{ $shape->price }}"/>
            </div>

            <button type="submit" class="btn btn-primary-outline">Add contact</button>
        </form>
    </div>
@endsection