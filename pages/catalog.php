<?php 
include("header.php");
require('bd_connect/db.php');
include("bd_connect/auth_session.php");



?>











<?php




  echo '<div class="block-changes">
  <h2>Панель добавления товара</h2>
  <form  method="post" id="form-changes">
  
  <h3 class="name-card">государственный регистрационный номер автомобиля</h3>
  <input type="text" class="inp-chang" name="name" required>

  <h3 class="name-card"> описание
  нарушения</h3>
  <input type="text" class="inp-chang" name="cost" required>
  
  <input type="submit" value="Добавить" class="btn-chang" name="send">
  </form>
  </div>';
if(isset($_POST['send'])) {


  $log =    $_SESSION['user_name_us'];

  $name = stripslashes($_REQUEST['name']);    
  $name = mysqli_real_escape_string($con, $name);

  $cost = stripslashes($_REQUEST['cost']);    
  $cost = mysqli_real_escape_string($con, $cost);


 
  

      $query = "INSERT into `workout` (first_namee,nomer, info, status) VALUES ('$log', '$name','$cost','ожидает')";

      $ult = mysqli_query($con, $query);

      // чекаем все поля все ли хорошо там

      if($ult){
          echo "<div class='form'>
          <h3>Добавили заявление</h3><br/>
          </div>";
      }else{
          echo "<div class='form'>
          <h3>Ты где то напакостил</h3><br/>
          </div>";
           }    

 


}












   ?>
<br>
</div>




</div>



 