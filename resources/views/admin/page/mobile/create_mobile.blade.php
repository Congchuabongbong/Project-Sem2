@extends('admin.template.master_layout')
@section('page-title','Admin | Create Mobile')
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
    <h1 class="m-0">Mobile</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Mobile / Create</li>
    </ol>
</div><!-- /.col -->
@endSection
@section('content')
<div class="row">
    <div class="col-md-6">

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Mobile Information</h3>
            </div>
            <div class="card-body">
                <!-- name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control col-5" placeholder="Enter name...">
                    <span class="error name_error"></span>
                </div>

                <!-- brand -->
                <div class="form-group">
                    <label for="brandID">Brand</label>
                    <select name="brandID" class="form-control col-4">
                        @foreach ($brands as $brand)
                        <option value="{{$brand-> id}}">{{$brand-> name}}</option>
                        @endforeach
                    </select>
                    <span class="error brandID_error"></span>
                </div>

                <!-- category -->
                <div class="form-group" style="display: none">
                    <label for="categoryID">Category</label>
                    <select name="categoryID" class="form-control col-2">
                        <option value="1"></option>
                    </select>
                    <span class="error categoryID_error"></span>
                </div>

                <!-- price -->
                <div class="form-group">
                    <label for="price">Price (VND)</label>
                    <input type="number" name="price" class="form-control col-3" placeholder="Enter price...">
                    <span class="error price_error"></span>
                </div>
                <!-- sale off -->
                <div class="form-group">
                    <label for="saleOff">Sale Off</label>
                    <input type="number" name="saleOff" class="form-control col-2" id="saleOff"
                        placeholder="Enter sale off...">
                    <span class="error saleOff_error"></span>
                </div>
                <!-- quantity -->
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control col-3" placeholder="Enter quantity...">
                    <span class="error quantity_error"></span>
                </div>
                <!-- /.status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control col-4">
                        <option value="1">On sale</option>
                        <option value="2">Out of stock</option>
                        <option value="3">Stop selling</option>
                        <option value="4">Sale off</option>
                    </select>
                    <span class="error stauts_error"></span>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col (left) -->
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Specifications</h3>
            </div>
            <div class="card-body">
                <!-- color -->
                <div class="form-group">
                    <label for="color">Color</label>
                    {{-- <input type="text" name="color" class="form-control col-3" placeholder="Enter color..."> --}}
                    <input type="text" list="colors" type="text" name="color" class="form-control col-3"
                        placeholder="Enter color..." />
                    <datalist id="colors">
                        <option>White</option>
                        <option>Gray</option>
                        <option>Black</option>
                        <option>Red</option>
                        <option>Yellow</option>
                        <option>Blue</option>
                        <option>Green</option>
                        <option>Orange</option>
                        <option>Pink</option>
                        <option>Brown</option>
                    </datalist>
                    <span class="error color_error"></span>
                </div>
                <!-- ram -->
                <div class="form-group">
                    <label for="ram">Ram (GB)</label>
                    <input type="number" list="rams" name="ram" class="form-control col-2" placeholder="Enter ram...">
                    <datalist id="rams">
                        <option>3</option>
                        <option>4</option>
                        <option>8</option>
                        <option>16</option>
                        <option>32</option>
                        <option>64</option>
                    </datalist>
                    <span class="error ram_error"></span>
                </div>
                <!-- Memory -->
                <div class="form-group">
                    <label for="memory">Memory (GB)</label>
                    <input type="number" list="memories" name="memory" class="form-control col-2"
                        placeholder="Enter memory...">
                    <datalist id="memories">
                        <option>8</option>
                        <option>16</option>
                        <option>32</option>
                        <option>64</option>
                        <option>128</option>
                        <option>256</option>
                        <option>512</option>
                        <option>1028</option>
                    </datalist>
                    <span class="error memory_error"></span>
                </div>

                <!-- Pin (mah) -->
                <div class="form-group">
                    <label for="pin">Pin (mah)</label>
                    <input type="number" name="pin" class="form-control col-2" placeholder="Enter pin...">
                    <span class="error pin_error"></span>
                </div>
                <!-- camera (pixel) -->
                <div class="form-group">
                    <label for="camera">Camera (pixel)</label>
                    <input type="number" name="camera" class="form-control col-2" placeholder="Enter camera...">
                    <span class="error camera_error"></span>
                </div>
                <!-- Screen (inch) -->
                <div class="form-group">
                    <label for="screenSize">Screen Size (inch)</label>
                    <input type="number" name="screenSize" class="form-control col-3"
                        placeholder="Enter screen size...">
                    <span class="error screenSize_error"></span>
                </div>
                <!-- /.form group -->

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


    </div>
    <!-- /.col (right) -->
</div>
<div class="row">
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Specific Description</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="mainForm">
                <div class="card-body">
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label></br>
                        <button type="button" id="btnThumbnailLink" class="btn btn-info mt-2"
                            value="Choose your file">Add
                            files</button></br>
                        <div id="list-preview-image"></div></br>
                        <input id="valueUpLoad" type="text" value="" name="thumbnail" style="display: none">
                        <span class="error thumbnail_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control col-7" rows="3"
                            placeholder="Enter description ..."></textarea>
                        <span class="error description_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="detail">Content detail</label>
                        <textarea name="detail" class="ck-editor__editable_inline" id="editor"></textarea>
                        <span class="error detail_error"></span>
                    </div>
            </form>
        </div>
    </div>
</div>
<div class="row card-body">
    <div class="form-group">
        <button type="submit" class="btn btn-success" id="btn-submit">Submit</button>
        <button type="reset" class="btn btn-secondary" id="btn-reset">Reset</button>
    </div>
</div>

@endSection
@section('script_private')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script src="/dist/js/pages/mobile/create_mobile.js"></script>
@endSection
