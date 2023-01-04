$(document).ready(function(e) {
    $("#lightGallery").lightGallery(e);
    $('#loginwithgooglemodal').modal('show');
});


function goolgelogin() {
    $('#loginwithgooglemodal').modal('show');
}

function likes(postid) {
    // alert(postid);
    var postid = postid;
    $.ajax({
        type: "GET",
        // url: "{{route('likes')}}",
        url: "/post-likes",
        data: {
            postid: postid
        },
        success: function(res) {
            $('.likeshow' + postid).hide();
            $('.likeremove' + postid).hide();
            $('#datalike' + postid).html(res);
            $('#datashow' + postid).show();
        },
    });
}


function deleteComment(ids) {

    var ids = ids.split(',');
    var comment_id = ids[0];
    var post_id = ids[1];
    var counter = $('#commentCountbox' + post_id).val();
    var desc = parseInt(counter) - 1;

    $('#commentCount-' + post_id).html(desc);
    $('#commentCountbox' + post_id).val(desc);

    $.ajax({
        type: "GET",
        // url: "{{route('deletesComment')}}",
        url: "/delete-comment",
        data: {
            comment_id: comment_id
        },
        success: function(res) {
            $('#comment_row' + post_id + comment_id).hide();

        },
    });
}


function opentestimonialForm() {
    $('#testimonialmodal').modal('show');
}

function rightContentForm() {
    $('#rightContentForm').modal('show');
}

function tagsCategory() {
    $('#tagandcategorymodal').modal('show');
}

function openIntrestForm() {
    $('#myIntrestModal').modal('show');
}

function intrestmodalremove() {
    $('#myIntrestModal').modal('hide');

}





$(document).on('click', '.btn_remove_post', function(e) {
    e.preventDefault();
    var post_id = $(this).data('id');
    swal({
        title: 'Are you sure?',
        text: "You won't delete this post!",
        icon: 'warning',
        buttons: true,
        buttonsStyling: false,
        reverseButtons: true
    }).then((confirm) => {
        if (confirm) {
            $.ajax({
                type: "GET",
                // url: "{{route('deletePost')}}",
                url: "/delete-post",
                data: { id: post_id },
                success: function(data) {
                    swal({
                        title: 'Success',
                        text: "Deleted",
                        icon: 'success',
                        buttons: true,
                        buttonsStyling: false,
                        reverseButtons: true
                    });
                    $('#main_post_div' + post_id).hide();
                }
            });
        }

    });

});

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $('.gallery').show();
                    $($.parseHTML('<img style="width:100px;height:100px;margin:20px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#post_image').on('change', function() {
        imagesPreview(this, 'div.gallery');
        $('#imageremovebtn').show();
    });
});


function removeImage() {
    $('#post_image').val('');
    $('.gallery').html('');
    $('.gallery').hide();
    $('#imageremovebtn').hide();

}


$(document).ready(function() {
    $('.select2').select2({
        dropdownCssClass: 'increasezindex'
    });
});


setTimeout(function() {
    $(document).ready(function() {

        $("#loginwithgooglemodal").modal('show');
        $('.modal-backdrop').remove();
    }, 10000);

    $(".comment_icon").click(function(event) {
        var id = $(this).data('id');
        var first_value = $('#commentCount-' + id).text();
        var value = parseInt(first_value);
        var counter = $('#commentCountbox' + id).val(value);
        $('#post_new_id').val(id);
    });
});

$('#post_image').change(function(event) {
    $('#post_Image').modal('hide');
});

function closemodal() {
    $('#loginwithgooglemodal').modal('hide');
}


function submitForm(id) {
    var counter = $('#commentCountbox' + id).val();
    var incr = parseInt(counter) + 1;

    $('#commentCount-' + id).html(incr);
    $('#commentCountbox' + id).val(incr);

    $("#commet_form" + id).submit(function(event) {
        var formData = {
            // "_token": "{{ csrf_token() }}",
            comment_message: $("#comment_message" + id).val(),
            "_token": $("#token").val(),
            post_id: $("#post_new_id").val(),
        };


        console.log(formData);
        $.ajax({
            type: "POST",
            // url: "{{route('sendComment')}
            url: "/send-comment",
            data: formData,
            dataType: "json",
            encode: true,
            success: function(res) {
                if (res.success == true) {
                    $('#commentId-' + id).prepend(res.data);
                    $('#comment_message' + id).val('');
                    $('#nocomment-' + id).hide();
                    //$('#commentCount-'+id).html(incr);
                    // $('#commentCountbox'+id).val(incr);
                }

            },
        });
        event.preventDefault();
        event.stopImmediatePropagation();
    });
}

