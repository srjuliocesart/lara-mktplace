@extends('layouts.app')

@section('content')
    <h1>Criar produto</h1>
    <form action="{{route('admin.products.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome produto</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" name="description" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Conteúdo</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="">Preço</label>
            <input type="text" name="price" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Lojas</label>
            <select type="text" name="store" id="" class="form-control">
                @foreach($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar produto</button>
        </div>
    </form>
@endsection
