<div class="ce-example">
    <div class="ce-example__header">
    </div>
    <div class="ce-example__content _ce-example__content--small">
        <div name="editorjs_data" id="editorjs"></div>
    </div>
    <div class="ce-example__output">
        <pre class="ce-example__output-content" id="{{ $id }}"></pre>
    </div>
</div>

@push('styles')
    <style>
        .ce-block__content,
        .ce-toolbar__content {
            max-width: calc(100% - 80px) !important;
        }

        .cdx-block {
            max-width: 100% !important;
        }

    </style>
@endpush
