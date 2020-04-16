@extends('layouts.layout')
@section('content')
<section class="menu-banner mt-5 pt-3" style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('svg/resturant/back.jpeg'); background-size: cover;">
        <div class=" py-5 container white-text">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="h1 h1-responsive text-center pt-5 pizza">
                        Your Cart
                    </h1>
                    <p class="text-center">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi atque cupiditate deleniti est expedita laborum maxime omnis rerum sapiente tempora. Debitis eaque fugit odio qui sint? Corporis eveniet illo illum.
                    </p>
                </div>
            </div>

        </div>
    </section>
<section>
    <div class="container-fluid my-5 py-3">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-borderless " style="border: none!important;">
                        <thead>
                        <tr>
                            <th class="font-weight-bold">
                                <strong>Product</strong>
                            </th>

                            <th class="font-weight-bold">
                                <strong>Price (Per Item)</strong>
                            </th>
                            <th class="font-weight-bold">
                                <strong>QTY</strong>
                            </th>
                            <th class="font-weight-bold">
                                <strong>Amount</strong>
                            </th>
                            <th class="font-weight-bold">Action</th>
                        </tr>

                        </thead>
                        <tbody class="" style="border: none!important;">
                        @if(session('cart'))
                        <?php
                        $total=0;
                        ?>
		            @foreach(session('cart') as $id => $details)
		                        <tr>
                            <td scope="row">
                                <img src="{{asset('uploads/menus/'.$details['photo'])}}" alt="" class="" width="70">
                                <span class="pizza">
                    <strong>{{$details['name']}} </strong>
                    </span>
                            </td>
                            <td>
                              ${{@App\ItemVariable::where('id',$details['size'])->value('price')}}
                            </td>
                            <td>
                                <div class="row m-0 p-1">
                            <span class="badge badge-pill web-color" style="border: 1px solid #002E50;  border-radius: 0px;box-shadow: none;">
                                   <a href="{{route('dec.cart',$id)}}" style="cursor: pointer;" class="mr-1 p-0 m-0" ><i class="fa fa-minus   red-text" style="font-size: 9px;"></i></a>
                                   <b  class=" px-2  " >{{$details['quantity']}}</b>
                                   <a href="{{route('incr.cart',$id)}}" style="cursor: pointer;" class="pl-1 p-0 m-0"><i class="fa fa-plus  green-text" style="font-size: 9px;"></i></a></span>

                                </div>
                            </td>
                            <td>
                               <?php
                               $total += @App\ItemVariable::where('id',$details['size'])->value('price')*$details['quantity'];
                               ?> ${{@App\ItemVariable::where('id',$details['size'])->value('price')*$details['quantity']}}
                            </td>
                            <td>
                                <a href="{{route('rem.cart',$id)}}" class="text-center font-weight-bold"><i class="fa fa-trash fa-2x text-center"></i> </a>

                            </td>

                        </tr>
                        @endforeach
                        @endif


                        </tbody>
                    </table>

                </div>
                <hr>
                <a href="{{url('menus')}}" class="btn btn-inside_se  font-weight-bold" style="color: #002E50!important;">Continue Shopping</a>
            </div>
            <div class="col-md-4">
                <!-- Card -->
                <div class="card p-3" style="box-shadow: none;border:solid 1px rgba(0,0,0,.125);">

                    <!-- Card content -->
                    <div class="card-body">
                        <h3 class="pizza">
                            Cart Totals
                        </h3>
                        <table class="table " style="width: 100%!important;">
                            <tbody>
                            <tr>
                                <td>
                                    SUBTOTALS
                                </td>
                                <td>
                                    ${{$total}}
                                </td>
                            </tr>
                            <tr>
                                <td class="pizza">
                                    TOTALS
                                </td>
                                <td class="font-weight-bold">
                                   ${{$total}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class=" text-center pt-3">
                            <a href="" class="btn btn-inside_se font-weight-bold"  style="color: #002E50!important;">Proceed to cehkout</a>

                        </div>
                    </div>

                </div>
                <!-- Card -->
            </div>
        </div>
    </div>
</section>
@endsection