@extends('layouts.admin')
@section('title')
    {{ trans('main_trans.Users') }}
@endsection


@section('content-title')
    {{ trans('main_trans.Users') }}
@endsection

@section('content-description')
{{ trans('main_trans.Add User') }}
@endsection

@section('page-title')
    {{ trans('main_trans.Users') }}
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> {{ trans('main_trans.Back') }}</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <div class="card tab2-card">
                        <div class="card-body">
                            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                        data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                        aria-selected="true" data-original-title="" title="">{{ trans('main_trans.Add User') }}</a></li>
                            </ul>
                            {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST','class'=>'needs-validation user-add']) !!}
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="account" role="tabpanel"
                                    aria-labelledby="account-tab">
                                    {{-- <form class="needs-validation user-add" novalidate=""> --}}


                                        <div class="form-group row">
                                            <label for="validationCustom1"
                                                class="col-xl-3 col-md-4"><span>*</span>{{ trans('main_trans.Name') }}</label>
                                            <div class="col-xl-8 col-md-7">
                                                {!! Form::text('name', null, [ 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom2"
                                                class="col-xl-3 col-md-4"><span>*</span> {{ trans('main_trans.Email') }}</label>
                                            <div class="col-xl-8 col-md-7">
                                                {!! Form::text('email', null, [ 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom3"
                                                class="col-xl-3 col-md-4"><span>*</span> {{ trans('main_trans.Password') }}</label>
                                            <div class="col-xl-8 col-md-7">
                                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> {{ trans('main_trans.Confirm Password') }}</label>
                                            <div class="col-xl-8 col-md-7">
                                                {!! Form::password('confirm-password', [ 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> {{ trans('main_trans.Roles') }}:</label>
                                            <div class="col-xl-8 col-md-7">
                                                {!! Form::select('roles_name[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                                            </div>
                                        </div>
                                    {{-- </form> --}}

                                </div>

                            </div>
                            <div class="pull-right">

                                <button type="submit" class="btn btn-primary">{{ trans('main_trans.Save') }}</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
@endsection








