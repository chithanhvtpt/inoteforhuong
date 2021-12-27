<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<table border="1px">
    <a href="{{route("notes.create")}}">add new product</a>
    <a href="{{route("auth.logout")}}">logout</a>
    <a href="{{route("categories.index")}}">Category</a>
    <a href="{{route("notes.index")}}">Note</a>
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Content</th>
        <th>Date</th>
        <th>Category</th>
    </tr>
    </thead
    @foreach($notes as $note)
    <tbody>
    <tr>
        <td>{{$note->id}}</td>
        <td>{{$note->title}}</td>
        <td>{{$note->content}}</td>
        <td>{{$note->date}}</td>
        <td>{{($note->category) ? $note->category->name : 'chua phan loai' }}</td>
        <td><a type="button" href="{{route("notes.detail", $note->id)}}">Detail</a></td>
        <td><a type="button" href="{{route("notes.edit", $note->id)}}">Edit</a></td>
        <td><a type="button" onclick="return confirm('Are you sure')" href="{{route("notes.delete", $note->id)}}">Delete</a></td>
    </tr>
    </tbody>
    @endforeach
</table>
</body>
</html>
