
<?php 
    
    // Initialize a file URL to 
    // the variable 
    if(isset($_GET['file'])){
        $files = $_GET['file'];
    $url = 
    '../admin/pdf/'.$files; 
    $dl = '../users/files/'.$files;
        
    // Use basename() function to 
    // return the file  
    $file_name = basename($url); 
         
    // Use file_get_contents() function 
    // to get the file from url and use 
    // file_put_contents() function to 
    // save the file by using base name 
    if(file_put_contents( $dl, 
          file_get_contents($url))) { 
            echo '<script>alert("File Downloaded!");
            window.location.href="view-single-report.php?report_id=RID00004&to_user=mathew@dilg.com"</script>';
            exit();
    } 
    else { 
        echo '<script>alert("Failed to download the file!");
            window.location.href="view-single-report.php?report_id=RID00004&to_user=mathew@dilg.com"</script>';
            exit();
    }
    }
    ?> 