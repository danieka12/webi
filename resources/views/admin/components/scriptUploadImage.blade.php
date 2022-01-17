@push('styles')
    <link href={{ asset('js/admin/vendor/dropzone.css') }} rel="stylesheet">
@endpush
@push('scripts')
    <!-- Custom scripts for this page-->
    <script src={{ asset('js/admin/vendor/dropzone.min.js') }}></script>
    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", {
            maxFilesize: 2, // 2 mb
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
            init: function() {
                if ("{{ isset($data['image']['name']) }}") {
                    var thisDropzone = this;
                    var mockFile = {
                        name: "{{ isset($data['image']) ? $data['image']['name'] : '' }}",
                        size: "{{ isset($data['image']) ? $data['image']['size'] : '' }}",
                        type: "{{ isset($data['image']) ? $data['image']['type'] : '' }}"
                    };
                    thisDropzone.emit("addedfile", mockFile);
                    thisDropzone.emit("success", mockFile);
                    thisDropzone.emit("thumbnail", mockFile,
                        "{{ isset($data['image']) ? asset($data['image']['coverUrl']) : '' }}")

                    this.on("maxfilesexceeded", function(file) {
                        this.removeFile(file);
                        alert("No more files please!");
                    });
                }


            },
        });
        myDropzone.on("success", function(file, response) {
            if (response.success) { // Result
                $(".image-upload-value").val(response.success)
            }
        });
    </script>
@endpush
