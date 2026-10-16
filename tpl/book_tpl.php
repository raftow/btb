<?php
if(!$current_step) $current_step = 1;
$ttid = $travelObj->getVal("travel_template_id");
?>
<div class="booker_bg_pic">    
<div class="booker_bg">
<div class="booker_container">
        <form id="booking_form" method="POST">
        <input type="hidden" name="cn" id="cn" value="booking">
        <input type="hidden" name="mt" id="mt" value="">
        <input type="hidden" name="tid" id="tid" value="<?php echo $travelObj->id; ?>">
        <input type="hidden" name="beds" id="beds" value="<?php echo $beds?>">
        <input type="hidden" name="ds" id="ds" value="<?php echo $ds?>">
        <input type="hidden" name="travelers" id="travelers" value="<?php echo $travelers?>">
        <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer_id ?>">
        <input type="hidden" name="booking_id" id="booking_id" value="<?php echo $booking_id?>">
        
        

        <div class='front_btb_container'>                <!-- hzm_attribute hzm_wd4 btb_travel_header -->
                <?php
                    $full_travel_date = ($ds == "hijri") ? $travelObj->fullHijriDate("travel_date") : $travelObj->fullGregDate("travel_gdate");
                    $full_return_date = ($ds == "hijri") ? $travelObj->fullHijriDate("return_date") : $travelObj->fullGregDate("return_gdate");
                    
                    if(!$hide_travel_header)
                    {
                ?>
                <div class='front_bloc hzm_travel_bloc'>
                        <div class='mb_med_title tt-<?php echo $ttid ?>'> رحلة رقم <?php echo "P".$ttid."-T".$tid; ?> مع <br> <?php echo $travelObj->calcTravel_company_full_name(); ?> <br>
                                <div class='btb_calendar'>المغادرة <span class="btb_date"><?php echo $full_travel_date ?></span> س <span class="btb_time"><?php echo $travelObj->planned_start_time; ?> </span> <?php echo $travelObj->translateValue("start_day_part"); ?></div>
                        </div>

                        <div class='mb_big_title'>
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
                        <!--
                        <div class='xxxx'>
                                <div class='btb_calendar'>العودة <?php echo $full_return_date; ?> س <span class="btb_time"><?php echo $travelObj->planned_end_time; ?></span> <?php echo $travelObj->translateValue("end_day_part"); ?></div>
                        </div> -->
                                
                </div>
                <?php
                        if($can_edit_seats_and_beds)
                        {
                ?>
                <div class='seats_beds_form'>
                        <div class="col big people small seats-count-component search">
                                <div class="col date small">
                                        <div class="input-field">
                                                <label>
                                                        <i class="material-icons">people</i> عدد المقاعد
                                                </label>
                                                <div class="seat-selector-default search">
                                                        <button type="button" class="nb_travelers_inc_btn" id="nb_travelers_inc_btn">
                                                                <i class="material-icons">add</i>
                                                        </button>
                                                        <span name="span_nb_travelers" id="span_nb_travelers"><?php echo $travelers ?>
                                                        </span>
                                                        <button type="button" class="nb_travelers_dec_btn" id="nb_travelers_dec_btn">
                                                                <i class="material-icons">remove</i>
                                                        </button>
                                                </div>
                                        </div>
                                </div>
                                <div class="col date small">
                                        <div class="input-field">
                                                <label>
                                                        <i class="material-icons">hotel</i> كم سرير ؟
                                                </label>
                                                <div class="seat-selector-default search">
                                                        <button type="button" class="nb_beds_inc_btn" id="nb_beds_inc_btn">
                                                                <i class="material-icons">add</i>
                                                        </button>
                                                        <span name="span_nb_beds" id="span_nb_beds"><?php echo $beds ?>
                                                        </span>
                                                        <button type="button" class="nb_beds_dec_btn" id="nb_beds_dec_btn">
                                                                <i class="material-icons">remove</i>
                                                        </button>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>

                <?php
                        }
                        else
                        {
                ?>

                <div class='front_bloc btb_trevelers_beds'>
                        <div class="col">
                                <h5>
                                        <i class="material-icons">people</i><?php echo $travelers; ?> مقعد
                                        &nbsp;
                                        <i class="material-icons">hotel</i><?php echo $beds; ?> سرير 
                                </h5>
                                <div class='front_bloc btb_edit_criteria'>
                                        <div class="col">
                                                <h5>
                                                <a href='i.php?cn=booking&tid=<?php echo $tid; ?>&travelers=<?php echo $travelers; ?>&beds=<?php echo $beds; ?>&booking_id=<?php echo $booking_id?>&current_step=2'><span>تعديل</span></a>   
                                                </h5>
                                        </div>
                                </div>
                        </div>
                </div>
                
                <?php
                        }
                    }
                ?>
                <div class='front_bloc front_step'>
                        <div class='front_step_text front_step_name step<?php echo $current_step;?> option<?php echo $current_option;?>'><?php echo $step_name ?></div>
                        <div class='front_step_text front_step_help step<?php echo $current_step;?> option<?php echo $current_option;?> hzm_data'><?php echo Travel::toHtml($step_placeholder) ?></div>
                </div>
                <div class='front_bloc travel_minibox travel<?php echo $travelObj->id;?> step<?php echo $current_step;?> hzm_wd4 hzm_minibox_body' id='travel<?php echo $travelObj->id; ?>_minibox'  aria-expanded='true' style=''>           
                        <?php echo AfwInputHelper::inputErrorsInRequest("all", $data);?>
                        <?php echo $div_step ?>
                </div>
                <?php echo $div_navigation ?>

                <div class='front_bloc front_step'>
                <?php
                        
                        if($step_infos)
                        {
                                $div_infos = "<br><br><strong>بيانات الحجز للإطلاع :</strong>";
                                
                                $div_infos .= "<div class='front_step_text front_step_infos hzm_data'>";
                                $div_infos .= "<table float='right' dir='rtl' class='front_grid grid' cellpadding='4' cellspacing='3' style=''>";

                                foreach($step_infos as $info => $info_val) 
                                {
                                        $div_infos .= "<tr><th>$info</th><td>$info_val</td></tr>";                                        
                                }
                                $div_infos .= "</table>";
                                $div_infos .= "</div>";

                                echo $div_infos;
                        }
                ?>
                        <br><br><div class='front_step_text front_step_help step<?php echo $current_step;?> option<?php echo $current_option;?> hzm_data'><?php echo Travel::toHtml($step_help) ?></div>
                </div>
                
        </div>
        <?php if($step_infos and (strlen($step_help)>2350)) echo $div_navigation ?>
        </form>
</div>
</div>
</div>
<script> 
        $(document).ready(function() {       
                $("#nb_travelers_dec_btn").click(function(){
                        newval = parseInt($("#travelers").val())-1;
                        if(newval<0) newval = 0;
                        $("#travelers").val(newval);
                        $("#span_nb_travelers").text(newval);
                });

                $("#nb_travelers_inc_btn").click(function(){
                        newval = parseInt($("#travelers").val())+1;
                        if(newval>50) newval = 50;
                        $("#travelers").val(newval);
                        $("#span_nb_travelers").text(newval);
                });

                $("#nb_beds_dec_btn").click(function(){
                        newval = parseInt($("#beds").val())-1;
                        if(newval<0) newval = 0;
                        $("#beds").val(newval);
                        $("#span_nb_beds").text(newval);
                });

                $("#nb_beds_inc_btn").click(function(){
                        newval = parseInt($("#beds").val())+1;
                        if(newval>50) newval = 50;
                        $("#beds").val(newval);
                        $("#span_nb_beds").text(newval);
                });
        });
</script>