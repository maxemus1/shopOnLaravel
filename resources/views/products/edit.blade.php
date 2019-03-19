@extends('layouts.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div>
            <a href="{{route('products.create')}}">
                Create
            </a>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">edit products</div>
                    <div>
                        @if($errors)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                        </ul>
                        @endif
                    </div>
                    <form method="POST" action="{{route('products.update',['id'=>$products->id])}}" >
                        {{ csrf_field() }}
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="name" value="{{$products->name}}"/>
                                </td>
                            </tr>
                            <tr>
                                <td>prise</td>
                                <td>
                                    <input type="number" name="prise" value="{{$products->prise}}"/>
                                </td>
                            </tr>
                            <tr>
                                <td>categories</td>
                                <td>
                                    <input type="number" name="categories_id" value="{{$products->categories_id}}"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Submit</td>
                                <td>
                                    <input type="submit"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection



