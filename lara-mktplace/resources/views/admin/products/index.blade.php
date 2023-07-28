@extends('layouts.app')

@section('content')
    @if(!$products)
        <div class="alert alert-danger">
            <p>Você precisa criar uma loja antes para ver os produtos</p>
        </div>
        <a href="{{route('admin.stores.create')}}" class="btn btn-lg btn-success">Criar Loja</a>
    @else
    <a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success">Criar produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>R$ {{number_format($product->price,2,',','.')}}</td>
                    <td>{{$product->store->name}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('admin.products.edit',['product' => $product->id])}}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{route('admin.products.destroy',['product' => $product->id])}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-sm btn-danger" type="submit">Apagar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$products->links()}}
    @endif
@endsection
