<select class="livesearch form-control" name={{ $name }}>
    @if (isset($defaultValue))
        <option value={{ $defaultValue['id'] }} selected="selected">{{ $defaultValue['value'] }}</option>  
    @endif                
</select>

@push('styles')
<link href={{ asset("vendor/select2/css/select2.min.css") }} rel="stylesheet" />
@endpush

@push('scripts')
<script src={{ asset("vendor/select2/js/select2.min.js") }}></script>
<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: "{{ $placeholder }}",
        ajax: {
            url: "{{ $route }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.judul,
                            id: item.id,
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
@endpush