$(document).ready(function(){
    $("#search").keyup(function(){
       var query = $(this).val();
       if (query != "") {
         $.ajax({
           url: '../../trap-flix/models/search.php',
           method: 'POST',
           data: {query:query},
           success: function(data){

             $('#output').html(data);
             $('#output').css('display', 'flex');

             $("#search").focusout(function(){
                 $('#output').css('display', 'flex');
             });
             $("#search").focusin(function(){
                 $('#output').css('display', 'flex');
             });
           }
         });
       } else {
       $('#output').css('display', 'none');
     }
   });
 });