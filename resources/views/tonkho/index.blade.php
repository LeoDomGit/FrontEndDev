@extends('layout.layout1')
@section('title','Quản lý storages')
@section('main-container')
<select class="form-control col-6" name="" id="">
    @foreach ($allProducts as $item)
    <option value="">{{$item->prodName}}</option>        
    @endforeach
</select>
<script src="admin/script/jquery-3.6.1.min.js"></script>
@endsection