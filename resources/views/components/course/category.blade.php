<li>
    <select name="orderby" class="selectbox">
        <option value="category">Pilih MP</option>
        @foreach ($courseLabelList as $label)
            <option value={{ $label['id'] }}>{{ $label['title'] }}</option>
        @endforeach
        </select>
</li>