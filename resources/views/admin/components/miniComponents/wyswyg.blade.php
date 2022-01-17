<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-pencil"></i>{{ $title }}</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{ $description }}</label>
                @include('admin.components.miniComponents.ckeditor')
            </div>
        </div>
    </div>
    <!-- /row-->
</div>
