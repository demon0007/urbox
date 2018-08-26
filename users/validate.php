<?php
  if(!isset($_COOKIE['user'])) {
  echo '<script type="text/javascript">window.location = "../index.html";</script>';
}
else{
  setCookie('user',$_COOKIE['user'],time()+(60*5),"/");
}
?>
