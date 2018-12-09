<?php
if(isset($_GET['page'])){
   $page = $_GET['page'];
}
 else {
       $page =1;
}
        $rowperpage = 9;
        $perrow =$page*$rowperpage - $rowperpage;       
        
        $totalrow = mysqli_num_rows(mysqli_query($conn, "select * from sach"));
        $totalpage = ceil($totalrow/$rowperpage);
        //listpage
        $listpage= '';
        $listpageql= '';
        for($i=1 ; $i <= $totalpage; $i++ ){
            if($page ==$i){
                $listpage .="<span>".$i."</span>";
                $listpageql .="<span>".$i."</span>";
            }else
                $listpage .='<a href="index.php?page='.$i.'">'.$i.' </a>';
                $listpageql .='<a href="quanlysach.php?page='.$i.'">'.$i.' </a>';
        }
        ?>
