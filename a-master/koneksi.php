<?php 
    

    session_start();



    $koneksi = mysqli_connect ("localhost", "root", "", "website");

    function tampilkan(){
        $query = "SELECT * FROM artikel";
        return result($query);
    }

    function tampilkan_side(){
        $query = "SELECT * FROM artikel";
        return result($query);
    }
    
    function tampilkan_id($id){
        $query = "SELECT * FROM artikel WHERE id=$id";
        return result($query);
    }
    function hasil_cari($cari){
        $query = "SELECT * FROM artikel WHERE judul LIKE '%$cari%'";
        return result($query);
    }
    function result($query){
        global $koneksi;
        if($result = mysqli_query($koneksi, $query)){
            return $result;
        }
    }
    function tambah_data($judul, $isi, $tag){
//        $judul = escape($judul);
//        $isi   = escape($isi);
        $query = "INSERT INTO artikel (judul, isi, tag) VALUES ('$judul', '$isi', '$tag')";
        return run($query);
    }
    function edit_data($judul, $isi, $tag, $id){
        $query = "UPDATE artikel SET judul='$judul', isi='$isi', tag='$tag' WHERE id=$id ";
        return run($query);
    }
    function hapus_data($id){
        $query = "DELETE FROM artikel WHERE id=$id";
        return run($query);
    }
    //login
    function cek_data($nama, $pass){
      global $koneksi;
        
        $query = "SELECT * FROM login WHERE username='$nama' && password='$pass'";
         
         if($result = mysqli_query($koneksi, $query)){
             if(mysqli_num_rows($result) !=0) return true;
             else return false;
         }
    }

//       function cek_status($nama){
//           
//        $query = "SELECT status FROM login WHERE username='$nama";
//           global $koneksi;
//            if($result = mysqli_query($koneksi, $query)){
//                while($row= mysqli_fetch_assoc($result)){
//                    $status = $row['status'];
//                    
//                }
//                
//                return $status;
//            }
//        
//}

    function run($query){
        global $koneksi;
        if(mysqli_query($koneksi, $query)) return true;
        else return false;
        
    }
 
    
    function excerpt($string){
        $string = substr($string, 0, 200);
        return $string. "....";
    }   

  

    
?>