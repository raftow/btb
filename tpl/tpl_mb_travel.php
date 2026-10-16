<div class="booker_bg_pic">    
<div class="booker_bg">
<div class="booker_container">

        <div class='hzm_attribute hzm_wd4 hzm_minibox_header0'>                
                <div class='hzm_travel_bloc'>
                        <div class='mb_med_title tt-[value:travel_template_id]'> رحلة رقم P[value:travel_template_id]-T[id] مع <br>[travel_company_full_name] <br>
                                <div class='btb_calendar'>المغادرة <span class="btb_date">[travel_date.full]</span> س <span class="btb_time">[planned_start_time] </span> [start_day_part.translate]</div>
                        </div>

                        <div class='mb_big_title'>
                                <div class='btb_minibox_big_title rightbloc'>
                                        [travel_company_logo]
                                </div>  
                                <div class='btb_minibox_big_title mediumbloc'>
                                        <div class="list-head">
                                                <h4><span>[trip01_title]</span> [depart_city_id] </h4>
                                                <div class='bus_arrow'>
                                                        <i class="fas fa-bus"></i>
                                                        <i class="fas fa-long-arrow-alt-left"></i>
                                                </div>
                                                <h4><span>[trip12_title]</span>[city1_id] </h4>
                                                [city2_disabled_s]
                                                <div class='bus_arrow'>
                                                        <i class="fas fa-bus"></i>
                                                        <i class="fas fa-long-arrow-alt-left"></i>
                                                </div>
                                                <h4><span>[trip23_title]</span>[city2_id] </h4>
                                                [city2_disabled_e]
                                        </div>        
                                </div>                              
                                <div class='btb_level[value:travel_level] btb_level_bloc leftbloc'>
                                        <h4>
                                                <span class='btb_level'>الدرجة : </span>
                                                <a href='#'><span>[travel_level]</span></a>
                                        </h4>
                                </div>
                        </div>
                        <!--
                        <div class='xxxx'>
                                <div class='btb_calendar'>العودة [return_date.full] س <span class="btb_time">[planned_end_time]</span> [end_day_part.translate]</div>
                        </div> -->
                                
                </div>
                <div class='btb_trevelers_beds'>
                        <div class="col">
                                <h5>
                                        <i class="material-icons">people</i>[travelers] مقعد
                                        &nbsp;
                                        <i class="material-icons">hotel</i>[beds] سرير 
                                </h5>
                        </div>
                </div>
                <div class='btb_edit_criteria'>
                        <div class="col">
                                <h5>
                                   <a href='i.php?cn=booker&mt=omra_ziara_last'><span>تعديل</span></a>   
                                </h5>
                        </div>
                </div>
                
        </div>
        
               
        <div id='travel[id]_minibox' class='travel_minibox hzm_wd4 hzm_minibox_body' aria-expanded='true' style=''>           
                <div class='hzm_travel_bloc hzm_travel_top_bloc'> 
                        <div class='btb_trips hzm_ul_container hzm_bloc_travel'>                   
                                <h6>المخطط الزمني للرحلة</h6>
                                [li_trips]            
                        </div>           
                        <div class='btb_details hzm_ul_container hzm_bloc_travel'>                   
                                <h6>محطات التوقف</h6>
                                [travelStationList.no_icons]            
                        </div>           

                </div>
                <div class='hzm_travel_bloc hzm_travel_btn_bloc'> 
                        <div class='hzm_book_button_container hzm_bloc_travel'>
                                <!--<h5>
                                        <a href='i.php?cn=booking&tid=[id]&travelers=[travelers]&beds=[beds]&bkid=[bkid]'><div>[title_book]</div></a>
                                </h5>-->
                                <h6>زر الحجز في أسفل الصفحة <strong>&darr;</strong></h6>
                        </div>
                </div>
                <div class='hzm_travel_bloc hzm_travel_medium_bloc'> 
                        <div class='hzm_new_galery_container'>                   
                                [buses_galery]            
                        </div>
                        <div class='hzm_prices_buttons_container'>                   
                                [seats_prices_offer]            
                        </div>
                        <div class='hzm_book_button_container hzm_bloc_travel'>
                                <!--
                                <h4>
                                        <a href='i.php?cn=booking&tid=[id]&travelers=[travelers]&beds=[beds]&bkid=[bkid]'><div>[title_book]</div></a>
                                </h4>-->
                                <h6>زر الحجز في أسفل الصفحة <strong>&darr;</strong></h6>
                        </div>
                        <div class='hzm_new_galery_container'>                   
                                [sakan_galery]            
                        </div>
                        <div class='hzm_prices_buttons_container'>                   
                                [sakan_prices_offer]            
                        </div>
                        <div class='hzm_book_button_container hzm_bloc_travel'>
                                <h4>
                                        <a href='i.php?cn=booking&tid=[id]&travelers=[travelers]&beds=[beds]&bkid=[bkid]&ds=[ds]'><div>[title_book]</div></a>
                                </h4>
                        </div>
                </div>
        </div>

</div>
</div>
</div>
