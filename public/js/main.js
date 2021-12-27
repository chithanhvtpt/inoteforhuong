
function showCreate() {
    $("#noteCreate").modal("show");
}

function addNote() {
    let title = $("#title").val();
    let content = $("#content").val();
    let date = $("#date").val();
    let category = $("#category").val();

    let _url = origin + `/api/note/create`;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: _url,
        type: "POST",
        data: {
            title: title,
            content: content,
            date: date,
            category_id: category
        }, success: function (res) {
            // window.location.reload();
            note = res;
            $('.list-note').prepend(`
                        <tr id="note_${note.id}">
                            <td>${note.id}</td>
                            <td>${note.title}</td>
                            <td>${note.content}</td>
                            <td>${note.date}</td>
                            <td>${note.category.name}</td>
                            <td>${note.user.name}</td>
                            <td>
                                <button  onclick="editNote(${note.id})" class="btn btn-info">Edit</button>
                                </td>
                                <td>
                                <button class="btn btn-danger" onclick="deleteNote(${note.id})">Delete</button>
                            </td>
                        </tr>
                    `);
            // $('#title').val('');
            // $('#content').val('');
            // $('#date').val('');
            $('#noteCreate').modal('hide');
            toastr.success("Add New Success")
        }
    })
}

function deleteNote(id) {
    let url = origin + `/api/note/delete/${id}`;
    if (confirm("Are you sure ?")) {
        $.ajax({
            url: url,
            type: "DELETE",
            success: function (response) {
                $("#note_" + id).remove();
                toastr.success("Delete Success");
                showListNote();
            }
        })
    }
}

function showEdit(id) {
    let url = origin + `/api/note/${id}/detail`
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            $("#note_id").val(response.id);
            $("#editTitle").val(response.title);
            $("#editContent").val(response.content);
            $("#editDate").val(response.date);
            $("#editCategory").val(response.category_id);
            $('#noteEdit').modal('show');
        }
    })

    // $("#editTitle").val();
    // $("#editContent").val();
    // $("#editDate").val();
    // $("#editCategory").val();
    // $('#noteEdit').modal('show');
}

function editNote() {
    let title = $('#editTitle').val();
    let content = $('#editContent').val();
    let date = $('#editDate').val();
    let category = $('#editCategory').val();
    let id = $('#note_id').val();
    let _url = origin + `/api/note/edit/${id}`;
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });

    $.ajax({
        url: _url,
        type: "PUT",
        data: {
            title: title,
            content: content,
            date: date,
            category_id: category
        },
        success: function (data) {
            console.log(data)
            $('#noteEdit').modal('hide');
            showListNote();
        }
    });
}

showListNote();
function showListNote() {
    let _url = origin + '/api/note/search';
    $.ajax({
        url: _url,
        type: 'GET',
        success: function (res) {
            let html = '';
            res.forEach(function (item) {
                html += '<tr id="note_" '+ item.id +'>';
                html += '<td>';
                html += item.id;
                html += '</td>';
                html += '<td>';
                html += item.title;
                html += '</td>';
                html += '<td>';
                html += item.content;
                html += '</td>';
                html += '<td>';
                html += item.date;
                html += '</td>';
                html += '<td>';
                html += item.category.name;
                html += '</td>';
                html += '<td>';
                html += item.user.name;
                html += '</td>';
                html += '<td>';
                html += '<button class="btn btn-info" onclick="showEdit('+item.id+')">Edit</button>'
                html += '</td>';
                html += '<td>';
                html += '<button class="btn btn-danger" onclick="deleteNote('+item.id+')">Delete</button>'
                html += '</td>';
                html += '</tr>';
            });
            $('.list-note').html(html)
        }
    })
}



