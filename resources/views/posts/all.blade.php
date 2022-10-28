@extends('layout.layout1')
@section('title','Quản lý bài viết')
@section('main-container')
<?php
use Carbon\Carbon;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<link rel="stylesheet" href="admin/script/tag-input/tagsinput.css">
<style>
    #resultAllPosts>tr>.td-image-posts div {
        width: 150px;
        height: 100px;
        overflow: hidden;
    }

    #resultAllPosts>tr>.td-image-posts div>img {
        width: 100%;
        height: 100%;
    }
</style>
<div class="row">
    <div class="col-lg-12 mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".box-add-post-modal">+ Thêm bài viết</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".box-trash-post-modal"><i class="fas fa-trash-alt"></i> Thùng rác <span class="badge badge-light">4</span></button>
    </div>
    <!--  -->
    <div class="modal fade box-add-post-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <div class="h4">+ Thêm bài viết mới</div>
                <hr>
                <form id="form-add-post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input onkeyup="ChangeToSlugAddPost(this)" type="text" name="title" class="form-control" id="titlePostAdd" placeholder="Nhập tiêu đề bài viết">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input onkeyup="ChangeToSlugAddPost(this)" type="text" name="slug" class="form-control" id="slugPostAdd" placeholder="Slug tiêu đề">
                    </div>
                    <div class="form-group">
                        <label for="">Từ khóa tìm kiếm</label>
                        <input data-role="tagsinput" type="text" class="form-control" name="tags" id="tagsPostAdd" placeholder="Nhập từ khóa tìm kiếm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                        <textarea name="summary" id="summaryPostAdd" cols="30" rows="10"></textarea>
                    </div>
                    <img src="https://t3.ftcdn.net/jpg/04/34/72/82/360_F_434728286_OWQQvAFoXZLdGHlObozsolNeuSxhpr84.jpg" id="preview-image-cover-post-before-update" width="200px" height="150px">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Ảnh bìa bài viết</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file-image" id="imageCoverPostAdd" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="imageCoverPostAdd">Chọn tệp</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thể loại bài viết</label>
                        <select id="selectCatePostAdd" name="cate" class="custom-select">
                            <option value="" selected>--Chọn thể loại--</option>
                            @foreach($catePosts as $item)
                            <option value="{{ $item->id }}">{{ $item->nameCatePosts }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <select name="status" class="custom-select">
                            <option value="1">Lưu hành</option>
                            <option value="2">Ngừng lưu hành</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung bài viết</label>
                        <textarea name="content" id="contentPostAdd" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">[<i class="fas fa-save"></i>] Lưu bài viết</button>
                </form>
            </div>
        </div>
    </div>
    <!--  -->
    <!--  -->
    <div class="modal fade box-trash-post-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <div class="h4">Thùng rác bài viết</div>
                <hr>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table data-table">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Tóm tắt</th>
                        <th>Thời gian</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="resultAllPosts">
                    @foreach($allPosts as $row)
                    <tr>
                        <td>{{ $row->titlePosts }}</td>
                        <td class="td-image-posts">
                            <div><img src="http://127.0.0.1:3000/<?php echo "images/posts/".$row->imagePosts ?>" alt=""></div>
                        </td>
                        <td>{!! $row->summaryPosts !!}</td>
                        <td>12:30 28/10/2022</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-warning"><i class="fas fa-pen-alt"></i></button>
                                <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
<script src="admin/script/tag-input/tagsinput.js"></script>
<script src="admin/script/posts.js"></script>

<script>
    CKEDITOR.replace('summaryPostAdd', {
        height: 400,
    });
    CKEDITOR.replace('contentPostAdd', {
        height: 400,
    });
</script>
@endsection