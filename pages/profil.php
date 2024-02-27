<?php include("header.php");
require('bd_connect/db.php');
include("bd_connect/auth_session.php");

// if($_SESSION['user_name_last'] == 'admin'){
//         header('Refresh:40',session_destroy());
//     }










$sql3 = "SELECT * from workout ";
$result = $con->query($sql3);


for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row)
{

}
$i=0;



$cost=0;
             







?>



<div class="form">
<h2 >профиль</h2>
      ФИО:<?php echo   $_SESSION['user_name_us']; ?> <br>
    
    <a href="bd_connect/logout.php">Выход</a>
</div>





<div class="popular-row">
<?php foreach($data as $elem)  {

if($_SESSION['user_name_us'] == $elem['first_namee']){

$id= $elem['id'];
echo '
<div class="popular-card">


        <h2>номер: '.$elem['nomer'].'$</h2>
        <h2>обращение: '.$elem['info'].'</h2>
        <h2>статус: '.$elem['status'].'</h2>';
    
  
        echo ' </div>';  }
} ?>

</div>




<?php  



if($_SESSION['user_name_last'] == 'admin'){
    echo '<div class="block-changes">
    <h2>Панель администратора</h2>
    <form  method="post" id="form-changes">
    
    <h3 class="name-card">ID заявления</h3>
    <input type="text" class="inp-chang" name="id" required>

    
    <h3 class="name-card">статус</h3>

    <select name="cost">
    <option value="откланено">откланено</option>
    <option value="подтверждено" selected> подтверждено</option>
   </select>


    
    <input type="submit" value="изменить" class="btn-chang" name="send">
    </form>
    </div>';
    
    
    
    if(isset($_POST['send'])) {
            $sql2 = 'SELECT * from workout ';
        
            
            $cost = stripslashes($_REQUEST['cost']);    
            $cost = mysqli_real_escape_string($con, $cost);
    
    
            $id = stripslashes($_REQUEST['id']);    
            $id = mysqli_real_escape_string($con, $id);
          
   
           
             // <input type="text" class="inp-chang" name="cost" required>
     
            
          
                $query = "UPDATE workout SET status='$cost' WHERE id='$id'";
        
                $ult = mysqli_query($con, $query);
          
                // чекаем все поля все ли хорошо там
          
                if($ult){
                    echo "<div class='form'>
                    <h3>изменили статус</h3><br/>
                    </div>";
                }else{
                    echo "<div class='form'>
                    <h3>Ты где то напакостил</h3><br/>
                    </div>";
                     }    
          
         
           
          
          
          }
    }if($_SESSION['user_name_last'] == 'admin'){
    ?>


<form method="POST" >
     
     <table border="1">
     
     <th>id</th>
     <th>полшьзователь </th>
     <th>номер</th>
     <th>инфо</th>
     <th>статус</th>
  
     <?php 
        
         $query= "SELECT * FROM `workout` ";
         $result = mysqli_query($con, $query) or die;
         
         for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row)
         $i++;
         ;
         foreach($data as $elem){
             echo "<tr>";
             echo "<td>".$elem['id']."</td>";
             echo "<td>".$elem['first_namee']."</td>";
             echo "<td>".$elem['nomer']."</td>";
             echo "<td>".$elem['info']."</td>";
             echo "<td>".$elem['status']."</td>";
             $idk = $elem['id'];
             echo "</tr>";
         }
         
     
        
     
        }
     
     ?>
     
     
     
     </table></form>



     
     <script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
    }
</script>