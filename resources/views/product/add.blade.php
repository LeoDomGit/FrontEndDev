@extends('layout.layout1')
@section('title','Quản lý sản phẩm')
@section('main-container')
<div class="row mt-3">
    <div class="col-md-6">
        <label for=""><b>Tên sản phẩm</b></label>
        <input type="text" class="form-control" id='username' placeholder="Tên tài khoản">
    </div>
    <div class="col-md-6">
        <label for=""><b>Giá gốc</b></label>
        <input type="number" class="form-control" id='email' placeholder="Nhập giá gốc">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <label for=""><b>Tên tài khoản</b></label>
        <input type="text" class="form-control" id='username' placeholder="Tên tài khoản">
    </div>
    <div class="col-md-6">
        <label for=""><b>Giá khuyến mãi </b></label>
        <input type="number" class="form-control" id='email' placeholder="Nhập giá khuyến mãi">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <label for=""><b>Danh mục </b></label>
        <select name="" class="form-control" id="">

            <option value="gyigi">gigyigi</option>

        </select>
    </div>
    <div class="col-md-6">
        <label for=""><b>Thương hiệu </b></label>
        <select name="" class="form-control" id="">

            <option value="gyigi">gigyigi</option>

        </select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-3">
        <button id="addUserBtn" class="btn btn-success disabled">Thêm tài khoản</button>
    </div>
</div>
@endsection