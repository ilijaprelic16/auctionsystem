@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Products</div>

                <div class="card-body">

{{--                        <passport-clients></passport-clients>--}}
{{--                        <passport-authorized-clients></passport-authorized-clients>--}}
{{--                        <passport-personal-access-tokens></passport-personal-access-tokens>--}}
                        <products></products>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
