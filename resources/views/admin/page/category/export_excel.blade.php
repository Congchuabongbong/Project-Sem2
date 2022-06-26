<!DOCTYPE html>
<html>
<head>
    <title>Export Data to Excel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
    </style>
</head>
<body>
<br />
<div class="container">
    <div align="center">
        <a href="/admin/export-excel/excel/category" class="btn btn-success">Export to Excel</a>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Description</td>
                <td>CreatedAt</td>
            </tr>
            @foreach($category_data as $cate)
                <tr>
                    <td>{{ $cate->id }}</td>
                    <td>{{ $cate->name }}</td>
                    <td>{{ $cate->description }}</td>
                    <td>{{ $cate->created_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>
