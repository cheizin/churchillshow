<?php
session_start();
include("../controllers/setup/connect.php");

$user_pay = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM users_subscriptions WHERE user_id='".$_SESSION['id']."' && 
pesapal_notification_type ='COMPLETED' ORDER BY id DESC LIMIT 1"));
$date_paid = $user_pay['date_recorded'];
$duration = $user_pay['duration'];
                
$earlier = new DateTime($date_paid);
                
$current_date = date('Y-m-d');
$later = new DateTime($current_date);


$NewDate=Date('Y-m-d', strtotime($duration.'days'));


$todays_date = date('Y-m-d');



$days_remaining = $later->diff($earlier)->format("%a"); //3
     
     
//if($_SESSION['email'] == 'pitarcheizin@gmail.com' || $_SESSION['email'] == 'marojillo@gmail.com')
//{
    if($todays_date >= $NewDate)
    {
        ?>
        <script>
        location.replace("https://churchill.potentialsoftwares.com/payments/securepayment.php?payment_expired='true'");
        </script>
        <?php
    }
//}


?>