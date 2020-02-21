@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Routing Jhuril -->
    @if(\Session::has('error'))
    <div class="alert alert-danger">
        {{\Session::get('error')}}
    </div>
    @endif
    <!-- Routing Jhuril -->
    @if(Auth()->user()->user_type == 'operator')
                     <script type="text/javascript">
                        console.log("operator");
                        window.location.href="operator";
                    </script>
    @elseif(Auth()->user()->user_type == 'techstaff')
                     <script type="text/javascript">
                        console.log("techstaff");
                        window.location.href="techstaff";
                    </script>
    @elseif(Auth()->user()->user_type == 'marketing_officer')
                     <script type="text/javascript">
                        console.log("Marketing Officer");
                        window.location.href="/"+"marketing_officer/routes";
                    </script>
    @endif                    
</div>
@endsection