function submitReply(id) {
    $("#reply" + id).submit(function(event) {
        var formData = {
            "_token": $("#token").val(),
            reply_message: $("#reply_message" + id).val(),
            comment_id: id,
        };

        $.ajax({
            type: "POST",
            // url: "{{route('sendReply')}}",
            url: "/send-reply",
            data: formData,
            dataType: "json",
            encode: true,
            success: function(res) {
                if (res.success == true) {
                    $('#replyview' + id).prepend(res.data);
                    $('#reply_message' + id).val('');
                }

            },
        });
        event.preventDefault();
        event.stopImmediatePropagation();
    });
}


$(document).ready(function(e) {
	var page = 1;
    var totalpost = $('#totalpost').val();
    
    if(totalpost >0){
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
               loadMoreData(page);
            }
        });
    }else{

    }
	
    
    function loadMoreData(page){
        var url = $('#ajaxurl').val();
        console.log(page);
        console.log(url+'?page=' + page);
	  $.ajax(
	        {
	            url: url+'?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.loader').show();
	            },success:function(data){
                        // console.log(data.html);
                    if(data.html ==''){
                        $('.loader').hide();
                        $('.nomore').html("No more records found");
                        return ;
                    }
                    $('.loader').hide();
                    $("#commonleft").append(data.html);
                },error:function(err){
                    console.log(err);
                }
	        });
	}


});




	




//========================= Below js is use for kamalk kalra theme (only), still not in  use =======================================
// $("#section_name").blur(function(event) {
//     var formData = {
//         "_token": "{{ csrf_token() }}",
//         id: $("#greating_id").val(),
//         value: $("#section_name").val(),
//     };

//     $.ajax({
//         type: "POST",
//         url: "{{route('editSection')}}",
//         data: formData,
//         dataType: "json",
//         encode: true,
//         success: function(res) {
//             alert('Save changes.');
//         },
//     });
//     event.preventDefault();
//     event.stopImmediatePropagation();
// });

// $("#section_descr").blur(function(event) {
//     var formData = {
//         "_token": "{{ csrf_token() }}",
//         id: $("#section_descr_id").val(),
//         value: $("#section_descr").val(),
//     };

//     $.ajax({
//         type: "POST",
//         url: "{{route('editSection')}}",
//         data: formData,
//         dataType: "json",
//         encode: true,
//         success: function(res) {
//             alert('Save changes.');
//         },
//     });
//     event.preventDefault();
//     event.stopImmediatePropagation();
// });

// $("#twitter_link").blur(function(event) {
//     var formData = {
//         "_token": "{{ csrf_token() }}",
//         id: $("#twitter_id").val(),
//         value: $("#twitter_link").val(),
//     };

//     $.ajax({
//         type: "POST",
//         url: "{{route('editSection')}}",
//         data: formData,
//         dataType: "json",
//         encode: true,
//         success: function(res) {
//             alert('Save changes.');
//         },
//     });
//     event.preventDefault();
//     event.stopImmediatePropagation();
// });

// $("#facebook_link").blur(function(event) {
//     var formData = {
//         "_token": "{{ csrf_token() }}",
//         id: $("#facebook_id").val(),
//         value: $("#facebook_link").val(),
//     };

//     $.ajax({
//         type: "POST",
//         url: "{{route('editSection')}}",
//         data: formData,
//         dataType: "json",
//         encode: true,
//         success: function(res) {
//             alert('Save changes.');
//         },
//     });
//     event.preventDefault();
//     event.stopImmediatePropagation();
// });

// $("#linkdin_link").blur(function(event) {
//     var formData = {
//         "_token": "{{ csrf_token() }}",
//         id: $("#linkdin_id").val(),
//         value: $("#linkdin_link").val(),
//     };

//     $.ajax({
//         type: "POST",
//         url: "{{route('editSection')}}",
//         data: formData,
//         dataType: "json",
//         encode: true,
//         success: function(res) {
//             alert('Save changes.');
//         },
//     });
//     event.preventDefault();
//     event.stopImmediatePropagation();
// });

// $("#youtube_link").blur(function(event) {
//     var formData = {
//         "_token": "{{ csrf_token() }}",
//         id: $("#youtube_id").val(),
//         value: $("#youtube_link").val(),
//     };

//     $.ajax({
//         type: "POST",
//         url: "{{route('editSection')}}",
//         data: formData,
//         dataType: "json",
//         encode: true,
//         success: function(res) {
//             alert('Save changes.');
//         },
//     });
//     event.preventDefault();
//     event.stopImmediatePropagation();
// });