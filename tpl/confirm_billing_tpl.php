<?php
        $trips = $bookingObj->getTripsCount() - 1;
?>
<div class='hzm_travel_bloc travel_billing trips<?php echo $trips ?> hzm_travel_top_bloc'> 
        <div class='btb_confirm_billing hzm_ul_container trips<?php echo $trips ?>'>                   
                <?php echo $div_billing; ?>            
        </div>
        <div class='btb_payment_mode hzm_ul_container trips<?php echo $trips ?>'>                   
                <?php echo $div_payment_mode_select; ?>            
        </div>           
</div>