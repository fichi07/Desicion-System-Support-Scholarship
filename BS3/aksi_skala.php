<?php
include('config.php');

if(isset($_POST['insert'])){
    $id = $_POST['id'];
    $value = $_POST['value'];
    $keterangan = $_POST['keterangan'];
   
  
    $submitdata = mysqli_query($conn,"insert into skala (id_skala,value,keterangan) 
      values('$id','$value','$keterangan')");
      
    if($submitdata){ 

      //berhasil bikin
      echo "<script>
      alert('Berhasil Submit !'); 
      window.location.href = 'skala.php';
    </script>";

    }else{

      echo "<script>
      alert('Gagal Submit !'); 
      window.location.href = 'skala.php';
    </script>";
      }


};
?>