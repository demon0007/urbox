var sticky;

$(document).ready(function (){
  sticky = $('.navbar').offset().top;
  $('.datepicker').datepicker();
  $('#datetimepicker9').datepicker({
                autoclose:true,
                viewMode: 'years'
            });
});

function myFunction() {
  if (window.pageYOffset >= sticky) {
    $(".navbar").addClass("navbar-fixed-top");
    $("#collapse").css("top","50px;");
    console.log("done");
  } else {
    $(".navbar").removeClass("navbar-fixed-top");
    $("#collapse").css("top","0px;");
  }
}

function myFiles(icon,name,size,type,loc,id){
  //console.log("hello");
  $(".file-nothing").html("");
  var del="deleted('"+loc+"','"+type+"')";
  var addtml = '<tr class="animated bounceInUp"><td><i class="fa '+icon+' fa-3x" aria-hidden="true"></td><td>'+name+'</td><td>'+size+'</td><td>'+type+'</td><td><a class="btn btn-info" target="_blank" href="http://localhost/urbox/users/'+loc+'" name="button">VIEW</td><td><a class="btn btn-success" type="button" href="'+loc+'" name="button" download><i class="fa fa-cloud-download fa-fw" aria-hidden="true"></a></td><td><button class="btn btn-danger" type="button" name="button" onclick="'+del+'"><i class="fa fa-trash-o fa-fw" aria-hidden="true"></button></td></a></tr>';
  $("#file-tbody").append(addtml);
}


function myPics(url,name,size){
  $(".image-nothing").html("");
  var del="deleted('"+url+"','image')";
  var addtml = '<div class="thumbnail"><div style="width:250px;height:200px;white-space:nowrap;"><img class="img-responsive" src="'+url+'" alt="..." style="display:block;margin:auto;max-width:300px;max-height:200px;white-space:nowrap;"></div><div class="caption"><label>'+name+' &emsp;<small>'+size+'</small></label><p>&emsp;&emsp;&emsp;<button class="btn btn-info" type="button" name="button" data-toggle="modal" data-target="#imageModal" data-whatever="'+url+'">VIEW</button> &emsp;<button class="btn btn-danger" type="button" name="button" onclick="'+del+'"><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i></button></p></div></div>';
  $("#image-wrapper").append(addtml);
}


function myVids(url,name,size){
  var del="deleted('"+url+"','video')";
  $(".video-nothing").html("");
  var addtml = '<div class="thumbnail"><video src="'+url+'" alt="..." style="width:300px;height:200px;"></video><div class="caption"><label>'+name+' &emsp;<small>'+size+'</small></label><p>&emsp;&emsp;&emsp;<button class="btn btn-info" type="button" name="button" data-toggle="modal" data-target="#videoModal" data-whatever="'+url+'">VIEW</button> &emsp;<button class="btn btn-danger" type="button" name="button"><i class="fa fa-trash-o fa-fw" aria-hidden="true" onclick="'+del+'"></i></button></p></div></div>';
  $("#video-wrapper").append(addtml);
}


function myAud(url,name,size,){
  $(".audio-nothing").html("");
  var del="deleted('"+url+"','audio')";
  var addtml = '<tr><td><i class="fa fa-music fa-3x" aria-hidden="true"></td><td>'+name+'</td><td><audio controls><source src="'+url+'">Loading Fail</audio></td><td>'+size+'</td><td><a class="btn btn-success" type="button" href="'+url+'" name="button" download><i class="fa fa-cloud-download fa-fw" aria-hidden="true"></a></td><td><button class="btn btn-danger" type="button" name="button"><i class="fa fa-trash-o fa-fw" aria-hidden="true" onclick="'+del+'"></button></td></tr>';
  $("#audio-tbody").append(addtml);
}

function deleted(loc, type){
  console.log("delete");
  setCookie("delete",loc);
  setCookie("type",type);
  window.location="delete.php";
}

function setCookie(cname, cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
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

function myFocus() {
  if($("#password").val()!=$("#rpassword").val()){
    $("#pass").addClass("has-error");
    $("#rpass").addClass("has-error");
    $("#subbut").attr("disabled", "disabled");
  } else {
    $("#pass").removeClass("has-error");
    $("#rpass").removeClass("has-error");
    $("#pass").addClass("has-success");
    $("#rpass").addClass("has-success");
    $("#subbut").removeAttr("disabled");
  }
}
