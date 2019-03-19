@extends('layouts.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div>
            <a href="/products/create">
                Create
            </a>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create products</div>
                    <form method="POST" action="/products/store" >
                        {{ csrf_field() }}
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="name"/>
                                </td>
                            </tr>
                            <tr>
                                <td>prise</td>
                                <td>
                                    <input type="number" name="prise"/>
                                </td>
                            </tr>
                            <tr>
                                <td>categories</td>
                                <td>
                                    <input type="number" name="categories_id"/>
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



