@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-12">
        <h2>Pedidos Recebidos</h2>
        <hr>
    </div>
    <div class="col-12">
        <div class="accordion" id="accordionExample">
            @forelse($orders as $key => $order)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                            Pedido nº: {{$order->reference}}
                        </button>
                    </h2>
                    <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                @php $items = unserialize($order->items); @endphp
                                @foreach(filterItemsByStoreId($items, auth()->user()->store->id) as $item)
                                    <li>
                                        {{$item['name']}} | R$ {{number_format($item['price'] * $item['amount'],2,',','.')}}
                                        <br>
                                        Quantidade pedida: {{$item['amount']}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning">Nenhum pedido recebido!</div>
            @endforelse
        </div>
        <div class="col-12">
            <hr>
            {{$orders->links()}}
        </div>
    </div>
</div>
@endsection
