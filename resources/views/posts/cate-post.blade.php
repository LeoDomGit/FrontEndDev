@extends('layout.layout1')
@section('title','Quản lý thể loại bài viết')
@section('main-container')
<?php

use Carbon\Carbon;

Carbon::setLocale('vi');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<div class="row">
    <div class="col-lg-12 mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-cate-post">+ Thêm thể loại mới</button>
        <div class="modal fade" id="modal-add-cate-post" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="form-add-cate-post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">+ Thêm mới thể loại bài viết</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nameCateAddPost">Tên thể loại</label>
                                <input onkeyup="ChangeToSlugAddCatePost(this)" name="nameCate" type="text" class="form-control" id="nameCateAddPost">
                            </div>
                            <div class="form-group">
                                <label for="slugAddCatePost">Slug thể loại</label>
                                <input onkeyup="ChangeToSlugAddCatePost(this)" type="text" name="slugCate" class="form-control" id="slugAddCatePost">
                            </div>
                            <img style="margin-bottom: 20px;" id="preview-logo-cate-post-before-update" src="https://vanhoadoanhnghiepvn.vn/wp-content/uploads/2020/08/112815953-stock-vector-no-image-available-icon-flat-vector.jpg" alt="" width="200px" height="200px">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Chọn Logo thể loại</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file-logo-cate-post" name="logoFile" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="file-logo-cate-post">Chọn file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="derCateAddPost">Mô tả</label>
                                <textarea style="resize:none ;" name="der" class="form-control" id="derCateAddPost" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">[<i class="	fas fa-save"></i>] Lưu thể loại</button>
                            <!-- <button type="button" class="btn btn-danger">[<i class="fas fa-times"></i>] Xóa thể loại</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table data-table">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Logo</th>
                        <th>Ngày thêm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allCatePost as $item)
                    <tr>
                        <td>{{ $item->nameCatePosts }} <strong>({{ count($item->posts) }})</strong></td>
                        <td><img src="<?php echo ($item->logo != null) ? 'http://127.0.0.1:3000/images/cate_posts/' . $item->logo : 'http://127.0.0.1:3000/images/cate_posts/no-image-cate-post.jpg' ?>" alt="" width="100px" height="100px"></td>
                        <td><?php echo Carbon::parse($item->created_at)->diffForHumans() ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-cate-post{{ $item->id }}"><i class="fas fa-cogs"></i></button>
                            <div class="modal fade" id="modal-edit-cate-post{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="form-edit-cate-post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">{!! $item->nameCatePosts !!}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nameCateAddPost">Tên thể loại</label>
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input data-id="{{ $item->id }}" onkeyup="ChangeToSlugUpdateCatePost(this)" name="nameCate" value="{{ $item->nameCatePosts }}" type="text" class="form-control nameCateEditPost" id="nameCateEditPost">
                                                </div>
                                                <div class="form-group">
                                                    <label for="slugAddCatePost">Slug thể loại</label>
                                                    <input onkeyup="ChangeToSlugUpdateCatePost(this)" type="text" name="slugCate"  value="{{ $item->slugCatePost }}" class="form-control slugEditCatePost" id="slugEditCatePost{{ $item->id }}">
                                                </div>
                                                <img style="margin-bottom: 20px;" id="preview-logo-before-update{{ $item->id }}" src="<?php echo ($item->logo != null) ? 'http://127.0.0.1:3000/images/cate_posts/' . $item->logo : 'http://127.0.0.1:3000/images/cate_posts/no-image-cate-post.jpg' ?>" alt="" width="200px" height="200px">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupFileAddon01">Chọn Logo thể loại</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input data-id="{{ $item->id }}" type="file" class="custom-file-input input-choose-logo-update-cate-post" name="logoFile" aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="file-logo-cate-post">Chọn file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="derCateAddPost">Mô tả</label>
                                                    <textarea style="resize:none ;" name="der" class="form-control derCateEditPost" id="derCateEditPost" rows="3">{!! $item->der !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                <button data-id="{{ $item->id }}" type="button" class="btn btn-danger btn-delete-cate-post">[<i class="fas fa-times"></i>] Xóa thể loại</button>
                                                <button type="submit" class="btn btn-primary">[<i class="	fas fa-save"></i>] Cập nhật thể loại</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script>
    function AjaxSetup() {
        return $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }
</script>
<script src="admin/ckeditor/ckeditor.js"></script>
<script src="admin/script/cate_posts.js"></script>
@endsection