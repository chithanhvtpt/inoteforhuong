@extends("frontend.layout.master")
@section("content")
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 8 Ajax CRUD Tutorial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @toastr_css
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" onclick="showCreate()"
                            data-target="noteCreate">Add
                        Note
                    </button>
                </div>
            </div>
            <div class="row" style="clear: both;margin-top: 18px;">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>User</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </thead>
                        <tbody class="list-note">
                        @foreach($notes as $key => $note)
                            <tr id="note_{{$note->id}}">
                                <td>{{ $key++  }}</td>
                                <td>{{ $note->title }}</td>
                                <td>{{ $note->content }}</td>
                                <td>{{ $note->date }}</td>
                                <td>{{$note->category->name}}</td>
                                <td>{{$note->user->name}}</td>
                                <td><button data-id="" onclick="showEdit({{$note->id}})" class="btn btn-info">Edit</button></td>
                                <td><button class="btn btn-danger" onclick="deleteNote({{$note->id}})">Delete</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$notes->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

{{--note create--}}
<div class="modal fade" id="noteCreate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Note</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="col-sm-2">Title</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" name="todo" placeholder="Enter task">
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2">Content</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="content" name="contentCreate"
                               placeholder="Enter task">
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2">Date</label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" id="date" name="dateCreate" placeholder="Enter task">
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Category</label>
                    <div class="col-sm-12">
                        <select name="category" id="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="addNote()">Save</button>
            </div>
        </div>
    </div>
</div>
{{--note update--}}
<div class="modal fade" id="noteEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Note </h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="editId" id="note_id">
                <div class="form-group">
                    <div class="form-group">
                        <label for="name" class="col-sm-2">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="editTitle" name="todo" placeholder="Enter task">
                            <span id="taskError" class="alert-message"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2">Content</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="editContent" name="todo" placeholder="Enter task">
                            <span id="taskError" class="alert-message"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2">Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="editDate" name="todo" placeholder="Enter task">
                            <span id="taskError" class="alert-message"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Category</label>
                        <div class="col-sm-12">
                            <select id="editCategory">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span id="taskError" class="alert-message"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="editNote()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <form id="form-form">
        <div><input type="text"></div>
        <div><input type="text"></div>
        <div><input type="text"></div>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
            integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
            crossorigin="anonymous"></script>
    <script src="{{asset("js/main.js")}}"></script>
    @jquery
    @toastr_js
    @toastr_render
@endsection
