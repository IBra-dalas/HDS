<?php
echo"
    <div class='bloc_tick_entreprise'>
        <table class='table_ticket'>";
            if($_SESSION['role'] == 1){
                $url = "http://localhost/HelpdeskSolution/front/GetTicketEntreprise/'".$_SESSION['societe']."'";
                $raw = file_get_contents($url);
                $json = json_decode($raw);
                echo" 
                    <tr class='ligne_principale_tableau'>
                        <td>Title ticket</td>
                        <td>Users</td>
                        <td>Date</td>
                        <td>Statut</td>
                        <td>Détails</td>
                    </tr>
                ";
                //$nb = 0;
                //$nb_json = 0;
                //while ($nb <= 1) {
                //    if(isset($json[$nb_json] -> IDTICKETS)){
                //        echo"
                //           <tr>
                //              <td>".$json[0] -> title."</td>
                //              <td>ligne1 colonne2</td>
                //              <td>ligne1 colonne3</td>
                //              <td>ligne1 colonne4</td>
                //              <td>ligne1 colonne5</td>
                //           </tr>
                //        ";
                //        $nb_json = $nb_json  + 1;
                //    }else{
                //        $nb = 1;
                //    }
                //}
            }else{
                //$url = "http://localhost/HelpdeskSolution/front/GetTicketAll/";
                //$raw = file_get_contents($url);
                //$json = json_decode($raw);
                //$nb_ticket = $json[0] -> COUNT(ticket.IDTICKETS);
                //echo"
                //    <tr class='ligne_principale_tableau'>
                //        <td>Title ticket</td>
                //        <td>Users</td>=
                //        <td>Entreprise</td>
                //        <td>Date</td>
                //        <td>Statut</td>
                //        <td>Détails</td>
                //    </tr>
                //";
                //$nb = 0;
                //while ($nb == $nb_ticket) {
                //    echo"
                //       <tr>
                //          <td>ligne1 colonne1</td>
                //          <td>ligne1 colonne1</td>
                //          <td>ligne1 colonne2</td>
                //          <td>ligne1 colonne3</td>
                //          <td>ligne1 colonne4</td>
                //          <td>ligne1 colonne5</td>
                //       </tr>
                //    ";
                //    $nb = $nb + 1;
                //}
            }
            echo"
            </tr>
        </table>
    </div>
";
?>