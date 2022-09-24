<link
href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
rel="stylesheet"
/>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="admin/vendors/styles/core.css" />
<link
rel="stylesheet"
type="text/css"
href="admin/vendors/styles/icon-font.min.css"
/>
<link
rel="stylesheet"
type="text/css"
href="admin/src/plugins/jquery-steps/jquery.steps.css"
/>
<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
@extends('layout.layout1')
@section('title','Thêm sản phẩm')
@section('main-container')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <h4 class="text-blue h4">Thêm loại sản phẩm</h4>
            </div>
            <div class="wizard-content">
                <form class="tab-wizard wizard-circle wizard">
                    <h5>Loại sản phẩm</h5>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Loại sản phẩm :</label>
                                    <input type="text" class="form-control" id="newcategrories" placeholder="Loại sản phẩm">
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
        <!-- success Popup html Start -->
        <div
            class="modal fade"
            id="success-modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h3 class="mb-20">Form Submitted!</h3>
                        <div class="mb-30 text-center">
                            <img src="vendors/images/success.png" />
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                        do eiusmod
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button
                            type="button"
                            class="btn btn-primary"
                            data-dismiss="modal"
                        >
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- success Popup html End -->
    </div>
</div>
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <h4 class="text-blue h4">Thêm sản phẩm</h4>
            </div>
            <div class="wizard-content">
                <form class="tab-wizard wizard-circle wizard">
                    <h5>Thông tin sản phẩm</h5>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên sản phẩm: </label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Đơn giá :</label>
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Khuyễn mãi :</label>
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Thông tin sản phẩm :</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Loại sản phẩm</label>
                                    <select name="" class="form-control" id=""></select>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 2 -->
                    <h5>Content sản phẩm</h5>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Job Description :</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
        <!-- success Popup html Start -->
        <div
            class="modal fade"
            id="success-modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h3 class="mb-20">Form Submitted!</h3>
                        <div class="mb-30 text-center">
                            <img src="vendors/images/success.png" />
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                        do eiusmod
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button
                            type="button"
                            class="btn btn-primary"
                            data-dismiss="modal"
                        >
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- success Popup html End -->
    </div>
</div>
<script src="admin/vendors/scripts/core.js"></script>
<script src="admin/vendors/scripts/script.min.js"></script>
<script src="admin/vendors/scripts/process.js"></script>
<script src="admin/vendors/scripts/layout-settings.js"></script>
<script src="admin/src/plugins/jquery-steps/jquery.steps.js"></script>
<script src="admin/vendors/scripts/steps-setting.js"></script>
<script src="admin/script/addProduct.js"></script>
@endsection