<?php
        $trips = $travelObj->getTravelTripsCount() - 1;
?>
<div class='hzm_travel_bloc travel_trips<?php echo $trips ?> hzm_travel_top_bloc'> 
        <div class='btb_sakan_selection hzm_ul_container sakan_selection<?php echo $trips ?>'>                   
        <?php echo $sakan_select; ?>            
        </div>           
</div>