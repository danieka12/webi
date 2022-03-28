<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-pencil"></i>{{ $title }}

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{ $description }}
                    @if ($required)
                        @include(
                            'admin.components.miniComponents.required-fill'
                        )
                    @endif
                </label>
                @include(
                    'admin.components.miniComponents.editor-single',
                    [
                        'id' => $id,
                    ]
                )
            </div>
        </div>
    </div>
    <!-- /row-->
</div>





@push('scripts')
    <script>
        let _token = $('meta[name="csrf-token"]').attr("content");
        /**
         * To initialize the Editor, create a new instance with configuration object
         * @see docs/installation.md for mode details
         */
        var editor = new EditorJS({
            table: Table,
            quote: {
                class: Quote,
                inlineToolbar: true,
                shortcut: "CMD+SHIFT+O",
                config: {
                    quotePlaceholder: "Enter a quote",
                    captionPlaceholder: "Quote's author",
                },
            },
            tools: {
                image: {
                    class: ImageTool,
                    config: {
                        additionalRequestHeaders: {
                            "X-CSRF-TOKEN": _token,
                        },
                        endpoints: {
                            byFile: "{{ route('guru.course.uploadImageNew') }}", // Your backend file uploader endpoint
                            byUrl: "{{ route('guru.course.uploadImageURL') }}", // Your endpoint that provides uploading by Url
                        },
                    },
                },
                hyperlink: {
                    class: Hyperlink,
                    config: {
                        shortcut: "CMD+L",
                        target: "_blank",
                        rel: "nofollow",
                        availableTargets: ["_blank", "_self"],
                        availableRels: ["author", "noreferrer"],
                        validate: false,
                    },
                },
                list: {
                    class: NestedList,
                    inlineToolbar: true,
                    config: {
                        defaultStyle: "unordered",
                    },
                },
                tooltip: {
                    class: Tooltip,
                    config: {
                        location: "left",
                        highlightColor: "#FFEFD5",
                        underline: true,
                        backgroundColor: "#154360",
                        textColor: "#FDFEFE",
                        holder: "editorjs",
                    },
                },
                breakLine: {
                    class: BreakLine,
                    inlineToolbar: true,
                    shortcut: "CMD+SHIFT+ENTER",
                },
                underline: Underline,
                textAlign: TextAlign,
                header: HeaderEditor,
                code: Code,
                checklist: {
                    class: Checklist,
                    inlineToolbar: true,
                },
                Marker: {
                    class: Marker,
                    shortcut: "CMD+SHIFT+M",
                },
            },
            onReady: () => {
                new DragDrop(editor);
            },
        });
    </script>
@endpush
