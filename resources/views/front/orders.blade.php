@extends('layouts.front')

@section('content')


<div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Orders</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <p>
                            </p><table class="table table-hover table-striped">
                                <tbody><tr>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Products</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                @if(!empty($orders))
                                    @foreach($orders as $ord)
                                    <tr>
                                        <td>{{ $ord->id }}</td>
                                        <td>{{ ucfirst($ord->status->name) }}</td>
                                        <td>
                                            @foreach($ord->products as $prod)
                                               <a href="{{ url('product') . '/' . $prod->id }}">{{ ucfirst($prod->name) }}</a> <br>
                                            @endforeach
                                        </td>
                                        <td>{{ $ord->products->sum('price') }}</td>
                                        <td>
                                            @if($ord->order_status_id==1)
                                                <form method="POST" action="{{ url('paypal') }}" >@csrf</form>
                                                <form method="POST" action="{{ url('paypal') }}" >
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $ord->id }}"></input>
                                                    <input type="hidden" name="amount" value="{{ $ord->products->sum('price') }}"></input>
                                                    <button  onclick="alert('Test account \r\nEmail: sb-1pgxc1011151@personal.example.com \r\nPassword: bJpY.6?$a ')" type="submit" class="btn btn-primary">Pay</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody></table>
                        <p></p>

                    </div>
                </div>
            </div>
        </div>

@endsection
