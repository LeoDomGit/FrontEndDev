@extends('layout.layout1')
@section('title','Quản lý bài viết')
@section('main-container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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
                <form>
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input onkeyup="ChangeToSlugAddPost(this)" type="text" class="form-control" id="titlePostAdd" placeholder="Nhập tiêu đề bài viết">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input onkeyup="ChangeToSlugAddPost(this)" type="text" class="form-control" id="slugPostAdd" placeholder="Slug tiêu đề">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                        <textarea name="" id="summaryPostAdd" cols="30" rows="10"></textarea>
                    </div>
                    <img src="https://t3.ftcdn.net/jpg/04/34/72/82/360_F_434728286_OWQQvAFoXZLdGHlObozsolNeuSxhpr84.jpg" id="preview-image-cover-post-before-update" width="200px" height="150px">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Ảnh bìa bài viết</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imageCoverPostAdd" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="imageCoverPostAdd">Chọn tệp</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thể loại bài viết</label>
                        <select class="custom-select">
                            <option value="" selected>--Chọn thể loại--</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <select class="custom-select">
                            <option value="1">Lưu hành</option>
                            <option value="2">Ngừng lưu hành</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung bài viết</label>
                        <textarea name="" id="contentPostAdd" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
                    <tr>
                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</td>
                        <td class="td-image-posts">
                            <div><img src="https://d1hjkbq40fs2x4.cloudfront.net/2016-01-31/files/1045.jpg" alt=""></div>
                        </td>
                        <td>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</td>
                        <td>12:30 28/10/2022</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-warning"><i class="fas fa-pen-alt"></i></button>
                                <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="admin/script/jquery-3.6.1.min.js"></script>
<script src="admin/ckeditor/ckeditor.js"></script>
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