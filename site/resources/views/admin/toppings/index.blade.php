@extends('admin.layouts.layout')
@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">All Toppings</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <h4 class="card-title">All Toppings</h4>

                                </div>
                                <div class="col-md-5 text-right">
                                    <a href="{{route('toppings.create')}}" type="button" class="btn mb-1 btn-primary">Add New <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th> Name</th>
                                        <th>Type</th>
                                        <th>Count</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach (@App\ToppingValue::all() as $item)
                                        <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{@App\Topping::where('id',$item->type)->value('name')}}</td>
                                        <td>{{$item->count}}</td>
                                        <td>
                                           <a href="{{route('topping.delete',$item->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fa fa-trash text-danger" style="font-size: 20px;"></i></a>
                                        <a href="{{route('toppings.edit',$item->id)}}"><i class="fa fa-edit pl-3 text-primary" style="font-size: 20px;"></i></a>
                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th> Name</th>
                                        <th>Type</th>
                                        <th>Count</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>

@endsection