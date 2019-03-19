@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <a href="/products/create">
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
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
