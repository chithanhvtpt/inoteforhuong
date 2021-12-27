<form method="post">
    @csrf
    <input type="text" name="title" placeholder="Tiêu đề" value="{{$note->title}}">
    <input type="text" name="content" placeholder="Nội dung" value="{{$note->content}}">
    <input type="text" name="date" placeholder="Ngày tháng" value="{{$note->date}}">
    <select name="category">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <button type="submit">Update</button>
</form>
