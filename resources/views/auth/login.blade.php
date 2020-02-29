@extends('layouts.app')

@section('content')
@guest
<div class="container" ng-controller="Login_Controller">
    <div class="col-sm-4 border rounded float-right" id="login-border">
        <form class="text-center border border-light p-5" ng-submit="login_form.$valid && Login_User(username,password)" name="login_form">
             <p class="h4 mb-4">Sign in</p>
                <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Username" ng-model="username" ng-required="true">
                <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" ng-model="password" ng-required="true">
            <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>
            <p>Not a member?
                <a href="/register">Register</a>
            </p>    
        </form>
    </div>
</div>

@elseif(Auth()->user()->user_type == 'operator')
                     <script type="text/javascript">
                        console.log("Admin");
                        window.location.href="operator";
                    </script>
@elseif(Auth()->user()->user_type == 'techstaff')
                     <script type="text/javascript">
                        console.log("techstaff");
                        window.location.href="techstaff";
                    </script>

@endif

@endsection
