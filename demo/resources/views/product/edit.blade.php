
@section('edit')
    <div class="container">
        <form method="post" action="{{ route('product.update',$product->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name"> Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}" />
            </div>

            <div class="form-group">
                <label for="description">description:</label>
                <input type="text" class="form-control" name="description" value="{{ $product->description }}"/>
            </div>
            <div class="form-group">
                <label for="price">Img</label>
                <input type="text" class="form-control" name="price" value="{{ $product->price }}"/>
            </div>

            <div class="form-group">
                <label for="img">Img</label>
                <input type="text" class="form-control" name="img" value="{{ $product->img }}"/>
            </div>
            <button type="submit" class="btn btn-primary-outline">Add contact</button>
        </form>
    </div>
@endsection

