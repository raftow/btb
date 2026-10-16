<div class="booker_bg_pic">    
<div class="booker_bg">
<?
   foreach($ticketList as $ticketObj)     
   {
        $my_status = $ticketObj->calcStatus($lang, $translate=false);
        $travelObj = $ticketObj->hetTravel();
        if(!$travelObj) die("This travel has been deleted");

        $full_travel_date = ($ds == "hijri") ? $travelObj->fullHijriDate("travel_date") : $travelObj->fullGregDate("travel_gdate");
        $full_return_date = ($ds == "hijri") ? $travelObj->fullHijriDate("return_date") : $travelObj->fullGregDate("return_gdate");
                    
?>
<div class="booker_container">
        <div class='hzm_attribute hzm_wd4 hzm_minibox_header0'>                
                
                <div class='front_bloc hzm_travel_bloc ticket status_<?php echo $my_status; ?>'>
                        <div class='mb_long_title my_booking'> 
                                <div class='btb_my_ticket'>
                                        حجز رقم <?php echo $ticketObj->getCode(); ?> مع <?php echo $travelObj->travel_company_full_name; ?>
                                </div>
                                <div class='btb_my_ticket fleft'>
                                        حالة الحجز <div class='booking_status status_<?php echo $my_status; ?>' ><?php echo $ticketObj->status; ?> </div>
                                </div>
                        </div>
                        <div class='my_booking_dates'>
                                <div class='mb_med_title my_booking'> 
                                        <div class='btb_calendar'>
                                                المغادرة <span class="btb_date"><?php echo $full_travel_date; ?></span> س <span class="btb_time"><?php echo $travelObj->planned_start_time; ?> </span> <?php echo $travelObj->translateValue("start_day_part"); ?>
                                        </div>
                                </div>
                                <div class='fleft mb_med_title my_booking'>        
                                        <div class='btb_calendar calendar_left'>
                                                العودة <span class="btb_date"><?php echo $full_return_date; ?></span> س <span class="btb_time"><?php echo $travelObj->planned_end_time; ?> </span> <?php echo $travelObj->translateValue("end_day_part"); ?>
                                        </div>
                                </div>
                        </div>

                        <div class='mb_big_title my_booking'>
                                <div class='btb_minibox_big_title rightbloc'>
                                        <?php echo $travelObj->travel_company_logo; ?>
                                </div>  
                                <div class='btb_minibox_big_title mediumbloc'>
                                        <div class="list-head">
                                                <h4><span><?php echo $travelObj->trip01_title; ?></span> <?php echo $travelObj->depart_city_id; ?> </h4>
                                                <div class="travel_trip">
                                                        <i class="fas fa-bus"></i>
                                                        <i class="fas fa-long-arrow-alt-left"></i>
                                                </div>
                                                <h4><span><?php echo $travelObj->trip12_title; ?></span><?php echo $travelObj->city1_id; ?> </h4>
                                                <?php echo $travelObj->city2_disabled_s; ?>
                                                <div class="travel_trip">
                                                        <i class="fas fa-bus"></i>
                                                        <i class="fas fa-long-arrow-alt-left"></i>
                                                </div>
                                                <h4><span><?php echo $travelObj->trip23_title; ?></span><?php echo $travelObj->city2_id; ?> </h4>
                                                <?php echo $travelObj->city2_disabled_e; ?>
                                        </div>        
                                </div>                              
                                <div class='btb_level<?php echo $travelObj->getVal("travel_level"); ?> btb_level_bloc leftbloc'>
                                        <h4>
                                                <span class='btb_level'>الدرجة : </span>
                                                <a href='#'><span><?php echo $travelObj->showAttribute("travel_level"); ?></span></a>
                                        </h4>
                                </div>        
                        </div>                                                        
                        <div class='front_bloc btb_data_props my_booking'>
                                <div class='my_ticket_data'>                        
                                <div class="row booking_data">
                                        <label>العميل</label>
                                        <div class='btb_data_prop btb_price'>
                                        <?php echo $ticketObj->decode("crm_customer_id"); ?> 
                                        </div>
                                </div>
                                <?php 
                                        if($ticketObj->estPaid())
                                        {
                                ?>
                                <div class="row booking_data">
                                        <label>المبلغ المسدد </label>
                                        <div class='btb_data_prop btb_price'>
                                                <?php echo $ticketObj->decode("paid_amount"); ?> 
                                        </div>
                                </div>
                                <div class="row booking_data">
                                        <label>طريقة السداد </label>
                                        <div class='btb_data_prop'>
                                                <?php echo $ticketObj->decode("payment_mode_id"). " " . $ticketObj->decode("payment_data"); ?> 
                                        </div>
                                </div>
                                <?php 
                                        }
                                        else
                                        { 
                                ?>
                                <div class="row booking_data">
                                        <label>المبلغ المسدد </label>
                                        <div class='btb_data_prop btb_price'>
                                                0.00 
                                        </div>
                                </div>
                                <div class="row booking_data">
                                        <label>طريقة السداد </label>
                                        <div class='btb_data_prop'>
                                                --
                                        </div>
                                </div>
                                <?php 
                                        }
                                ?>
                                
                                
                                <div class="row booking_data">
                                        <label>عدد المقاعد </label>
                                        <div class='btb_data_prop'>
                                                <?php echo $ticketObj->travelers_nb; ?> مقعد <i class="material-icons">people</i>
                                                <?php echo $ticketObj->getSeatsDescription(); ?>
                                        </div>
                                </div>
                                <div class="row booking_data">
                                        <label>عدد السراير </label>
                                        <div class='btb_data_prop'>
                                                <?php
                                                        if($ticketObj->nb_beds>0) 
                                                        {
                                                                echo $ticketObj->nb_beds; 
                                                ?>
                                                 سرير  <i class="material-icons">hotel</i>
                                                <?php
                                                                echo $ticketObj->getSakanDescription(); 
                                                        }
                                                        else echo "بدون سكن"; 
                                                ?>
                                        </div>
                                </div>
                                <div class="row booking_data">
                                        <label>تاريخ حالة الحجز </label>
                                        <div class='btb_data_prop'>
                                                <?php echo $ticketObj->status_date; ?>
                                        </div>
                                </div>
                                <div class="row booking_data booking_btns">
                                        <div class='btb_data_prop'>
                                                <a href='i.php?cn=booker&mt=preview&tid=<?php echo $travelObj->id ?>&beds=<?php echo $ticketObj->nb_beds ?>&travelers=<?php echo $ticketObj->travelers_nb ?>&bkid=<?php echo $ticketObj->id ?>'><div class='btb_blue btb_print'>معاينة تفاصيل الرحلة</div></a>
                                        </div>
                                        <?php 
                                        if($ticketObj->estPaid())
                                        {
                                        ?>
                                        <div class='btb_data_prop'>
                                                <a href='i.php?cn=booker&mt=tprint&bkid=<?php echo $ticketObj->id ?>'><div class='btb_green btb_print'>طباعة التذكرة</div></a>
                                        </div>
                                        <div class='btb_data_prop'>
                                                <a href='i.php?cn=booker&mt=cprint&bkid=<?php echo $ticketObj->id ?>'><div class='btb_orange btb_print'>طباعة العقد</div></a>
                                        </div>
                                        <?php 
                                        }
                                        elseif($ticketObj->readyForPayment())
                                        {
                                        ?>
                                        <div class='btb_data_prop'>
                                                <a href='i.php?cn=booking&tid=<?php echo $travelObj->id ?>&beds=<?php echo $ticketObj->nb_beds ?>&travelers=<?php echo $ticketObj->travelers_nb ?>&bkid=<?php echo $ticketObj->id ?>'><div class='btb_green btb_print'>السداد</div></a>
                                        </div>
                                        <?php 
                                        }
                                        else
                                        {
                                        ?>
                                        <div class='btb_data_prop'>
                                                <a href='i.php?cn=booking&tid=<?php echo $travelObj->id ?>&beds=<?php echo $ticketObj->nb_beds ?>&travelers=<?php echo $ticketObj->travelers_nb ?>&bkid=<?php echo $ticketObj->id ?>'><div class='btb_green btb_print'>استكمال الحجز</div></a>
                                        </div>
                                        <?php 
                                        }
                                        ?>
                                        <div class='btb_data_prop'>
                                                <a href='#'><div class='btb_red btb_print btb_cancel'>إلغاء الحجز</div></a>
                                        </div>
                                </div>
                                </div>
                                <div class='my_ticket_qrcode'>                        
                                        <img src='tpl/qrcode.png' class='img_qrcode'>
                                </div>
                        </div>
                </div>
                   
                
        </div>
</div>
<?
}
?>
</div>
</div>
