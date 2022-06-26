@extends('admin.template.master_layout')
@section('page-title','Admin | Form')
@section('link_private')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .error {
            color: red;
        }

        .ck-editor__editable_inline {
            min-height: 400px;
        }
    </style>

@endSection
@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Account</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Account / Create</li>
        </ol>
    </div><!-- /.col -->
@endSection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Account</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="formRegis" name="formRegis">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" name="email" class="form-control col-3" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="status">Account Type</label>
                            <select name="role" id="role" class="form-control col-2">
                                <option value="1" selected>Admin</option>
                                <option value="0">Customer</option>
                            </select>
                            <span class="error stauts_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="fullName" id="fullName" class="form-control col-3" placeholder="Full name">
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" name="password" id="password" class="form-control col-3" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="cfpassword">Confirm Password</label>
                            <input type="password" name="cfpassword" class="form-control col-3" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control col-3" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control col-3" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control col-3" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Avatar</label></br>
                            <button type="button" id="btnThumbnailLink" class="btn btn-info mt-1"
                                    value="Choose your file">Add Avatar</button></br>
                            <div id="list-preview-image"></div>
                            <input id="avatar" type="text" value="" name="avatar" style="display: none">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="btn-submit">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endSection
@section('script_private')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="/dist/js/pages/user/create_user.js"></script>
@endSection
