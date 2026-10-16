<?php
    if($trips_nb==2)  $pct = "100";  
    if($trips_nb==3)  $pct = "50";  
    if($trips_nb==4)  $pct = "33";  
    $trips_nb_reel = $trips_nb - 1;
?>
<div class="form_content form_content_sakan_select">   
        <div class="body_form_hzm body_form_sakan_select">        
<?php
        for($trip=1; $trip<=$trips_nb_reel; $trip++)
        {
                $trip_option = $bookingObj->getVal("trip${trip}_option");

?>                
                <div class="select-sakan-group-trip<?php echo $trip ?> cssgroup_pct_<?php echo $pct ?>">        
                        <input type="hidden" name="hotel<?php echo $trip ?>_id" id="hotel<?php echo $trip ?>_id" value="<?php echo ${"hotel{$trip}_id"}; ?>">
                        <input type='hidden' name='trip<?php echo $trip ?>option' id='trip<?php echo $trip ?>option' value='<?php echo $trip_option ?>'>
                        <div id="select_hotel<?php echo $trip ?>" class="div_select_hotel select_hotel<?php echo $trip ?>">        
                        <div class="hotel_option hotel_option_title">  
                                 الرجاء إختيار الفندق في  <?php echo $cityList[$trip]->getDisplay($lang)?>
                        </div>
                        <?php
                                $nb_choices_max = 3;
                                $nb_choices = 0;
                                foreach($hotelList[$trip] as $hotel_choice_id => $hotelChoice)
                                {                                        
                                        if($nb_choices<$nb_choices_max)
                                        {
                                                if($hotel_choice_id == ${"hotel${trip}_id"}) $hotel_selected = "hotel_selected$trip";
                                                else $hotel_selected = "";
                        ?>       
                                <div id="option_hotel_<?php echo $hotel_choice_id?>" 
                                       alt="<?php echo $trip ?>|<?php echo $hotel_choice_id?>" 
                                       class="hotel_option hotel_option<?php echo $trip ?> option_hotel_<?php echo $hotel_choice_id." ".$hotel_selected ?>">  
                                <?php echo $hotelChoice->getShortDisplay($lang); ?>
                                </div>                       
                        <?php
                                                $nb_choices++;        
                                        }
                                        
                                }
                                for($cc=$nb_choices; $cc<$nb_choices_max; $cc++)
                                {
                                        ?>       
                                        <div class="hotel_option">  
                                        &nbsp;
                                        </div>                       
                                        <?php
                                }

                        ?>
                        </div>
                        <div id="show_hotel<?php echo $trip ?>" class="div_show_hotel show_hotel<?php echo $trip ?>">        
                        <?php
                                foreach($hotelList[$trip] as $hotel_choice_id => $hotelChoice)
                                {                                        
                                        if($hotel_choice_id == ${"hotel{$trip}_id"}) $hotel_hide = "";
                                        else $hotel_hide = "hotel_hide$trip";
                        ?>       
                                <div id="main_photo_option_hotel_<?php echo $hotel_choice_id?>" 
                                        class="trips<?php echo $trips_nb ?> hotel_main_photo<?php echo $trip ?> hotel_main_photo_<?php echo $hotel_choice_id." ".$hotel_hide ?>">  
                                        <?php echo $hotelChoice->getMainPhoto(); ?>
                                </div>                       
                        <?php
                                }
                        ?>
                        </div>
                        <div id="pricing_hotel<?php echo $trip ?>" class="div_pricing_hotel pricing_hotel<?php echo $trip ?>">        
                        
                        <?php
                                foreach($hotelList[$trip] as $hotel_choice_id => $hotelChoice)
                                {                                        
                                        if($hotel_choice_id == ${"hotel{$trip}_id"}) $hotel_hide = "";
                                        else $hotel_hide = "hotel_hide$trip";
                        ?>                                       
                                <div id="pricing_option_hotel_<?php echo $hotel_choice_id?>" class="trips<?php echo $trips_nb_reel ?> pricing<?php echo $trip ?> hotel_pricing_<?php echo $hotel_choice_id." ".$hotel_hide ?>">  
                                        <?php echo $bookingObj->showSakanPricingOptions($hotelChoice, $trip); ?>
                                </div>                       
                        <?php
                                }
                        ?>
                        </div>

                </div>        
<?php
        }
?>                
        </div>
</div>