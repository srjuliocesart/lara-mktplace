@extends('layouts.app')

@section('content')
    <h1>Criar loja</h1>
    <form action="{{route('admin.stores.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome loja</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" name="description" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Telefone</label>
            <input type="text" name="phone" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Celular/Wpp</label>
            <input type="text" name="mobile_phone" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Usuário</label>
            <select type="text" name="user" id="" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Loja</button>
        </div>
    </form>
@endsection
