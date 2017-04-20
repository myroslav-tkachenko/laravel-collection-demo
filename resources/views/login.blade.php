@extends ('layouts.master')

@section ('content')

<h1 class="text-center">LOGIN</h1>

<div class="panel panel-default">
    <div class="panel-body">
        <form action="/login" method="POST" class="form-horizontal" role="form">

            {{ csrf_field() }}
            <!--<input type="hidden" name="_METHOD" value="PUT"/>-->
            
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-10">
                    <input type="text" name="email" id="email" class="form-control" value="" required="required" title="">
                </div>
            </div>

            <div class="form-group">
                <label for="link" class="col-sm-2 control-label">Password:</label>
                <div class="col-sm-10">
                    <input type="text" name="password" id="password" class="form-control" value="" required="required" title="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
