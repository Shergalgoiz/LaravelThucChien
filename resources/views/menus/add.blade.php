@extends('layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=> 'menus','key'=>'Add'])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                <form action="{{route('menus.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label">Tên menus</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label">Chọn menus cha</label>
                                <select class="form-control" name="parten_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    
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