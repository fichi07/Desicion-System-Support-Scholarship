<?php
include('config.php');

if(isset($_POST['insert'])){
    $id = $_POST['id'];
    $kriteria = $_POST['kriteria'];
    $value = $_POST['value'];
   
  
    $submitdata = mysqli_query($conn,"insert into bobot (id_bobot ,id_kriteria,value) 
      values('$id','$kriteria','$value')");
      
    if($submitdata){ 

      //berhasil bikin
      echo "<script>
      alert('Berhasil Submit !'); 
      window.location.href = 'bobot.php';
    </script>";

    }else{

      echo "<script>
      alert('Gagal Submit !'); 
      window.location.href = 'bobot.php';
    </script>";
      }


};
?>