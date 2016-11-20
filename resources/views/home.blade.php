@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 color">
            <div class="panel panel-default">
                <div class="panel-heading">SQLInjection:</div>

                <div class="panel-body">
                    <p>When SQL is used to display data on a web page, it is common to let web users input their own search values.

                        Since SQL statements are text only, it is easy, with a little piece of computer code, to dynamically change SQL statements to provide the user with selected data
                    </p>

                    <p>
                        SQL Injection Based on 1=1 is Always True

                        Let's say that the original purpose of the code was to create an SQL statement to select a user with a given user id.

                        If there is nothing to prevent a user from entering "wrong" input, the user can enter some "smart" input like this:

                        <p><b>1 or 1=1</b></p>
                    </p>

                    <form action="{{ url('sql-injection-vulnerable') }}" method="post">


                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control" name="user_id" value="{{ old('user_id') }}">

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Do SQL Injection
                                </button>
                            </div>

                            @if(isset($results))
                                @foreach($results as $result)
                                  <div class="col-md-12 alert-danger">
                                     ID: {{ $result->id }}
                                     Name: {{ $result->name }}
                                     Email: {{ $result->email }}

                                  </div>
                                @endforeach
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cross-site Request Forgery</div>

                <div class="panel-body">

                    <p>
                        Cross-site request forgery (CSRF) attacks are conducted by targeting a URL that has side effects (that is, it is performing an action and not just displaying information).
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cross-Site scripting (XSS)</div>

                <div class="panel-body">

                    <p>
                        Cross-site scripting (XSS) attacks happen when attackers are able to place client-side JavaScript code in a page viewed by other users.</p>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/add-product') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                            <label for="product_name" class="col-md-4 control-label">Product Name</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" required autofocus>

                                @if ($errors->has('product_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control" name="quantity" required>

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" required>

                                @if($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

                <div style="margin-left: 30%;">
                @if($products->count())
                    <table>
                        <thead>
                            <tr>
                                <td>
                                    Product Name
                                </td>
                                <td>
                                    Product Quantity
                                </td>
                                <td>
                                    Product Price
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h4>No products</h4>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
