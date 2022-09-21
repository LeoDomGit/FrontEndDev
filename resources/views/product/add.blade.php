@extends('layout.layout1')
@section('title','Quản lý sản phẩm')
@section('main-container')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Quản lý sản phẩm</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Thêm sản phẩm
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            January 2018
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Export List</a>
                            <a class="dropdown-item" href="#">Policies</a>
                            <a class="dropdown-item" href="#">View Assets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <h4 class="text-blue h4">+ Thêm mới sản phẩm</h4>
                <!-- <p class="mb-30">jQuery Step wizard</p> -->
            </div>
            <div class="wizard-content">
                <form class="tab-wizard wizard-circle wizard">
                    <h5>Thông tin sản phẩm</h5>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name :</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name :</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address :</label>
                                    <input type="email" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number :</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select City :</label>
                                    <select class="custom-select form-control">
                                        <option value="">Select City</option>
                                        <option value="Amsterdam">India</option>
                                        <option value="Berlin">UK</option>
                                        <option value="Frankfurt">US</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of Birth :</label>
                                    <input type="text" class="form-control date-picker" placeholder="Select Date" />
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 2 -->
                    <h5>Ảnh sản phẩm</h5>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job Title :</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Name :</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Job Description :</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 3 -->
                    <h5>Thuộc tính</h5>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Interview For :</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Interview Type :</label>
                                    <select class="form-control">
                                        <option>Normal</option>
                                        <option>Difficult</option>
                                        <option>Hard</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Interview Date :</label>
                                    <input type="text" class="form-control date-picker" placeholder="Select Date" />
                                </div>
                                <div class="form-group">
                                    <label>Interview Time :</label>
                                    <input class="form-control time-picker" placeholder="Select time" type="text" />
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 4 -->
                    <h5>Mô tả sản phẩm</h5>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Behaviour :</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Confidance</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Result</label>
                                    <select class="form-control">
                                        <option>Select Result</option>
                                        <option>Selected</option>
                                        <option>Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Comments</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>



        <!-- success Popup html Start -->
        <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- success Popup html End -->
    </div>
    <div class="footer-wrap pd-20 mb-20 card-box">
        DeskApp - Bootstrap 4 Admin Template By
        <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
    </div>
</div>
@endsection