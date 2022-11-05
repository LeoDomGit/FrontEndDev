@extends('layout.layout1')
@section('title','Quản lý Slider')
@section('main-container')
<?php

use Carbon\Carbon;

Carbon::setLocale('vi');
?>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<link rel="stylesheet" href="admin/script/tag-input/tagsinput.css">
<style>
#resultAllSlider>tr>.td-imgControl div {
    width: 220px;
    height: 100px;
    overflow: hidden;
}

#resultAllSlider>tr>.td-imgControl div>img {
    width: 100%;
    height: 100%;
}

.image-slider img{
    margin: 0 auto;
    width:300px;
    height:170px;
    border-radius:5px;
}
.button-cover {
    height: 100px;
    margin: 20px;
    background-color: #fff;
    box-shadow: 0 10px 20px -8px #c5d6d6;
    border-radius: 4px;
    }

div.btn-container{
display: table-cell;
vertical-align: middle;
text-align: center;
}

div.btn-container i{
display: inline-block;
position: relative;
top: -9px;
}

label {
font-size: 13px;
color: #424242;
font-weight: 500;
}

.btn-color-mode-switch{
display: inline-block;
margin: 0px;
position: relative;
}

.btn-color-mode-switch > label.btn-color-mode-switch-inner{
margin: 0px;
width: 140px;
height: 30px;
background: #E0E0E0;
border-radius: 26px;
overflow: hidden;
position: relative;
transition: all 0.3s ease;
/*box-shadow: 0px 0px 8px 0px rgba(17, 17, 17, 0.34) inset;*/
display: block;
}

.btn-color-mode-switch > label.btn-color-mode-switch-inner:before{
content: attr(data-on);
position: absolute;
font-size: 12px;
font-weight: 500;
top: 7px;
right: 20px;


}

.btn-color-mode-switch > label.btn-color-mode-switch-inner:after{
content: attr(data-off);
width: 70px;
height: 26px;
background: #fff;
border-radius: 26px;
position: absolute;
left: 2px;
top: 2px;
text-align: center;
transition: all 0.3s ease;
box-shadow: 0px 0px 6px -2px #111;
padding: 3px 0px;

}

.btn-color-mode-switch > .alert{
display: none;
background: #FF9800;
border: none;
color: #fff;
}

.btn-color-mode-switch input[type="checkbox"]{
cursor: pointer;
width: 75px;
height: 25px;
opacity: 0;
position: absolute;
top: 0;
z-index: 1;
margin: 0px;
}

.btn-color-mode-switch input[type="checkbox"]:checked + label.btn-color-mode-switch-inner{
background: #E0E0E0;
color: #fff;
}

.btn-color-mode-switch input[type="checkbox"]:checked + label.btn-color-mode-switch-inner:after{
content: attr(data-on);
left: 68px;
background: #3c3c3c;
}

.btn-color-mode-switch input[type="checkbox"]:checked + label.btn-color-mode-switch-inner:before{
content: attr(data-off);
right: auto;
left: 20px;
}

.btn-color-mode-switch input[type="checkbox"]:checked + label.btn-color-mode-switch-inner{
/*background: #66BB6A; */
/*color: #fff;*/
}

.btn-color-mode-switch input[type="checkbox"]:checked ~ .alert{
display: block;
}

.dark-preview{
    background: #fff;
}

.dark-preview div.btn-container i.fa-sun-o{
color: #777;
}

.dark-preview div.btn-container i.fa-moon-o{
color: #fff;
text-shadow: 0px 0px 11px #fff;
}

.white-preview{
background: #fff;
}

.white-preview div.btn-container i.fa-sun-o{
color: #ffa500;
text-shadow: 0px 0px 16px #ffa500;
}

.white-preview div.btn-container i.fa-moon-o{
color: #777;
}

p.by {

}

p.by a{
text-decoration: none;
color: #000;
}

.dark-preview p.by a{
color: #777;
}

.white-preview p.by a{
color: #000;
}
.text-center{
text-align: center !important;
}
.tdControl{
    max-width: 250px;
    width: 100%;
}


