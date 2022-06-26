@extends('admin.template.master_layout')
@section('page-title','Admin | Edit Article')
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
        <h1 class="m-0">Article</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Article / Edit</li>
        </ol>
    </div><!-- /.col -->
@endSection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Article</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="mainForm">
                    <input type="text" name="id" class="form-control c" value="{{$result->id}}" style="display: none">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control col-3" placeholder="Enter title..." value="{{$result->title}}">
                            <span class="error title_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="brandID">Brand</label>
                            <select name="brandID" class="form-control col-2">
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" {{ $brand-> id === $result->brandID ? 'selected' : '' }}>{{$brand-> name}}</option>
                                @endforeach
                            </select>
                            <span class="error brandID_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="price">Author</label>
                            <input type="text" name="author" class="form-control col-2" placeholder="Enter author..." value="{{$result-> author}}">
                            <span class="error author_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label></br>
                            <button type="button" id="btnThumbnailLink" class="btn btn-info mt-2 mb-2"
                                    value="Choose your file">Change thumbnail</button></br>
                            <div id="list-preview-image"><img width="200px" src="{{$result->thumbnail}}" alt=""></div></br>
                            <input id="thumbnail" type="text" value="{{$result->thumbnail}}" name="thumbnail" style="display: none">
                            <span class="error thumbnail_error"></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control col-7" rows="3"
                                      placeholder="Enter description ...">{{$result->description}}</textarea>
                            <span class="error description_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="detail">Article detail</label>
                            <textarea name="detail" class="ck-editor__editable_inline" id="editor">
                                {!! $result->detail !!}
                            </textarea>
                            <span class="error detail_error"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="btn-submit">Submit</button>
                            <button type="reset" class="btn btn-secondary" id = "btn-reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endSection
@section('script_private')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="/dist/js/pages/article/edit_article.js"></script>
@endSection


