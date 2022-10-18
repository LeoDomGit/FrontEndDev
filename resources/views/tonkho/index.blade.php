@extends('layout.layout1')
@section('title','Quản lý storages')
@section('main-container')
<select class="form-control col-6" name="" id="ProductSelect">
    @foreach ($allProducts as $item)
    <option value="{{$item->idProd}}">{{$item->prodName}}</option>        
    @endforeach
</select>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script src="admin/script/storage.js"></script>
@endsection