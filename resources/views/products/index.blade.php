@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <a href="{{route('products.create')}}">
                Create
            </a>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>
                    <table class="table table-bordered">
                        <tr>
                            <th> Name</th>
                            <th> prise</th>
                            <th> categories</th>
                            <th> edit</th>
                            <th> delete</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    {{$product->name}}
                                </td>
                                <td>
                                    {{$product->prise}}
                                </td>
                                <td>
                                    @foreach($categories as $categorie)
                                        @if($categorie->id ==$product->categories_id){{$categorie->name}}@endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('products.edit',['id'=>$product->id])}}"
                                       class="btn btn-primary">edit</a>
                                </td>
                                <td>
                                    <a href="{{route('products.destroy',['id'=>$product->id])}}"
                                       class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
