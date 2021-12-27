<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1px">
    @csrf
    <a href="{{route("notes.create")}}">add new product</a>
    <a href="{{route("auth.logout")}}">logout</a>
    <a href="{{route("categories.index")}}">Category</a>
    <a href="{{route("notes.index")}}">Note</a>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
    </thead
    @foreach($categories as $category)
        <tbody>
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td><a type="button" href="">Edit</a></td>
            <td><a type="button" onclick="return confirm('Are you sure')" href="">Delete</a></td>
        </tr>
        </tbody>
    @endforeach
</table>
</body>
</html>
