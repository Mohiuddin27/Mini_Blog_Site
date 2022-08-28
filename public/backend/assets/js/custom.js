(function($){
  $(document).ready(function(){
    $('a#logout-button').click(function(e){
        e.preventDefault();
        $('form#logout-form').submit();
    });

  });
   


 


  $(document).on('submit','form#add_post_category_form',function(e){
      e.preventDefault();
      let name=$('form#add_post_category_form input[name="name"]').val();
      if(name ==''){
        $('.mess').html('<p class="alert alert-danger">All Fields are required!<button class="close" data-dismiss="alert">&times;</button></p>')
      }else{
        $.ajax({
          url:'post-category-create',
          method:"POST",
          contentType:false,
          processData:false,
          data: new FormData(this),
          success: function(data){
            $('.mess').html('<p class="alert alert-success">Category added successfull!<button class="close" data-dismiss="alert">&times;</button></p>')
            $('form#add_post_category_form')[0].reset();
            window.location.reload();

           

          }
        });
      }
  });
  // $(document).on('click','a#edit_category',function(e){
  //  e.preventDefault();
  //  let id=$(this).attr('category_id');
  //  $.ajax({
  //     url : 'edit-category/' + id,
  //     dataType : "json",
  //     success:function(data){
  //       $("#edit_category_modal input[id='category_id']").val(data.id);
  //       $("#edit_category_modal input[id='name']").val(data.name);
  //     }
  //  });

  // });

  // //edit category
  // $(document).on('click','.update',function(e){
  //   e.preventDefault();
  //   let id= $("#edit_category_modal input[id='category_id']").val();
  //   $.ajax({
  //      url : 'edit-category/' + id,
  //      method: "PUT",
  //      data: data,
  //      dataType : "json",
  //      success:function(data){
  //       $('.mess').html('<p class="alert alert-success">Category update successfull!<button class="close" data-dismiss="alert">&times;</button></p>')
      
  //      }
  //   });
 
  //  });
 
//delete category

$(document).on('click','a#delete_category',function(e){
  e.preventDefault();
  let id=$(this).attr('category_id');
  let choice = confirm(this.getAttribute('data-confirm'));

  if(choice){
    $.ajax({
      url : 'delete-category/' + id,
      success:function(data){
       window.location.reload();
       $('.messs').html('<p class="alert alert-success">Category delete successfull!<button class="close" data-dismiss="alert">&times;</button></p>')
      }
   });
  }
 });



 //post featured image load
 $(document).on('change',"input#fimage",function(e){
     e.preventDefault();
     let post_image_url=URL.createObjectURL(e.target.files[0]);
     $('img#post_featured_image_load').attr('src',post_image_url);
 });
//post edit featured image load
//post featured image load
$(document).on('change',"input#fimageedit",function(e){
  e.preventDefault();
  let post_image_url=URL.createObjectURL(e.target.files[0]);
  $('img#post_featured_image_edit').attr('src',post_image_url);
});


 //editor add
 CKEDITOR.replace('post_editor');
 CKEDITOR.replace('edit_post_editor');

$(document).ready(function() {
  $('#category').select2();
  $('#category_list').select2();

});

 //post add
 $(document).on('submit','form#add_post_form',function(e){
  e.preventDefault();
  let title=$('form#add_post_form input[name="title"]').val();
  let category=$('form#add_post_form input[name="category"]').val();
  let content=$('form#add_post_form input[name="content"]').val();
  if(title =='' || category == '' || content == ''){
    $('.postmess').html('<p class="alert alert-danger">All Fields are required!<button class="close" data-dismiss="alert">&times;</button></p>')
  }else{
    $.ajax({
      url:'post-create',
      method:"POST",
      contentType:false,
      processData:false,
      data: new FormData(this),
      success: function(res){
        if(res.status == 200){
          Swal.fire(
            'Added',
            'Post Added Successfully!',
            'success'
          )
          setTimeout(function() {
            window.location.reload();
          }, 2000);
        

        }

        // $('.postmess').html('<p class="alert alert-success">Post added successfull!<button class="close" data-dismiss="alert">&times;</button></p>')
        $('form#add_post_form')[0].reset();
        $('#post-modal').modal('hide');
        // $('img#post_featured_image_load').attr('src','');

      
       
       

      }
    });
  }
});


//data table
$(document).ready( function () {
  $('table#post_table').DataTable();
  $('table#category_table').DataTable();
  $('table#customer_category').DataTable();
} );

//edit post
$(document).on('click','#edit_post',function(e){
  e.preventDefault();
  
  let edit_id=$(this).attr('edit_id');
  $.ajax({
    url:'post-edit/' + edit_id,
    success:function(data){
      $('#edit_post-modal input[name="id"]').val(data.id);
      $('#edit_post-modal input[name="title"]').val(data.title);
      $('#post_featured_image_edit').attr('src','media/posts/'+ data.image);
      $('#edit_post-modal .cat').html(data.cat_list);
      $('#edit_post-modal textarea').text(data.content);

      $('#edit_post-modal').modal('show');
    }
  })
});


//delete post

$(document).on('click','a#delete_post',function(e){
  e.preventDefault();
  let id=$(this).attr('delete_id');
  
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if(result.isConfirmed) {
      $.ajax({
        url : 'delete-post/' + id,
        success:function(data){
          Swal.fire(
            'Delete',
            'Post Deleted Successfully!',
            'success'
          )
          setTimeout(function() {
            window.location.reload();
          }, 2000);

        
        }
     });
    }
  })
 });

 //add customer cateogry
 $(document).on('submit','form#add_customer_category_form',function(e){
  e.preventDefault();
  let name=$('form#add_customer_category_form input[id="name"]').val();
  if(name ==''){
    $('.mess').html('<p class="alert alert-danger">All Fields are required!<button class="close" data-dismiss="alert">&times;</button></p>')
  }else{
    $.ajax({
      url:'customer-category-create',
      method:"POST",
      contentType:false,
      processData:false,
      data: new FormData(this),
      success: function(res){
        if(res.status == 200){
          Swal.fire(
            'Added',
            'CustomerCategory Added Successfully!',
            'success'
          )
          setTimeout(function() {
            window.location.reload();
          }, 2000);
        

        }
        $('#category-modal').modal('hide');
       

      }
    });
  }
});
//show all customer category
function allcustomercateogry(){
  $.ajax({
    url: "customer_category",
   
    success: function (data) {
      $('tbody#customercategory').html(data);
      processing:true;
     
    }
  });
}
allcustomercateogry()
})(jQuery)