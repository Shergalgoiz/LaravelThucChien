@extends('layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=> 'category','key'=>'Add'])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label">Chọn danh mục cha</label>
                                <select class="form-control" name="parten_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection