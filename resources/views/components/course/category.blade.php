<li>
    <select name="orderby" class="selectbox">
        <option value="category">Materi</option>
        @foreach ($courseLabelList as $label)
            <option value={{ $label['id'] }}>{{ $label['title'] }}</option>
        @endforeach
        </select>
</li>