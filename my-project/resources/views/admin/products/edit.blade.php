@extends('layouts.app')

@section('content')
    <h1>Editar produto</h1>
    <form action="{{route('admin.products.update',['product' => $product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="">Nome loja</label>
            <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" name="description" id="" class="form-control @error('description') is-invalid @enderror" value="{{old('description') ?? $product->description}}">
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Conteúdo</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{$product->body}}</textarea>
            @error('body')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Preço</label>
            <input type="text" name="price" id="" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}">
            @error('price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Categorias</label>
            <select name="categories[]" id="" class="form-control" multiple>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if($product->categories->contains($category) ||
                                (old("categories") && in_array($category->id,old("categories"))))
                                selected
                           @endif >{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Fotos do produto</label>
            <input type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" multiple>
            @error('photos.*')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div style="margin-top: 10px;">
            <button type="submit" class="btn btn-lg btn-success">Atualizar produto</button>
        </div>
    </form>
    <div class="row">
        @foreach($product->photos as $photo)
            <div class="col-4" style="text-align: center;">
                <img src="{{asset('storage/'.$photo->image)}}" class="img-fluid">
                <form action="{{route('admin.photo.remove')}}" method="post">
                    @csrf
                    <input type="hidden" name="photoName" value="{{$photo->image}}">
                    <button type="submit" class="btn btn-lg btn-danger">Remover</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
