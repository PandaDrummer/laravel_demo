@section('form')
    <div class="container">
        <form method="post" action="{{ route('decoration.store') }}">
            @csrf
            <div class="form-group">
                <label for="name"> Name:</label>
                <input type="text" class="form-control" name="name" />
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price"/>
            </div>
            <button type="submit" class="btn btn-primary-outline">Add contact</button>
        </form>
    </div>
@endsection
