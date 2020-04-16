@extends('admin.layouts.layout')
@section('content')
    <section>
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h4 class="card-title pb-3" >Add New Pizza</h4>

                                    </div>
                                    <div class="col-md-5 text-right">
                                        <a href="{{route('menus.index')}}" type="button" class="btn mb-3 btn-primary ">View All
                                        </a>
                                    </div>
                                </div>
                                <div class="basic-form">
                                    {{$errors}}
                                <form method="POST" action="{{route('menus.store')}}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control input-flat" placeholder="Enter Title " name="title">
                                        </div>
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea class="form-control" rows="4" id="disc" name="disc"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="sel1" name="cat">
                                                <option value="selected">Select Category</option>
                                                @foreach(@App\Category::all() as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <h4 class="">
                                            Prices
                                        </h4>
                                        <div class="form-row">
                                            @foreach(@App\Variable::where('type','size')->get() as $row)
                                            <div class="form-group col-6">
                                                <label>For {{$row->value}}:</label>
                                                <input type="text" class="form-control input-flat" placeholder="Enter Price" name="{{$row->value}}">
                                            </div>
                                           @endforeach
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label">Select Image</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Customizable:</label><br>
                                            <input type="radio" id="male" name="custom" value="1">
                                            <label for="male">Yes</label>
                                            <input type="radio" id="female" name="custom" value="0">
                                            <label for="female">No</label><br>
                                        </div>
                                        <div class="text-center">
                                            <button type="" class="btn px-5 btn-primary">Add Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection