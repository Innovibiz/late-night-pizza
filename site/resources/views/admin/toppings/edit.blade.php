
@extends('admin.layouts.layout')
@section('content')
    <section>
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Topping</a></li>
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
                                        <h4 class="card-title pb-3" >Add New Topping</h4>

                                    </div>
                                    <div class="col-md-5 text-right">
                                        <a href="{{route('toppings.index')}}" type="button" class="btn mb-3 btn-primary ">View All
                                        </a>
                                    </div>
                                </div>
                                <div class="basic-form">
                                <form method="POST"  action="{{route('toppings.update',$topping->id)}}">
                                    @csrf
                                    @method('PATCH')
                                        <div class="form-group">
                                        <input type="text" name="name" class="form-control input-flat" placeholder="Size Name " value="{{$topping->name}}">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="sel1" name="type">
                                                <option value="selected">Select Type</option>
                                                @foreach(@App\Topping::all() as $row)
                                                <option value="{{$row->id}}" @if($topping->type==$row->id) selected @endif>{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="count" class="form-control input-flat" placeholder="count" value="{{$topping->count}}">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn px-5 btn-primary">Edit Now</button>
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