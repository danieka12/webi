<select class="livesearch form-control" name="livesearch"></select>

@push('styles')
<link href={{ asset("vendor/select2/css/select2.min.css") }} rel="stylesheet" />
@endpush

@push('scripts')
<script src={{ asset("vendor/select2/js/select2.min.js") }}></script>
<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Pilih Kategori Materi',
        ajax: {
            url: "{{ route('guru.categories') }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.judul,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
@endpush