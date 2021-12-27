<form method="post">
    @csrf
    <input type="text" name="title" placeholder="Tiêu đề">
    <input type="textcd" name="content" placeholder="Nội dung">
    <input type="text" name="date" placeholder="Ngày tháng">
    <select name="category">
    @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    <button type="submit">Thêm mới</button>
</form>
