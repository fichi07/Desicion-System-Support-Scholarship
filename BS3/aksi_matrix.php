<?php
include('config.php');

if(isset($_POST['insert'])){
    $id = $_POST['id'];
    $alternatif = $_POST['alternatif'];
    $bobot = $_POST['bobot'];
    $skala = $_POST['skala'];
   
  
    $submitdata = mysqli_query($conn,"insert into matrix_keputusan (id_matrix,id_alternatif,id_bobot, id_skala) 
      values('$id','$alternatif','$bobot','$skala')");
      
    if($submitdata){ 

      //berhasil bikin
      echo "<script>
      alert('Berhasil Submit !'); 
      window.location.href = 'matrix.php';
    </script>";

    }else{

      echo "<script>
      alert('Gagal Submit !'); 
      window.location.href = 'matrix.php';
    </script>";
      }


};
?>