</style>
<div class="row">
    <div class="col-lg-12 mb-4">
        <button type="button" class="btn btn-sm mt-3 btn-primary" data-toggle="modal" data-target="#box-add-slider-modal"><i class="fas fa-plus-circle"></i> Thêm slider</button>
    </div>
    <!--  -->
    <!--  -->
    <div class="modal fade" id="box-add-slider-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content mb-3">
                <form id="form-add-slider" method="post" action="http://localhost:3000/api/addSlider" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel">Thêm slider mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                        <div class="form-group">
                            <label class="font-weight-bold" for="">Tiêu đề</label>
                            <input type="text" name="name" class="form-control" id="titleSlider" placeholder="Nhập tiêu đề bài viết">
                        </div>
                        <div class="form-group image-slider">
                            <img class="d-flex justify-content-center" src="https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png" id="fileSliderAdd" alt="No image available" >
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="">Chọn banner:</label>
                            <div class="form-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="fileSlider" id="submit-file-slider" onchange="chooseFileAdd(this)" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile03">Chọn hình ảnh </label>  
                            </div>   
                        </div>
                        </div>
                 
                        <div class="form-group">
                            <label class="font-weight-bold" for="">Trạng thái: &nbsp;</label>
                            <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input status_D"  name="status"value='1'>
                            <label class="form-check-label" for="exampleInputPassword1">Động</label>
                            
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input status_T" name="status" value='0'>
                            <label class="form-check-label" for="exampleInputPassword1">Tĩnh</label>
                        </div>
                        </div>
                     
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> &nbsp; Đóng</button>
                        <button type="submit" class="btn btn-sm btn-success"><i class="far fa-save"></i>&nbsp;Thêm </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table data-table">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="resultAllSlider">
                   @foreach($allSlider as $slider)
                    <tr>
                        <td>
                            <div class="tdControl">
                                {{$slider -> name}}
                            </div>

                        </td>
                        <td class="td-imgControl">
                            <div><img src="http://127.0.0.1:3000/<?php echo "sliders/" . $slider->image ?>" alt=""></div>
                        </td>
                       <td>
                       <div class="btn-container">
                            <form id="form-update-status">
                            <input type="hidden" name="id" value="{{$slider->id}}">
                                <label class="switch btn-color-mode-switch">
                                    <input type="checkbox" class="switches" name="color_mode" data-fpid="{{$slider->id}}" <?php echo ($slider->status==1)?"checked":"";?> id="color_mode" value="1">
                                    <label for="color_mode" data-on="Động" data-off="Tĩnh" class="btn-color-mode-switch-inner">
                                    </label>
                                </label>
                            </form>
                        </div>
                       </td>
                        <td>
                            <?php
                                $now = Carbon::now();
                                $updatedAt = $slider->updated_at;
                                $updatedAt = Carbon::parse($updatedAt);
                                echo $updatedAt->diffForHumans(Carbon::now());
                               
                            ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger deleteSlider" data-id = "{{$slider ->image}}"><i class="fas fa-trash"></i> Xóa</button>
                            <button type="button" class="btn btn-sm btn-primary" id="modalUpdate" data-id="{{$slider->id}}" data-toggle="modal" data-target="#box-edit-slider-modal{{$slider->id}}"><i class="fas fa-edit"></i></button>
                        
                    
                           
                        </td>
                        <div class="modal fade" id="box-edit-slider-modal{{$slider ->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="form-edit-slider" data-id="{{$slider->id}}" enctype="multipart/form-data">
                                            <div class="modal-header mb-3">
                                                <h5 class="modal-title text-center" id="staticBackdropLabel">Cập nhật "{!! $slider -> name !!}"</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body mb-3">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="">Tên Slider</label>
                                                    <input type="hidden" name="id" value="{{ $slider -> id }}">
                                                    <input data-id="{{ $slider->id }}" id="titleEditSlider{{$slider->id}}" class="form-control" name="name" value="{{ $slider -> name }}" type="text">
                                                </div>
                                                <div class="form-group image-slider mt-3">
                                                 <img class="d-flex justify-content-center" style="margin-bottom: 20px;" id="fileSliderEdit{{$slider->id}}" src="<?php echo ($slider->image != null) ? 'http://127.0.0.1:3000/sliders/' . $slider->image : 'https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png' ?>" alt="image">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label class="font-weight-bold" for="">Chọn banner</label>                         
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input class="custom-file-input fileImageEdit" type="file" id ="imageEdit{{$slider->id}}" name="fileupdate" data-id="{{ $slider->id }}">
                                                            <label class="custom-file-label" for="inputGroupFile03">Chọn hình ảnh</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="nameslider">Trạng thái: &nbsp;</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" value="1"<?php if($slider->status==1) echo"checked"; ?> >
                                                        <label class="form-check-label" for="exampleInputPassword1">Động</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                         <input class="form-check-input" type="radio" name="status" value="0" <?php if($slider->status==0) echo"checked"; ?>>
                                                         <label class="form-check-label" for="exampleInputPassword1">Tĩnh</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer mb-3">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp; Đóng</button>
                                                <button type="submit" class="btn btn-sm btn-success" data-idnum="{{$slider->id}}" ><i class="fas fa-save"></i>&nbsp;Cập nhật slider</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                         </div>
                         @endforeach
                    </tr>
                   
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
<script src="admin/script/slider.js"></script>
@endsection

