<?php
        if(!$date_system) $date_system = "greg";

        if($date_system=="greg")
        {
                $hide_hijri = "hide";       
                $hide_greg = "";       

                $required_hijri = ""; 
                $required_greg = "required"; 
        }
        else
        {
                $hide_hijri = "";       
                $hide_greg = "hide";  
                
                $required_hijri = "required"; 
                $required_greg = "";     
        }
        // echo var_export($data,true);
        if($morouna>0) $morouna_label = "<span class='morouna'> +/- $morouna</span>";
        else $morouna_label = "";

        if($departure_gdate_formatted <= date("Y-m-d")) $shift_remove_disabled = "-disabled";
        else $shift_remove_disabled = "";

        $calendar_tr =
        'monthNames: ["January","February","March","April","May","June", "July","August","September","October","November","December"],
        monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" ],
        dayNamesShort: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
        dayNamesMin: [ "Su","Mo","Tu","We","Th","Fr","Sa" ],';


        $calendar_tr =
        'monthNames: ["يناير","فبراير","مارس","أبريل","ماي","يونيو", "يوليو","أغسطس","سبتمير","أكتوبر","نوفمبر","ديسمبر"],
        monthNamesShort: ["يناير","فبراير","مارس","أبريل","ماي","يونيو", "يوليو","أغسطس","سبتمير","أكتوبر","نوفمبر","ديسمبر"],
        dayNames: ["الأحد", "الأثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت" ],
        dayNamesShort: ["أحد", "أثنين", "ثلاثاء", "اربعاء", "خميس", "جمعة", "سبت" ],
        dayNamesMin: [ "أحد","اثن","ثلث","ربع","خمس","جمع","سبت" ],';

        
        
