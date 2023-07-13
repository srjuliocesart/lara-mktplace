@extends('layouts.app')

@section('content')
    <h1>Editar produto</h1>
    <form action="{{route('admin.products.update',['product' => $product->id])}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="">Nome loja</label>
            <input type="text" name="name" id="" class="form-control" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" name="description" id="" class="form-control" value="{{$product->description}}">
        </div>
        <div class="form-group">
            <label for="">Conteúdo</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$product->body}}</textarea>
        </div>
        <div class="form-group">
            <label for="">Preço</label>
            <input type="text" name="price" id="" class="form-control" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" id="" class="form-control" value="{{$product->slug}}">
        </div>
        <div style="margin-top: 10px;">
            <button type="submit" class="btn btn-lg btn-success">Atualizar produto</button>
        </div>
    </form>
@endsection
