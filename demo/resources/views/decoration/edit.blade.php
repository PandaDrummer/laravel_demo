@section('edit')
    <div class="container">
        <form method="post" action="{{ route('decoration.update',$decoration->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name"> Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $decoration->name }}" />
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" value="{{ $decoration->price }}"/>
            </div>

            <button type="submit" class="btn btn-primary-outline">Add contact</button>
        </form>
    </div>
@endsection
