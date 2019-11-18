var postId =0;
var postBodyElement=null;
$('.post').find('.interaction').find('.edit').on('click',function(event){
//$('.a').on('click',function(){
    event.preventDefault();
    postBodyElement=event.target.parentNode.parentNode.children[0];
   var postBody = postBodyElement.textContent;
  
   $('#post-body').val(postBody);
    $('#editModal').modal();

    $('#modal-save').click(function(){
  
        var newPost = $('#post-body').val();
        postId = event.target.parentNode.parentNode.dataset['postid'];
        event.target.parentNode.parentNode.children[0].textContent = newPost;
        $('#editModal').modal('hide');

        $.ajax({
            method:"POST",
            url:urlEdit,
            data:{body:$('#post-body').val(), postId:postId,_token:token},
            
        })
        .done(function(msg){
            //console.log(JSON.stringify(msg));
        });
           
    });
    
});
$('.like').on('click',function(event){
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling==null;
    $.ajax({
        method:"POST",
        url:urlLike,
        data:{isLike:isLike,postId:postId,_token:token},
    })
      .done(function(){
          event.target.innerText=isLike? event.target.innerText=='Like'?'You like this post':'Like':event.target.innerText=='Dislike'?'You don\'t like this post':'Dislike';
          if(isLike){
              event.target.nextElementSibling.innerText='Dislike';
          }else{
              event.target.previousElementSibling.innerText='Like';
          }
      });
    
});
