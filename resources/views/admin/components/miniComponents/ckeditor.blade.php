<textarea class="ckeditor form-control" name={{ $name }}>
{{ $defaultValue }}
</textarea>

@push('scripts')
    <script src={{ asset('vendor/ckeditor/ckeditor.js') }}></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    });
    </script>
@endpush
