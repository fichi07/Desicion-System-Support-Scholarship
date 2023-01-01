<?php
include('config.php');

if(isset($_POST['insert'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
   
  
    $submitdata = mysqli_query($conn,"insert into alternatif (id_alternatif,nama_alternatif) 
      values('$id','$nama')");
      
    if($submitdata){ 

      //berhasil bikin
      echo "<script>
      alert('Berhasil Submit !'); 
      window.location.href = 'alternatif.php';
    </script>";

    }else{

      echo "<script>
      alert('Gagal Submit !'); 
      window.location.href = 'alternatif.php';
    </script>";
      }


};
?>