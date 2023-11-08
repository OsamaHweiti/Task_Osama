<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


<script>
    //      let addBtn = document.getElementById('addUser-btn');
    //     let addDiv = document.getElementById('adddiv');
    //     addBtn.addEventListener('click', function() {
    //         addDiv.style.display = 'block';
    //     })

    //    function cancelbtnuser(){
    //     document.getElementById('canclebuttonuser').style.display = 'none';
    //    }

    error = false;

    function validate() {
        if (document.blogform.title.value != '' && document.blogform.category.value != '' && document.blogform
            .description
            .value != '')
            document.blogform.btnsave.disabled = false
        else
            document.blogform.btnsave.disabled = true
    }

    $(document).ready(function() {

        /* When click New blogs button */
        $('#new-blogs').click(function() {
            $('#btn-save').val("create-blogs");
            $('#blogs').trigger("reset");
            $('#blogsCrudModal').html("Add New blogs");
            $('#crud-modal').modal('show');
        });

        /* Edit blogs */
        $('body').on('click', '#edit-blogs', function() {
            var blogs_id = $(this).data('id');
            $.get('dashboard/' + blogs_id + '/edit', function(data) {
                $('#blogsCrudModal').html("Edit blogs");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled', false);
                $('#crud-modal').modal('show');
                $('#blog_id').val(data.id);
                $('#title').val(data.title);
                $('#category').val(data.category);
                $('#description').val(data.description);
                $('#photo').text(data.photo);

                $('#photo').removeAttr('required');


            })
        });
        /* Show blogs */
        $('body').on('click', '#show-blogs', function() {
            var blogs_id = $(this).data('id');
            $.get('dashboard/' + blogs_id + '/show', function(data) {
                $('#blogsCrudModal-show').html("Blog Details");
                $('#titleshow').text(data.title);
                $('#categoryshow').text(data.category);
                $('#descriptionshow').text(data.description);

                // Display the photo
                $('#photoshow').attr('src', 'images/' + data.photo);

                $('#crud-modal-show').modal('show');
            })


        })



        /* Delete blogs */
        // $('body').on('click', '#delete-blogs', function() {
        //     var blogs_id = $(this).data("id");
        //     var token = $("meta[name='csrf-token']").attr("content");
        //     // confirm("Are You sure want to delete !");

        //     $.ajax({
        //         type: "post",
        //         url: "dashboard/" + blogs_id ,
        //         data: {
        //             "id": blogs_id,
        //             "_token": token,
        //         },
        //         success: function(data) {
        //             $('#msg').html('blogs entry deleted successfully');
        //             $("#blogs_id_" + blogs_id).remove();
        //         },
        //         error: function(data) {
        //             console.log('Error:', data);
        //         }
        //     });
        // });
    });
</script>