?>
<div class="booker_bg_pic">    
<div class="booker_bg">
<div class="booker_container">
        
        <div class="search-component-parent">
                <div class="search-component">

                        <div class="search-comp-text data-show-desktop">
                                <div class="col"><h5>
                                                <i class="material-icons">pin_drop</i>سفر من</h5>
                                        <p><?php echo $departure_city_name?> 
                                        </p>
                                </div>
                                <div class="col"><h5>
                                                <i class="material-icons">pin_drop</i>لغرض</h5>
                                        <p><?php echo $travel_description?>
                                        </p>
                                </div>
                                <div class="col"><h5>
                                                <i class="material-icons">date_range</i>تاريخ السفر</h5>
                                        <p><?php echo $departure_full_date?>
                                        </p>
                                </div>
                                <div class="col"><h5>
                                                <i class="material-icons">date_range</i> مدة الرحلة</h5>
                                        <p><?php echo $period?> يوم
                                        </p>
                                </div>
                                <div class="col"><h5>
                                                <i class="material-icons">date_range</i> المرونة</h5>
                                        <p>+/-<?php echo $morouna?> يوم
                                        </p>
                                </div>
                                <div class="col"><h5>
                                                <i class="material-icons">people</i>عدد المقاعد</h5>
                                        <p><?php echo $nb_travelers ?>
                                        </p>
                                </div>
                                <div class="col"><h5>
                                                <i class="material-icons">hotel</i>كم سرير ؟</h5>
                                        <p><?php echo $nb_beds ?>
                                        </p>
                                </div>
                                <button class="openSearch">
                                        <i class="material-icons">search</i>تعديل البحث
                                </button>
                        </div>
                        <div class="search-comp-text data-show-mob">
                                <div class="col"><h5>تاريخ السفر</h5>
                                        <p><?php echo $departure_full_date?>
                                        </p>
                                </div>
                                <div class="col"><h5> مدة الرحلة</h5>
                                        <p><?php echo $period?>يوم </p>
                                </div>
                                <div class="col"><h5>عدد المقاعد</h5>
                                        <p><?php echo $nb_travelers ?>
                                        </p>
                                </div>
                                <div class="col"><h5>كم سرير ؟</h5>
                                        <p><?php echo $nb_beds ?>
                                        </p>
                                </div>
                                <button class="col openSearch">
                                        <i class="material-icons">search</i>تعديل البحث
                                </button>
                        </div>
                        <div class="search-component-form">
                                <button class="closeSearch">
                                        <i class="material-icons">close</i>
                                </button>
                                        <form id="omra_ziara_form" method="POST">
                                        <input type="hidden" name="cn" id="cn" value="Booker">
                                        <input type="hidden" name="mt" id="mt" value="omra_ziara">
                                        <input type="hidden" name="date_system" id="date_system" value="<?php echo $date_system ?>">
                                        <input type="hidden" name="shift" id="shift" value="0">
                                        
                                        
                                        <div class="inputs-container">
                                                <div class="col big city">
                                                        <div class="input-field">
                                                                <label>
                                                                        <i class="material-icons">pin_drop</i> سفر من
                                                                </label>
                                                                <?php echo AfwInputHelper::picture_dropdown($cityList, "departure_city_id", $selected=array($departure_city_id), "departure_city_id",false, null); ?> 
                                                        </div>
                                                </div>
                                                <div class="col big city">
                                                        <div class="input-field">
                                                                <label>
                                                                        <i class="material-icons">pin_drop</i>لغرض
                                                                </label>
                                                                <?php                                                                        
                                                                        echo AfwInputHelper::picture_dropdown($cityBoth, "omra_city_first", $selected=array($omra_city_first), "omra_city_first",false, null);//." ($omra_city_first)";
                                                                ?>
                                                                
                                                        </div>
                                                </div>
                                                <div class="col big double people small seats-count-component search">
                                                        <div class="col date small">
                                                                <div class="input-field">
                                                                        <label>
                                                                                <i class="material-icons">people</i> عدد المقاعد
                                                                        </label>
                                                                        <div class="seat-selector-default search">
                                                                                <button type="button" class="nb_travelers_inc_btn" id="nb_travelers_inc_btn">
                                                                                        <i class="material-icons">add</i>
                                                                                </button>
                                                                                <span name="span_nb_travelers" id="span_nb_travelers"><?php echo $nb_travelers ?>
                                                                                </span>
                                                                                <input type="hidden" name="nb_travelers" id="nb_travelers" value="<?php echo $nb_travelers ?>">
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
                                                                                <span name="span_nb_beds" id="span_nb_beds"><?php echo $nb_beds ?>
                                                                                </span>
                                                                                <input type="hidden" name="nb_beds" id="nb_beds" value="<?php echo $nb_beds ?>">
                                                                                <button type="button" class="nb_beds_dec_btn" id="nb_beds_dec_btn">
                                                                                        <i class="material-icons">remove</i>
                                                                                </button>
                                                                        </div>
                                                                </div>
                                                        </div>                                                        
                                                </div>
                                                <div class="col big double datepickercom return">
                                                        <div class="col date small">
                                                                <div class="input-field">
                                                                <div id='bloc_search_hijri' class="<?php echo $hide_hijri ?>">
                                                                        <label>
                                                                                تاريخ الرحلة
                                                                                <span id='switch_to_greg' class='sysswitch switch_to_greg'>هجري </span>
                                                                        </label>
                                                                        <input type="text" id="departure_date" name="departure_date" value="<?php echo $departure_date_formatted ?>" autocomplete="off">
                                                                        <script type="text/javascript">
                                                                                $('#departure_date').calendarsPicker(
                                                                                        {
                                                                                                calendar: $.calendars.instance('UmmAlQura'),
                                                                                                /*monthsToShow: [1, 1], 
                                                                                                showOtherMonths: true,*/
                                                                                                minDate: 0,
                                                                                                onSelect: function (date) {
                                                                                                        if(date[0]<'<?php echo $hijri_today_formatted ?>')
                                                                                                        {
                                                                                                                atalert('تنبيه', 'لقد اخترت تاريخا في الماضي '+date[0]+' الرجاء اختيار تاريخ آخر'); 
                                                                                                                $('#departure_date').val("");
                                                                                                        }
                                                                                                }
                                                                                        }
                                                                                        );
                                                                        </script>
                                                                </div>
                                                                <div id='bloc_search_greg' class="<?php echo $hide_greg ?>">
                                                                        <label for="departure_date">تاريخ الرحلة
                                                                        <span id='switch_to_hijri' class='sysswitch switch_to_hijri'>ميلادي </span>
                                                                        </label>
                                                                        <input type="text" id="departure_gdate" name="departure_gdate" class="hasCalendarsPicker" value="<?php echo $departure_gdate_formatted ?>" autocomplete="off" <?php echo $required_greg ?>>
                                                                        <script>
                                                                        $(function() {
                                                                                $("#departure_gdate" ).datepicker({
                                                                                        showAnim: "fold",
                                                                                        dateFormat: "yy-mm-dd",
                                                                                        changeMonth: true,
                                                                                        changeYear: true,
                                                                                        minDate: 0,
                                                                                        <?php echo $calendar_tr ?>
                                                                                });
                                                                        });
                                                                        </script>
                                                                </div>
                                                                </div>
                                                        </div>
                                                        <div class="col date small seats-count-component">
                                                                <div class="input-field">
                                                                        <label>
                                                                                <i class="material-icons">date_range</i>  مدة الرحلة
                                                                        </label>
                                                                        <div class="seat-selector-default search">
                                                                                <button type="button" class="period_inc_btn" id="period_inc_btn">
                                                                                        <i class="material-icons">add</i>
                                                                                </button>
                                                                                <span name="span_period" id="span_period"><?php echo $period ?> 
                                                                                </span>يوم
                                                                                <input type="hidden" name="period" id="period" value="<?php echo $period ?>">
                                                                                <button type="button" class="period_dec_btn" id="period_dec_btn">
                                                                                        <i class="material-icons">remove</i>
                                                                                </button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        
                                                </div>
                                                
                                                <div class="col big double datepickercom return">
                                                        <div class="col date small seats-count-component">
                                                                <div class="input-field">
                                                                        <label>
                                                                                <i class="material-icons">date_range</i>  مرونة المدة
                                                                        </label>
                                                                        <div class="seat-selector-default search">
                                                                                <button type="button" class="morouna_inc_btn" id="morouna_inc_btn">
                                                                                        <i class="material-icons">add</i>
                                                                                </button>
                                                                                <span name="span_morouna" id="span_morouna"><?php echo $morouna ?> 
                                                                                </span>يوم
                                                                                <input type="hidden" name="morouna" id="morouna" value="<?php echo $morouna ?>">
                                                                                <button type="button" class="morouna_dec_btn" id="morouna_dec_btn">
                                                                                        <i class="material-icons">remove</i>
                                                                                </button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col date small">
                                                                <div class="input-field">
                                                                        <label>&nbsp;                                                                                
                                                                        </label>
                                                                        <input type="submit" class="btn" value="بحث">
                                                                </div>
                                                        </div>
                                                
                                                </div>

                                        </div>
                                        <input type="hidden" name="omsakan" id="omsakan" value="<?php echo $omsakan ?>">
                                        
                                        <i class="material-icons closeBtn closeSearchForm">close</i>
                                        </form>
                        </div>
                        
                </div>
        </div>
        
        <div class="trip-route-component">
                <div class="trip-route-con">
                        <div class="filter-component">
                                <div class='sticky_filter'>
                                        <div class="my_filter hideMob">
                                                <ul class="list-filter-sec">
                                                        <li><h4>درجة الرحلة</h4>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in" id="buscat_1" checked>
                                                                <label class="checkbox-label" for="buscat_1"> إقتصادية
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in" id="buscat_2" checked>
                                                                <label class="checkbox-label" for="buscat_2"> فاخرة 
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in" id="buscat_3" checked>
                                                                <label class="checkbox-label" for="buscat_3"> أعمال
                                                                </label>
                                                        </li>
                                                        <!--
                                                        <li>
                                                                <input type="checkbox" class="filled-in" id="buscat_4" checked>
                                                                <label class="checkbox-label" for="buscat_4"> درجة ملكية 
                                                                </label>
                                                        </li>
                                                        -->
                                                </ul>
                                                <ul class="list-filter-sec">
                                                        <li><h4>مغادرة <?php echo $departure_city_name?></h4>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in going-morning" id="going_morning" checked>
                                                                <label class="checkbox-label" for="going_morning">صباحا 
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in going-evening" id="going_evening" checked>
                                                                <label class="checkbox-label" for="going_evening">مساءً
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in going-night" id="going_night" checked>
                                                                <label class="checkbox-label" for="going_night">ليلا
                                                                </label>
                                                        </li>
                                                        
                                                </ul>
                                                <ul class="list-filter-sec">
                                                        <li><h4>العودة إلى <?php echo $departure_city_name?></h4>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in return-morning" id="returning_morning" checked>
                                                                <label class="checkbox-label" for="returning_morning">صباحا 
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in return-evening" id="returning_evening" checked>
                                                                <label class="checkbox-label" for="returning_evening">مساءاً 
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in return-night" id="returning_night" checked>
                                                                <label class="checkbox-label" for="returning_night">ليلا
                                                                </label>
                                                        </li>
                                                </ul>
                                                <div class="actions">
                                                        <span class="closeFilter">
                                                                <i class="material-icons">close</i>
                                                        </span>
                                                        <!--<div class="btnContainer">
                                                                <span class="submitForm">تصفية النتائج
                                                                </span>
                                                        </div>-->
                                                </div>
                                        </div>
                                        <div class="showMob">
                                                <span class="openFilter">تصفية النتائج
                                                </span>
                                        </div>
                                
                                </div>
                        </div>
                        <div class="list-component">
                                <div class="list-component-con">
                                        <div class="list-head">
                                                <h4><span><?=$trip01_title?></span> <?php echo $departure_city_name?> </h4>
                                                <div class='bus_arrow'>
                                                        <i class="fas fa-bus"></i>
                                                        <i class="fas fa-long-arrow-alt-left"></i>
                                                </div>
                                                <h4><span><?=$trip12_title?></span> <?php echo $arrival_city1_name?> </h4>
                                                <?php if($arrival_city2_name){ ?>
                                                <div class='bus_arrow'>
                                                        <i class="fas fa-bus"></i>
                                                        <i class="fas fa-long-arrow-alt-left"></i>
                                                </div>
                                                <h4><span><?=$trip23_title?></span> <?php echo $arrival_city2_name?> </h4>
                                                <?php } ?>
                                        </div>
                                                                               
                                        <div class="trip-date"><?php echo $departure_full_date ." ($period يوم$morouna_label)";//. " ت=" . $departure_date . " ع=".count($travelFoundList)?></div>
                                        <div class="list-calendar">
                                                <div class="list-calendar-con">
                                                        <span class="calnder-arrow<?php echo $shift_remove_disabled ?>">
                                                                <i id='shift_remove' class="material-icons">keyboard_arrow_right</i>
                                                        </span>
                                                        <div class="calnder-content">
                                                                <span class="crit_date goto_other_date" xdata="<?php echo $departure_prev_offset ?>"><?php echo $departure_prev_full_date_short ?>
                                                                </span>
                                                                <span class="crit_date active"><?php echo $departure_full_date_short ?>
                                                                </span>
                                                                <span class="crit_date goto_other_date" xdata="<?php echo $departure_next_offset ?>"><?php echo $departure_next_full_date_short ?>
                                                                </span>
                                                        </div>
                                                        <span class="calnder-arrow">
                                                                <i id='shift_add' class="material-icons">keyboard_arrow_left</i>
                                                        </span>
                                                </div>
                                        </div>
                        <?php
                                if(count($travelFoundList)>0)
                                {
                                        foreach($travelFoundList as $travelFoundItem)
                                        {

                                                $price_std = $travelFoundItem->getSeatPriceByCateg($categ=1);  // مقعد عادي
                                                list($week_period_enum, $period_type_enum, $yperiod_id, $period_nb_days, $period_nb_nights, $report) = $travelFoundItem->getTravelProps();         
                        ?>        

                                        <div class="list go_<?php echo  $travelFoundItem->start_day_part?> return_<?php echo  $travelFoundItem->end_day_part ?> buscateg_<?php echo  $travelFoundItem->travel_level ?> ">
                                                <div class="list-con">
                                                        <div class="right-side">
                                                            <?php echo  $travelFoundItem->showTravelCompanyLogo(); ?>                                                            
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn show_me" style="position: relative;">
                                                                                <a class="show_me" href='i.php?cn=booker&mt=preview&ds=<?php echo $date_system?>&tid=<?php echo $travelFoundItem->id ?>&beds=<?php echo $nb_beds ?>&travelers=<?php echo $nb_travelers ?>'><h6>الإطلاع على التفاصيل</h6></a>
                                                                        </button>
                                                                </div>    
                                                            <?php echo  $travelFoundItem->showTravelInfos(); ?>    
                                                        </div>
                                                </div>
                                                <div class="list-con">
                                                        <div class="right-side">
                                                                <h4>
                                                                        <p>
                                                                                الإنطلاق من <?php echo  $travelFoundItem->start_place ?>
                                                                        </p>
                                                                        <span class='btb_time'>
                                                                                <?php echo  $travelFoundItem->planned_start_time ?>
                                                                        </span>
                                                                        <span>
                                                                                <?php echo  $travelFoundItem->tvf("start_day_part",$lang) ?>
                                                                        </span>
                                                                </h4>
                                                                <strong class="bus-class-name bus-travel-categ-<?php echo  $travelFoundItem->travel_level ?>"><?php echo  $travelFoundItem->decode("travel_level"); ?></strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div>
                                                                <h5>
                                                                        <p> العودة إلى <?php echo  $travelFoundItem->arrival_place ?></p>
                                                                        <span class='btb_time'><?php echo  $travelFoundItem->planned_end_time ?></span>
                                                                        <span><?php echo  $travelFoundItem->tvf("end_day_part",$lang) ?></span>
                                                                        <span class='tperiod'><?php echo  $period_nb_days ?> يوم</span>
                                                                </h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <a class="book_me" href='i.php?cn=booking&tid=<?php echo $travelFoundItem->id ?>&travelers=<?php echo $nb_travelers ?>&beds=<?php echo $nb_beds ?>&ds=<?php echo $date_system?>'><h6>حجز</h6></a>
                                                                        </button>
                                                                </div>
                                                                <h4>
                                                                        <span class='btb_price'><?echo $price_std?>.00</span>
                                                                        <span>ريال للمقعد</span>
                                                                </h4>
                                                        </div>
                                                </div>
                                        </div>                                        
                        <?php
                                        }
                        ?>
                                        <div class='booking_info'> عدد الرحلات المتوفرة : <?php echo count($travelFoundList) ?></div>
                        <?php
                                }
                                else
                                {
                                        
                                        if($foundProgramsListCount>0)
                                        {
                        ?>
                        <div class='booking_warning'>        يوجد <?php echo $foundProgramsListCount ?> برنامج تحت الإعداد موافق للمعايير المدخلة ولكن لا يوجد رحلات مفتوحة حاليا</div>
                        <?php
                                        }
                                        
                                        if($foundBiggerProgramsListCount>0)
                                        {
                        ?>
                        <div class='booking_warning'>نود إعلامك عميلنا العزيز بتوفر برنامج قريب من المطلوب ولكنه يمتد إلى <?php echo $bigger_period ?> يوم وليس <?php echo $period ?> يوم</div>
                        <?php
                                        }
                                        
                                        if($foundSmallerProgramsListCount>0)
                                        {
                        ?>
                        <div class='booking_warning'>إن شئت عميلنا العزيز هنالك برنامج <?php echo $smaller_period ?> يوم وليس <?php echo $period ?> يوم</div>
                        <?php
                                        }

                                        if(!$allCount)
                                        {
                        ?>
                        <div class='booking_warning'>نأسف، لا يوجد عند عملائنا حاليا برامج تطابق هذه المعايير</div>
                        
                        <?php
                                        }
                        ?>
                                <div class='marketing marketing_bloc'>
                                        <div class='marketing marketing_message'>      إذا كنت صاحب مكتب رحلات العمرة والزيارة أو تعرف أحد المكاتب الجيدة وتريد أن نعرفها بخدمات منصتنا قم بذلك وفز ب100 نقطة 'عميل نشط' </div>
                                        <div class='marketing marketing_link'><a href='i.php?cn=content&mt=register&source=customer'>اضغط هنا</a></div>                                        
                                        <br><br>
                                        <div class='marketing marketing_message'>       يمكنك أيضا المحاولة بمعايير أخرى من هنا</div>
                                        <div class='marketing back_home'><a href="index.php"><h6>بحث جديد</h6></a></div>  
                                </div>        
                        <?php
                                }
                        ?>
                                        
                                        
                                                                         
                                </div>
                              
                        </div>
                        <div class="ads-component">
                                <div class="calque-ad">
                                        <div class="ad-body">
                                                <img class='ad-picture' src='pic/bus-sa-ilan.png' />
                                        </div>
                                </div>
                                <div class="calque-ad">
                                        <div class="ad-body">
                                                <img class='ad-picture' src='pic/tawaf.jpg' />
                                        </div>
                                </div>                                
                                <div class="calque-ad">
                                        <div class="ad-body">
                                                <img class='ad-picture' src='pic/bus-sa-ilan.png' />
                                        </div>
                                </div>
                                <div class="calque-ad">
                                        <div class="ad-body">
                                                <img class='ad-picture' src='pic/bab-aziz.jpg' />
                                        </div>
                                </div>
                                <div class="calque-ad">
                                        <div class="ad-body">
                                                <img class='ad-picture' src='pic/kaaba.jpg' />
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
</div>
</div>
<script>
        
        $(document).ready(function(){
                $(".openSearch").click(function(){
                        $(".search-component-form").addClass("show"); 
                        $(".search-comp-text").addClass("hide"); 
                        $(".list-component").addClass("hide"); 
                        $(".ads-component").addClass("hide"); 
                });

                $(".closeSearchForm").click(function(){
                        $(".search-component-form").removeClass("show"); 
                        $(".search-comp-text").removeClass("hide");
                        $(".list-component").removeClass("hide"); 
                        $(".ads-component").removeClass("hide"); 
                });


                $("#going_evening").click(function(){
                        
                        if(($("#going_evening").prop('checked') == true)) $(".go_evening").removeClass("hide_go"); 
                        else $(".go_evening").addClass("hide_go"); 

                        if(($("#going_morning").prop('checked') == true)) $(".go_morning").removeClass("hide_go"); 
                        else $(".go_morning").addClass("hide_go");                        

                        if(($("#going_night").prop('checked') == true)) $(".go_night").removeClass("hide_go"); 
                        else $(".go_night").addClass("hide_go"); 

                        $(".booking_info").addClass("hide");
                });

                $("#going_morning").click(function(){
                        if(($("#going_evening").prop('checked') == true)) $(".go_evening").removeClass("hide_go"); 
                        else $(".go_evening").addClass("hide_go"); 

                        if(($("#going_morning").prop('checked') == true)) $(".go_morning").removeClass("hide_go"); 
                        else $(".go_morning").addClass("hide_go");                        

                        if(($("#going_night").prop('checked') == true)) $(".go_night").removeClass("hide_go"); 
                        else $(".go_night").addClass("hide_go"); 

                        $(".booking_info").addClass("hide");
                });

                $("#going_night").click(function(){
                        if(($("#going_evening").prop('checked') == true)) $(".go_evening").removeClass("hide_go"); 
                        else $(".go_evening").addClass("hide_go"); 

                        if(($("#going_morning").prop('checked') == true)) $(".go_morning").removeClass("hide_go"); 
                        else $(".go_morning").addClass("hide_go");                        

                        if(($("#going_night").prop('checked') == true)) $(".go_night").removeClass("hide_go"); 
                        else $(".go_night").addClass("hide_go"); 

                        $(".booking_info").addClass("hide");
                });

                $("#returning_evening").click(function(){
                        if(($("#returning_evening").prop('checked') == true)) $(".return_evening").removeClass("hide_return"); 
                        else $(".return_evening").addClass("hide_return"); 

                        if(($("#returning_morning").prop('checked') == true)) $(".return_morning").removeClass("hide_return"); 
                        else $(".return_morning").addClass("hide_return"); 

                        if(($("#returning_night").prop('checked') == true)) $(".return_night").removeClass("hide_return"); 
                        else $(".return_night").addClass("hide_return"); 

                        $(".booking_info").addClass("hide");
                });

                $("#returning_morning").click(function(){
                        if(($("#returning_evening").prop('checked') == true)) $(".return_evening").removeClass("hide_return"); 
                        else $(".return_evening").addClass("hide_return"); 

                        if(($("#returning_morning").prop('checked') == true)) $(".return_morning").removeClass("hide_return"); 
                        else $(".return_morning").addClass("hide_return"); 

                        if(($("#returning_night").prop('checked') == true)) $(".return_night").removeClass("hide_return"); 
                        else $(".return_night").addClass("hide_return");

                        $(".booking_info").addClass("hide");
                });

                $("#returning_night").click(function(){
                        if(($("#returning_evening").prop('checked') == true)) $(".return_evening").removeClass("hide_return"); 
                        else $(".return_evening").addClass("hide_return"); 

                        if(($("#returning_morning").prop('checked') == true)) $(".return_morning").removeClass("hide_return"); 
                        else $(".return_morning").addClass("hide_return"); 

                        if(($("#returning_night").prop('checked') == true)) $(".return_night").removeClass("hide_return"); 
                        else $(".return_night").addClass("hide_return");

                        $(".booking_info").addClass("hide");
                });

                $("#buscat_1").click(function(){
                        if($("#buscat_1").prop('checked') == true) $(".buscateg_1").removeClass("buscateg_hide"); 
                        else $(".buscateg_1").addClass("buscateg_hide"); 

                        $(".booking_info").addClass("hide");
                });

                $("#buscat_2").click(function(){
                        if($("#buscat_2").prop('checked') == true) $(".buscateg_2").removeClass("buscateg_hide"); 
                        else $(".buscateg_2").addClass("buscateg_hide"); 

                        $(".booking_info").addClass("hide");
                });

                $("#buscat_3").click(function(){
                        if($("#buscat_3").prop('checked') == true) $(".buscateg_3").removeClass("buscateg_hide"); 
                        else $(".buscateg_3").addClass("buscateg_hide"); 

                        $(".booking_info").addClass("hide");
                });

                $("#buscat_4").click(function(){
                        if($("#buscat_4").prop('checked') == true) $(".buscateg_4").removeClass("buscateg_hide"); 
                        else $(".buscateg_4").addClass("buscateg_hide"); 

                        $(".booking_info").addClass("hide");
                });

                $("#nb_travelers_dec_btn").click(function(){
                        newval = parseInt($("#nb_travelers").val())-1;
                        if(newval<0) newval = 0;
                        $("#nb_travelers").val(newval);
                        $("#span_nb_travelers").text(newval);
                });

                $("#nb_travelers_inc_btn").click(function(){
                        newval = parseInt($("#nb_travelers").val())+1;
                        if(newval>50) newval = 50;
                        $("#nb_travelers").val(newval);
                        $("#span_nb_travelers").text(newval);
                });

                $("#nb_beds_dec_btn").click(function(){
                        newval = parseInt($("#nb_beds").val())-1;
                        if(newval<0) newval = 0;
                        $("#nb_beds").val(newval);
                        $("#span_nb_beds").text(newval);
                });

                $("#nb_beds_inc_btn").click(function(){
                        newval = parseInt($("#nb_beds").val())+1;
                        if(newval>50) newval = 50;
                        $("#nb_beds").val(newval);
                        $("#span_nb_beds").text(newval);
                });

                $("#period_dec_btn").click(function(){
                        newval = parseInt($("#period").val())-1;
                        if(newval<0) newval = 0;
                        $("#period").val(newval);
                        $("#span_period").text(newval);
                });

                $("#period_inc_btn").click(function(){
                        newval = parseInt($("#period").val())+1;
                        if(newval>50) newval = 50;
                        $("#period").val(newval);
                        $("#span_period").text(newval);
                });

                $("#morouna_dec_btn").click(function(){
                        newval = parseInt($("#morouna").val())-1;
                        if(newval<0) newval = 0;
                        $("#morouna").val(newval);
                        $("#span_morouna").text(newval);
                });

                $("#morouna_inc_btn").click(function(){
                        newval = parseInt($("#morouna").val())+1;
                        if(newval>2) newval = 2;
                        $("#morouna").val(newval);
                        $("#span_morouna").text(newval);
                });


                $(".openFilter").click(function(){
                        $(".my_filter.hideMob").toggleClass("active");   
                });

                $(".closeFilter").click(function(){
                        $(".my_filter.hideMob").removeClass("active");   
                });

                
                $("#switch_to_greg").click(function(){        
                                $("#bloc_search_hijri").addClass("hide"); 
                                $("#bloc_search_greg").removeClass("hide"); 
                                // $("#departure_date").val("");
                                $("#date_system").val("greg");
                                $("#departure_date").prop('required',false);
                                $("#departure_gdate").prop('required',true);
                                $("#departure_gdate").focus();
                });

                $("#switch_to_hijri").click(function(){        
                                $("#bloc_search_hijri").removeClass("hide"); 
                                $("#bloc_search_greg").addClass("hide"); 
                                // $("#departure_gdate").val("");
                                $("#date_system").val("hijri");
                                $("#departure_gdate").prop('required',false);
                                $("#departure_date").prop('required',true);
                                $("#departure_date").focus();
                });
                

                $("#shift_add").click(function(){ 
                        $("#shift").val(1); 
                        $("#omra_ziara_form").submit();
                });

                $("#shift_remove").click(function(){ 
                        $("#shift").val(-1); 
                        $("#omra_ziara_form").submit();
                });

                
        });


</script>