<link rel="stylesheet" href="admin/src/styles/dropdrag.css">
<link rel="stylesheet" href="admin/src/styles/dropdrag2.css">

<style>
  .waitingscreen {
    width: 200px;
    margin: 0px auto;
  }

  .imageProds {
    width: 300px;
    height: 300px;
    border-radius: 50%;
  }

  .deleteImageIcon {
    transition: ease-in-out 2s;
    /* display: none; */
    position: absolute;
    top: 45%;
    left: 45%;
    color: white;
    text-align: center;
    font-weight: bolder;
    cursor: pointer;
    font-size: 18px;
    background: rgb(191, 32, 32);
    width: 30px;
    height: 30px;
    border-radius: 50%;
  }
</style>
@extends('layout.layout1')
@section('title','Quản lý sản phẩm')
@section('main-container')
<div class="min-height-200px">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductMD">
    Thêm sản phẩm
  </button>
  {{-- ============================ --}}
  <!-- Modal -->
  <div class="modal fade" id="addProductMD" tabindex="-1" aria-labelledby="addProductMDLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProductMDLabel">Thêm sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="pd-20 card-box mb-30">
            <div class="clearfix">
              <div class="pull-left">

              </div>
            </div>
            <form>
              <div class="row">
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" id="prodName" placeholder="Tên sản phẩm" />
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Tóm tắt sản phẩm</label>
                    <input type="text" class="form-control" id="summary" placeholder="Tóm tắt sản phẩm" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select onchange="SelectBrandBySelectCate(this)" name="" id="prodTypeID" class="form-control">
                      <option value="" selected>--Chọn danh mục--</option>
                      @foreach($cate as $item)
                      <option value="{{$item->idcate}}">{{$item->cateName}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Thương hiệu</label>
                    <select name="" id="brandID" class="form-control select-brand-by-prod" disabled>

                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <label>Nội dung</label>
                  <textarea class="form-control" id="desc" rows="4"></textarea>
                </div>
              </div>
              <br>

            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addImageProductModal" id="btnAddImageProduct">Thêm hình ảnh</button>
          <button type="submit" id="btnAddProduct" class="btn btn-primary me-2">Thêm</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  {{-- End Modal 1 --}}
  {{-- Modal 2 --}}

  <div class="modal fade" id="addImageProductModal" tabindex="-1" aria-labelledby="addImageProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addImageProductModalLabel">Thêm hình ảnh sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="top">
              <p>Drag & drop image uploading</p>
              <button id="submitImageProd" type="button">Upload</button>
            </div>
            <div class="drag-area">
              <span class="visible">
                Drag & drop image here or
                <span class="select" role="button">Browse</span>
              </span>
              <span class="on-drop">Drop images here</span>
              <input name="file" type="file" class="file" multiple />
            </div>

            <!-- IMAGE PREVIEW CONTAINER -->
            <div class="container"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End Modal 2 --}}

  {{-- ========================== --}}

  {{-- Modal 3 --}}
  <!-- Modal -->

  {{-- endModal --}}

  <div class="mt-3">
    <table class="data-table table hover multiple-select-row nowrap ">
      <thead>
        <tr>
          <th class="table-plus datatable-nosort">Tên sản phẩm</th>
          <th>Thông tin sản phẩm</th>
          <th>Tình trạng</th>
          <th>Loại sản phẩm</th>
          <th>Thương hiệu</th>
          <th>Ngày tạo</th>
          <th>Tùy chỉnh</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $item)
        <div class="modal fade" id="productDetail{{$item->idProd}}" tabindex="-1" aria-labelledby="productDetailLabel" aria-hidden="true">
          {{-- Modal 4 --}}
          <!-- Modal -->
          <div class="modal fade" id="AddMoreImgModal" tabindex="-1" aria-labelledby="AddMoreImgModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="AddMoreImgModalLabel">Thêm hình ảnh sản phẩm</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div style="min-height:400px" class="modal-body">
                  <div class="drop">
                    <div class="cont">
                      <i class="fa fa-cloud-upload"></i>
                      <div class="tit">

                      </div>
                      <div class="desc">

                      </div>
                      <div class="browse">Thêm ảnh
                      </div>
                    </div>
                    {{-- <input type="number" id="idProd" value="{{$item->idProd}}"> --}}
                    <output id="list"></output><input id="files" multiple="true" name="files[]" type="file" />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" id="addmoreimagebtn" class="btn btn-primary">Lưu</button>
                </div>
              </div>
            </div>
          </div>
          {{-- end Modal --}}
          {{-- <div class="modal fade" id="productDetail{{$item->idProd}}" tabindex="-1" aria-labelledby="productDetailLabel" aria-hidden="true"> --}}
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="productDetailLabel">Chi tiết sản phẩm </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <?php
                    if ($item->prodStatus == 0) {
                      $tinhtrang = 'Đang Khóa';
                    } else {
                      $tinhtrang = 'Đang Mở';
                    }
                    ?>
                    <div class="row">
                      <div class="col-6">
                        <h5>Tên sản phẩm : {{$item->prodName}}</h5>
                      </div>
                      <div class="col-4">
                        <h5>Tình trạng : <?= $tinhtrang ?></h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <h5> Tóm tắt sản phẩm : {{$item->summary}}</h5>
                      </div>
                      <div class="col-3">
                        <h5> Loại : {{$item->cateName}}</h5>
                      </div>
                      <div class="col-3">
                        <h5> Hãng : {{$item->brandname}} </h5>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-3">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col">
                        {!!$item->content!!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <tr>
          <td class="table-plus">{{$item->prodName}}</td>
          <td>{{$item->summary}}</td>
          <td><?php if ($item->prodStatus == 0) {
                echo "Đang đóng";
              } else {
                echo "Đang mở";
              } ?></td>
          <td>{{$item->cateName}}</td>
          <td>{{$item->brandname}}</td>
          <td>{{$item->prodCreate}}</td>
          <td>
            <div class="mt-2">
              <button data-toggle="modal" data-target="#editProductMD{{ $item->idProd }}" class="btn btn-warning editBtn" data-id="{{$item->idProd}}">Sửa</button> <button class="btn btn-danger">Xóa</button> <button class="btn btn-success proddetailbtn" data-id="{{$item->idProd}}" data-toggle="modal" data-target="#productDetail{{$item->idProd}}">Chi tiết</button>
            </div>
          </td>
        </tr>
        <div class="modal fade" id="editProductMD{{ $item->idProd }}" tabindex="-1" aria-labelledby="editProductMDLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <form id="form-edit-prod">
                <div class="modal-header">
                  <h5 class="modal-title" id="editProductMDLabel">Sửa sản phẩm</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                      <div class="pull-left">

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Tên sản phẩm</label>
                          <input type="hidden" name="id" value="{{ $item->idProd }}">
                          <input type="text" class="form-control" name="prodNameedit" id="prodNameedit" value="{{ $item->prodName }}" placeholder="Tên sản phẩm" />
                          <div id="prodNameedit" class="invalid-feedback">
                            Please choose a username.
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Tóm tắt sản phẩm</label>
                          <input type="text" class="form-control" name="summaryedit" id="summaryedit" value="{{ $item->summary }}" placeholder="Tóm tắt sản phẩm" />
                          <div id="summaryedit" class="invalid-feedback">
                            Please choose a username.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Loại sản phẩm</label>
                          <select onchange="SelectBrandBySelectCate(this)" name="prodTypeIDedit" id="prodTypeIDedit" class="form-control">
                            @foreach($cate as $items)
                            <option value="{{$items->idcate}}" {{ $show = ($item->prodCateId == $items->idcate) ? 'selected' : '' }}>{{$items->cateName}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Thương hiệu</label>
                          <select name="brandIDedit" id="brandIDedit" class="form-control select-brand-by-prod">
                            @foreach($brand as $items)
                            <option value="{{$items->idbrand}}" {{ $show = ($item->prodBrandId == $items->idbrand ) ? 'selected' : ''  }}>{{$items->brandname}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label>Nội dung</label>
                        <textarea required class="form-control" name="descedit" id="descedit{{ $item->idProd }}" rows="4">{{ $item->content }}</textarea>
                        <script>
                          CKEDITOR.replace('descedit{{ $item->idProd }}', {
                            height: 400,
                          });
                        </script>
                      </div>

                    </div>
                    <div class="row" id="imagesedit">

                    </div>
                    <br>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" id="btnEditProduct" class="btn btn-primary me-2">Sửa</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addImageEditProductModal" id="btnAddImageProduct">Thêm hình ảnh</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script src="admin/script/addProd.js"></script>
<script src="admin/script/editProd.js"></script>
<script src="admin/ckeditor/ckeditor.js"></script>
<script src="admin/ckfinder/ckfinder.js"></script>
<script>
  CKEDITOR.replace('desc', {
    height: 400,
  });
  CKFinder.setupCKEditor();
</script>
@endsection