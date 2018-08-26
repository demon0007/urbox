var sticky;
$(document).ready(function (){
  sticky = $('#navbar').offset().top;
  $('.datepicker').datepicker();
  $('#datetimepicker9').datepicker({
                autoclose:true,
                viewMode: 'years'
            });
});

function myFunction() {
  if (window.pageYOffset >= sticky) {
    $("#navbar").addClass("sticky");
    console.log("done");
  } else {
    $("#navbar").removeClass("sticky");
  }
}

function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
           reader.onload = function (e) {
               $('#blah').attr('src', e.target.result);
           };

           reader.readAsDataURL(input.files[0]);
       } else {
          $('#blah').attr('src', 'img/generic-user.png');
        }
   }

   function myErr() {

     $("#col-btn").addClass('btn-danger');
     $("#usern").attr("data-toggle","tooltip");
     $("#usern").attr("data-placement","bottom");
     $("#usern").attr("title","Invalid Username And Password");
     $("#pass").attr("data-toggle","tooltip");
     $("#pass").attr("data-placement","bottom");
     $("#pass").attr("title","Invalid Username And Password");
     $("#usern").addClass('has-error');
     $("#pass").addClass('has-error');
     //data-toggle="tooltip" data-placement="left" title="Tooltip on left"
   }
