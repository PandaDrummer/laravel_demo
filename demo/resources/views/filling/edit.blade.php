@section('edit')
    <div class="container">
        <form method="post" action="{{ route('filling.update',$filling->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name"> Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $filling->name }}" />
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" value="{{ $filling->price }}"/>
            </div>

            <button type="submit" class="btn btn-primary-outline">Add contact</button>
        </form>
    </div>
@endsection
