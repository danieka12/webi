@extends('admin.components.app', ['sizeConfirm', $sizeConfirm ?? 0])

@section('body')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            @include('admin.components.miniComponents.breadcrumbs')
            <!-- Icon Cards-->
            <div class="row">
                @include('admin.components.miniComponents.iconCard')
                <!-- /cards -->
                <h2></h2>
                @include('admin.components.miniComponents.statistic')
            </div>
            <!-- /.container-fluid-->
        </div>
    </div>
@endsection
