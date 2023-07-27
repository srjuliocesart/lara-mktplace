@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Carrinho de compras</h2>
            <hr>
        </div>
        <div class="col-12">
            @if($cart)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $total = 0; @endphp

                    @foreach($cart as $item)
                        <tr>
                            <td>{{$item['name']}}</td>
                            <td>R$ {{$item['price']}}</td>
                            <td>{{$item['amount']}}</td>
                            @php
                                $subtotal = $item['amount'] * $item['price'];
                                $total += $subtotal;
                            @endphp
                            <td>R$ {{number_format($subtotal, 2, ',', '.')}}</td>
                            <td>
                                <a href="{{route('cart.remove', ['slug' => $item['slug']])}}" class="btn btn-sm btn-danger">REMOVER</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">Total</td>
                        <td colspan="2">R$ {{number_format($total, 2, ',', '.')}} </td>
                    </tr>
                    </tbody>
                </table>
                <hr>
                <div class="col-md-12">
                    <a href="{{route('checkout.index')}}" class="btn btn-lg btn-success" style="float:right">Concluir compra</a>
                    <a href="{{route('cart.cancel')}}" class="btn btn-lg btn-danger" style="float:left">Cancelar compra</a>
                </div>
            @else
                <div class="alert alert-warning">
                    Carrinho vazio...
                </div>
            @endif
        </div>
    </div>
@endsection
