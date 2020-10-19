@section('table')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Добавить <b>{{$crud->RouteName}}</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{route($crud->RouteName . '.create')}}" class="btn btn-success">Добавить </a>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    @foreach($crud->ColumnName as $item)
                        <th> {{$item}} </th>
                    @endforeach
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($crud->ColumnName)>0)
                    <?php $flipColumnName = array_flip($crud->ColumnName); ?>
                    @foreach($crud->BodyTable as $item)
                        <tr>
                        @foreach(array_intersect_key($item->getOriginal(),$flipColumnName) as $data)
                            <td>{{$data}}</td>
                        @endforeach
                            <td>
                                <a href="{{route($crud->RouteName. '.show',$item->id)}}" ><img src="{{asset('img/eye.svg')}}" alt="" width="25"></a>
                                <a href="{{route($crud->RouteName. '.edit',$item->id)}}" ><img src="{{asset('img/pencil.svg')}}" alt="" width="25"></a>
                                <a href="{{route($crud->RouteName. '.destroy',$item->id)}}" >
                                    <form style="display: contents" action="{{ route($crud->RouteName . '.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button style="border: none" type="submit"><img src="{{asset('img/trash.svg')}}" alt="" width="25"></button>
                                    </form>

                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
