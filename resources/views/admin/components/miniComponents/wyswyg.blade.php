<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-pencil"></i>{{ $title }}

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{ $description }}
                    @if ($required)
                        @include('admin.components.miniComponents.required-fill')
                    @endif
                </label>
                @include('admin.components.miniComponents.ckeditor')
            </div>
        </div>
    </div>
    <!-- /row-->
</div>
