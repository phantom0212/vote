
//Add User
$('#btnAddUser').click(function () {
    $('#btn-save').val("Add");
    $('#frmProducts').trigger("reset");
    $('#myModal').modal('show');
});
$('#btn-save').click(function () {
    var name = $('#userName').val();
    var email = $('#emailUser').val();
    var password = $('#userPassword').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });
    $.ajax({
        type: 'post',
        url: 'admin/add-user',
        data: {
            'name': name,
            'email': email,
            'password': password
        },
        success: function (data) {
            if (data.messenger == 'Success!')
            {
                var list_user = "<tr><td>" + data.name + "</td><td></td><td>" + data.email + "</td>";
                list_user += '<td><button class="btn btn-warning fa fa-edit open_modal" value="' + data.id + '">Edit</button>';
                list_user += ' <button class="btn btn-danger fa fa-remove delete-user" value="' + data.id + '">Delete</button></td></tr>';
                $('.listUser').append(list_user);
                swal("Cập nhật thành công!");
                $('#myModal').modal('hide');
            }else {
                swal("Email is exits!");
            }

        }
    });
});

//Delete User
$('.delete-user').click(function(){
    var user_id = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
    $.ajax({
        type: "DELETE",
        url:'admin/delete/' + user_id,
        success: function () {
            $(".user_list" + user_id).remove();
        }
    });
});

//Edit User
$('.open_modal').click(function(){
    var user_id = $(this).val();

    $.get(url + 'admin/user/' + user_id, function (data) {
        //success data
        $('#product_id').val(data.id);
        $('#name').val(data.name);
        $('#details').val(data.details);
        $('#btn-save').val("update");
        $('#myModal').modal('show');
    })
});
