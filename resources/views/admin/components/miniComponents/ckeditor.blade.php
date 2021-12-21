<textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>

@push('scripts')
<script src={{ asset('vendor/ckeditor/ckeditor.js') }}></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

{{-- to active image upload option --}}
{{-- <script type="text/javascript">
    CKEDITOR.replace('wysiwyg-editor', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script> --}}
@endpush