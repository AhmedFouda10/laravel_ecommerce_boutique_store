@extends('layouts.admin')
@section('title')
    Categories || Multikart Admin Panel
@endsection
@section('content')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Category
                                <small>Manage Category</small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('admin.category.all') }}"> Back</a>
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
                                <div class="container-fluid">
                                    <div class="card tab2-card">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                                <li class="nav-item"><a class="nav-link active show" id="general-tab"
                                                        data-bs-toggle="tab" href="#general" role="tab"
                                                        aria-controls="general" aria-selected="true" data-original-title=""
                                                        title="">Edit Category</a></li>

                                            </ul>
                                            <form action="{{ route('admin.category.update',$category->id) }}" method="post">
                                                @csrf
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade active show" id="general" role="tabpanel"
                                                        aria-labelledby="general-tab">
                                                        <div class="form-group row">
                                                            <label for="validationCustom0"
                                                                class="col-xl-3 col-md-4"><span>*</span>
                                                                Name</label>
                                                            <div class="col-xl-8 col-md-7">
                                                                <input class="form-control" id="validationCustom0"
                                                                    type="text" name="name" required value="{{(old('name') ? old('name') : $category->name)}}">
                                                            </div>
                                                            {{-- @error('name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror --}}
                                                        </div>
                                                        <div class="form-group row editor-label">
                                                            <label class="col-xl-3 col-md-4"><span>*</span>
                                                                Description</label>
                                                            <div class="col-xl-8 col-md-7">
                                                                <div class="editor-space">
                                                                    <textarea id="editor1" cols="30" rows="10" name="description" >{!! $category->description !!}</textarea>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="pull-right">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
