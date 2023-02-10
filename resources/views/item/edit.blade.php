@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
<h1>商品編集 ID:{{ $edit_item->id }}</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-10">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card card-primary">
            <form method="POST" action="{{ route('itemupdate', ['id' => $edit_item->id]) }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $edit_item->name }}">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type">種別</label>
                        <input type="number" class="form-control" id="type" name="type" value="{{ $edit_item->type }}">
                        @error('type')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <input type="text" class="form-control" id="detail" name="detail" value="{{ $edit_item->detail }}">
                        @error('detail')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" a href="{{ url('items/index')}}">更新</button>
                </div>
            </form>
        </div>
    </div>
</div>




@stop

@section('css')
@stop

@section('js')
@stop