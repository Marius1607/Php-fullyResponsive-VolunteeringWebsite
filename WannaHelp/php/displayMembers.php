<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Membri
        </title>
        <link rel = "stylesheet" href = "../css/table_style.css">
        <link rel="icon" type="image/jpg" href="../img/icon.png">
        <script src = "../js/profile.js"></script>
    </head>
    <body>
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'wannahelp');
        $nume = mysqli_real_escape_string($db, $_POST['nume']);
        $judet = mysqli_real_escape_string($db, $_POST['judet']);
            if(isset($_SESSION['username']))
            {
                ?>
                <table>
                    <thead>
                    <tr>
                        <th>
                            <strong> Prenume </strong>
                        </th>
                        <th>
                            <strong> Nume </strong>
                        </th>
                        <th>
                            <strong> Email </strong>
                        </th>
                        <th>
                            <strong> Telefon </strong>
                        </th>
                        <th>
                            <strong> Facebook </strong>
                        </th>
                        <th>
                            <strong> Website </strong>
                        </th>
                        <th>
                            <strong> Localitate </strong>
                        </th>
                        <th>
                            <strong> Județ </strong>
                        </th>
                    </tr>
                    </thead>
                    <?php
                        if($nume == "" and $judet == "") {
                            $sql = "SELECT prenume, nume, email, telefon, facebook, website, localitate, judet FROM users";
                            $result = $db->query($sql);
                            while ($row = $result->fetch_assoc()) {
                        ?>
                        <form action="profil.php" method="post">
                            <tr>
                                <td><?php echo $row["prenume"];?> </td>
                                <td name = "nume"> <?php echo $row["nume"];?> </td>
                                <td name = "email"> <?php echo $row["email"];?> </td>
                                <td name = "telefon"> <?php echo $row["telefon"];?> </td>
                                <td name = "facebook"> <a href="<?php echo $row['facebook']?>" target="blank"> <?php echo $row["facebook"];?> </a></td>
                                <td name = "website"> <a href="<?php echo $row['website']?>" target="blank"> <?php echo $row["website"];?> </a></td>
                                <td name = "localitate"> <?php echo $row["localitate"];?> </td>
                                <td name = "judet"> <?php echo $row["judet"];?> </td>
                            </tr>
                        </form>
                    <?php }} 

                    else if($nume == "" and $judet != "") {
                        $sql = "SELECT prenume, nume, email, telefon, facebook, website, localitate, judet FROM users";
                        $result = $db->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            if(search_for_judet($row["judet"], $judet)) {
                    ?>
                        <tr>
                            <td> <?php echo $row["prenume"];?> </td>
                            <td> <?php echo $row["nume"];?> </td>
                            <td> <?php echo $row["email"];?> </td>
                            <td> <?php echo $row["telefon"];?> </td>
                            <td> <a href="<?php echo $row['facebook']?>" target="blank"> <?php echo $row["facebook"];?> </a></td>
                            <td> <a href="<?php echo $row['website']?>" target="blank"> <?php echo $row["website"];?> </a></td>
                            <td> <?php echo $row["localitate"];?> </td>
                            <td> <?php echo $row["judet"];?> </td>
                        </tr>
                    <?php  
                        }}}


                    else if($nume != "" and $judet == "") {
                        $sql = "SELECT prenume, nume, email, telefon, facebook, website, localitate, judet FROM users";
                        $result = $db->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            if(strtolower($row["nume"]) == strtolower($nume) or strtolower($row["prenume"]) == strtolower($nume) or 
                            (strtolower($row["nume"]) . " " . strtolower($row["prenume"])) == strtolower($nume) or 
                            (strtolower($row["prenume"]) . " " . strtolower($row["nume"])) == strtolower($nume)) {
                    ?>
                        <tr>
                            <td> <?php echo $row["prenume"];?> </td>
                            <td> <?php echo $row["nume"];?> </td>
                            <td> <?php echo $row["email"];?> </td>
                            <td> <?php echo $row["telefon"];?> </td>
                            <td> <a href="<?php echo $row['facebook']?>" target="blank"> <?php echo $row["facebook"];?> </a></td>
                            <td> <a href="<?php echo $row['website']?>" target="blank"> <?php echo $row["website"];?> </a></td>
                            <td> <?php echo $row["localitate"];?> </td>
                            <td> <?php echo $row["judet"];?> </td>
                        </tr>
                    <?php  }}}




                    else if($nume != "" and $judet != "") {
                        $sql = "SELECT prenume, nume, email, telefon, facebook, website, localitate, judet FROM users";
                        $result = $db->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            if((strtolower($row["nume"]) == strtolower($nume) or strtolower($row["prenume"]) == strtolower($nume) or 
                            (strtolower($row["nume"]) . " " . strtolower($row["prenume"])) == strtolower($nume) or 
                            (strtolower($row["prenume"]) . " " . strtolower($row["nume"])) == strtolower($nume)) and 
                            search_for_judet($row["judet"], $judet)) {
                    ?>
                        <tr>
                            <td> <?php echo $row["prenume"];?> </td>
                            <td> <?php echo $row["nume"];?> </td>
                            <td> <?php echo $row["email"];?> </td>
                            <td> <?php echo $row["telefon"];?> </td>
                            <td> <a href="<?php echo $row['facebook']?>" target="blank"> <?php echo $row["facebook"];?> </a></td>
                            <td> <a href="<?php echo $row['website']?>" target="blank"> <?php echo $row["website"];?> </a></td>
                            <td> <?php echo $row["localitate"];?> </td>
                            <td> <?php echo $row["judet"];?> </td>
                        </tr>
                        <?php  }}} ?>
                </table>
            
        <?php }
            else {
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <strong> Prenume </strong>
                            </th>
                            <th>
                                <strong> Nume </strong>
                            </th>
                            <th>
                                <strong> Județ </strong>
                            </th>
                        </tr>
                    </thead>
                <?php
                    if($nume == "" and $judet == "") {
                        $sql = "SELECT prenume, nume, judet FROM users";
                        $result = $db->query($sql);
                        while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td> <?php echo $row["prenume"];?> </td>
                        <td> <?php echo $row["nume"][0].'.';?> </td>
                        <td> <?php echo $row["judet"];?> </td>
                    </tr>
                <?php }}
    
                    else if($nume == "" and $judet != "") {
                        $sql = "SELECT prenume, nume, judet FROM users";
                        $result = $db->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            if(search_for_judet(strtolower($row["judet"]), strtolower($judet))) {
                    ?>
    
                    <tr>      
                        <td><?php echo $row["prenume"];?> </td>
                        <td> <?php echo $row["nume"][0].'.';?> </td>
                        <td> <?php echo $row["judet"];?> </td>
                    </tr>
                <?php  }}}

                    else if($nume != "" and $judet == "") {
                        $sql = "SELECT prenume, nume, judet FROM users";
                        $result = $db->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            if(strtolower($row["nume"]) == strtolower($nume) or strtolower($row["prenume"]) == strtolower($nume) or 
                            (strtolower($row["nume"]) . " " . strtolower($row["prenume"])) == strtolower($nume) or 
                            (strtolower($row["prenume"]) . " " . strtolower($row["nume"])) == strtolower($nume)) {
                    ?>
                    <tr>
                            <td> <?php echo $row["prenume"];?> </td>
                            <td> <?php echo $row["nume"][0].'.';?> </td>
                            <td> <?php echo $row["judet"];?> </td>
                    </tr>
                <?php  }}}


                    else if($nume != "" and $judet != "") {
                        $sql = "SELECT prenume, nume, judet FROM users";
                        $result = $db->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            if((strtolower($row["nume"]) == strtolower($nume) or strtolower($row["prenume"]) == strtolower($nume) or 
                            (strtolower($row["nume"]) . " " . strtolower($row["prenume"])) == strtolower($nume) or 
                            (strtolower($row["prenume"]) . " " . strtolower($row["nume"])) == strtolower($nume))) 
                             {
                    ?>
                    <tr>
                        <td> <?php echo $row["prenume"];?> </td>
                        <td> <?php echo $row["nume"][0].'.';?> </td>
                        <td> <?php echo $row["judet"];?> </td>
                    </tr>
                <?php  }}}
            }

            function search_for_judet($judet, $s_judet){
                $diacritice = array("ș", "ț", "ă", "â", "s", "t", "a");
                $judet1 = strtolower(str_replace($diacritice, "", $judet));
                $s_judet1 = strtolower(str_replace($diacritice, "", $s_judet));
                if($judet1 == $s_judet1){
                    return true;
                }
            }
        ?>
    </body>
</html>