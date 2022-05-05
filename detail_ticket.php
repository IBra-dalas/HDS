<?php
include ('includes/header.php');

echo"
    <div class='bloc_central_detail'>
        <text class='user_detail_ticket'>".$IDUSERS."</text><text class='date_detail_ticket'>".date('d/m/Y', $date)."</text>
        <text class='date_detail_ticket'></text>

    </div>
";

include ('includes/footer.php');
?>