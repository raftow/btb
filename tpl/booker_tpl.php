<!--
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
                                                <i class="material-icons">date_range</i> تاريخ العودة</h5>
                                        <p><?php echo $return_full_date?>
                                        </p>
                                </div>
                                <div class="col"><h5>
                                                <i class="material-icons">people</i>عدد المسافرين</h5>
                                        <p><?php echo $nb_travelers ?>
                                        </p>
                                </div>
                                <div class="col"><h5>
                                                <i class="material-icons">hotel</i>عدد الأسرة</h5>
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
                                <div class="col"><h5> تاريخ العودة</h5>
                                        <p><?php echo $arrival_full_date?>
                                        </p>
                                </div>
                                <div class="col"><h5>عدد المسافرين</h5>
                                        <p><?php echo $nb_travelers ?>
                                        </p>
                                </div>
                                <div class="col"><h5>عدد الأسرة</h5>
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
                                        <form method="POST">
                                        <div class="inputs-container">
                                                <div class="col big">
                                                        <div class="input-field">
                                                                <label>
                                                                        <i class="material-icons">pin_drop</i> سفر من
                                                                </label>
                                                                <?php echo AfwInputHelper::picture_dropdown($cityList, "departure_city_id", $selected=array($departure_city_id), "departure_city_id",false, 200); ?> 
                                                        </div>
                                                </div>
                                                <div class="col big">
                                                        <div class="input-field">
                                                                <label>
                                                                        <i class="material-icons">pin_drop</i>لغرض
                                                                </label>
                                                                <?php
                                                                        $cityBoth = array();
                                                                        // "مكة المكرمة"
                                                                        $cityBoth[Travel::$CITY_MAKKA] = "العمرة";    
                                                                        // " المدينة"
                                                                        $cityBoth[Travel::$CITY_MADINA] = "الزيارة";
                                                                        // مكة المكرمة أولا ثم المدينة
                                                                        $cityBoth[Travel::$CITY_MAKKA_FIRST] = "العمرة ثم الزيارة";
                                                                        //  المدينة أولا ثم مكة المكرمة 
                                                                        $cityBoth[Travel::$CITY_MADINA_FIRST] = "الزيارة ثم العمرة";
                                                                        echo AfwInputHelper::picture_dropdown($cityBoth, "omra_city_first", $selected=array($omra_city_first), "omra_city_first",false, 200)." ($omra_city_first)";
                                                                ?>
                                                                
                                                        </div>
                                                </div>
                                                <div class="datepickercom return">
                                                        <div class="col date small">
                                                                <div class="input-field">
                                                                        <label>
                                                                                <i class="material-icons">date_range</i> تاريخ السفر
                                                                        </label>
                                                                        <input type="text" id="departure_date" name="departure_date" value="<?=AfwDateHelper::inputFormatHijriDate($departure_date) ?>" autocomplete="off">
                                                                        <script type="text/javascript">
                                                                                $('#departure_date').calendarsPicker({calendar: $.calendars.instance('UmmAlQura')});
                                                                        </script>
                                                                </div>
                                                        </div>
                                                        <div class="col date small">
                                                                <div class="input-field date">
                                                                        <div class="col date small">
                                                                                <div class="input-field">
                                                                                        <label>
                                                                                                <i class="material-icons">date_range</i>  تاريخ العودة
                                                                                        </label>
                                                                                        <input type="text" id="return_date" name="return_date"  value="<?=AfwDateHelper::inputFormatHijriDate($return_date) ?>" autocomplete="off">
                                                                                        <script type="text/javascript">
                                                                                                $('#return_date').calendarsPicker({calendar: $.calendars.instance('UmmAlQura')});
                                                                                        </script>
                                                                                        <?php if(!$return_mandatory) { ?><i class="material-icons closeReturnDate closeBtn">close</i><?php } ?>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col people small seats-count-component search">
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
                                                <div class="col people small seats-count-component search">
                                                        <div class="input-field">
                                                                <label>
                                                                        <i class="material-icons">hotel</i> عدد الأسرّة
                                                                </label>
                                                                <div class="seat-selector-default search">
                                                                        <button type="button" class="nb_beds_inc_btn" id="nb_beds_inc_btn">
                                                                                <i class="material-icons">add</i>
                                                                        </button>
                                                                        <span name="span_nb_beds" id="span_nb_beds"><?php echo $nb_travelers ?>
                                                                        </span>
                                                                        <input type="hidden" name="nb_beds" id="nb_beds" value="<?php echo $nb_beds ?>">
                                                                        <button type="button" class="nb_beds_dec_btn" id="nb_beds_dec_btn">
                                                                                <i class="material-icons">remove</i>
                                                                        </button>
                                                                </div>
                                                        </div>
                                                </div>

                                        </div>
                                        <input type="hidden" name="omsakan" id="omsakan" value="<?php echo $omsakan ?>">
                                        <input type="submit" class="btn" value="بحث">
                                        <i class="material-icons closeBtn closeSearchForm">close</i>
                                        </form>
                        </div>
                        
                </div>
        </div>
        
        <div class="trip-route-component">
                <div class="trip-route-con">
                        <div class="filter-component">
                                <div class='sticky_filter'>
                                        <div class="hideMob">
                                                <ul class="list-filter-sec">
                                                        <li><h4>فئة الباص</h4>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in" id="buscat_1" checked>
                                                                <label class="checkbox-label" for="buscat_1"> دي لوكس بلس 
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in" id="buscat_2" checked>
                                                                <label class="checkbox-label" for="buscat_2"> اليت 
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in" id="buscat_3" checked>
                                                                <label class="checkbox-label" for="buscat_3"> فئة 3 
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in" id="buscat_4" checked>
                                                                <label class="checkbox-label" for="buscat_4"> فئة 4 
                                                                </label>
                                                        </li>

                                                </ul>
                                                <ul class="list-filter-sec">
                                                        <li><h4>مغادرة <?php echo $departure_city_name?></h4>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in going-morning" id="going_morning">
                                                                <label class="checkbox-label" for="going_morning">صباحا 
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in going-evening" id="going_evening">
                                                                <label class="checkbox-label" for="going_evening">مساءاً 
                                                        </label>
                                                        </li>
                                                </ul>
                                                <ul class="list-filter-sec">
                                                        <li><h4>مغادرة <?php echo $arrival_city_name?></h4>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in return-morning" id="returning_morning">
                                                                <label class="checkbox-label" for="returning_morning">صباحا 
                                                                </label>
                                                        </li>
                                                        <li>
                                                                <input type="checkbox" class="filled-in return-evening" id="returning_evening">
                                                                <label class="checkbox-label" for="returning_evening">مساءاً 
                                                                </label>
                                                        </li>
                                                </ul>
                                                <div class="actions">
                                                        <span class="closeFilter">
                                                                <i class="material-icons">close</i>
                                                        </span>
                                                        <div class="btnContainer">
                                                                <span class="submitForm">تصفية النتائج
                                                                </span>
                                                        </div>
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
                                                <div>
                                                        <i class="fas fa-bus"></i>
                                                        <i class="fas fa-long-arrow-alt-left"></i>
                                                </div>
                                                <h4><span><?=$trip12_title?></span> <?php echo $arrival_city1_name?> </h4>
                                                <?php if($arrival_city2_name){ ?>
                                                <div>
                                                        <i class="fas fa-bus"></i>
                                                        <i class="fas fa-long-arrow-alt-left"></i>
                                                </div>
                                                <h4><span><?=$trip23_title?></span> <?php echo $arrival_city2_name?> </h4>
                                                <?php } ?>
                                        </div>
                                        
                                        <div class="trip-date"><?php echo $departure_full_date ." ($period يوم)";//. " ت=" . $departure_date . " ع=".count($travelFoundList)?></div>
                                        <div class="list-calendar">
                                                <div class="list-calendar-con">
                                                        <span class="calnder-arrow-disabled">
                                                                <i class="material-icons">keyboard_arrow_right</i>
                                                        </span>
                                                        <div class="calnder-content">
                                                                <span class="crit_date goto_other_date" xdata="<?php echo $departure_prev_offset ?>"><?php echo $departure_prev_full_date ?>
                                                                </span>
                                                                <span class="crit_date active"><?php echo $departure_full_date ?>
                                                                </span>
                                                                <span class="crit_date goto_other_date" xdata="<?php echo $departure_next_offset ?>"><?php echo $departure_next_full_date ?>
                                                                </span>
                                                        </div>
                                                        <span class="calnder-arrow">
                                                                <i class="material-icons">keyboard_arrow_left</i>
                                                        </span>
                                                </div>
                                        </div>
                        <?php
                                if(count($travelFoundList)>0)
                                {
                        ?>        

                                        <div class="list go_morning">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الرياض 
                                                                        </p><span class='btb_time'>10:45</span>
                                                                        <span>صباحا
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> مكة إلى الغردقة
                                                                        </p><span class='btb_time'>07:00</span>
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار هذه</h6>
                                                                        </button>
                                                                </div><h4><span class='btb_price'>125.00</span>
                                                                        <span>ريال للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list go_morning buscateg_1">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الرياض 
                                                                        </p><span class='btb_time'>09:45</span>
                                                                        <span>صباحا
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> مكة إلى الغردقة
                                                                        </p><span class='btb_time'>07:00</span>
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار هذه</h6>
                                                                        </button>
                                                                </div><h4><span class='btb_price'>125.00</span>
                                                                        <span>ريال للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list go_evening buscateg_1">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الرياض 
                                                                        </p><span class='btb_time'>12:45</span>
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> مكة إلى الغردقة
                                                                        </p><span class='btb_time'>07:00</span>
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار هذه</h6>
                                                                        </button>
                                                                </div><h4><span class='btb_price'>125.00</span>
                                                                        <span>ريال للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="list go_evening buscateg_2">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الرياض 
                                                                        </p><span class='btb_time'>12:45</span>
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-elite">اليت</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> مكة إلى الغردقة
                                                                        </p><span class='btb_time'>07:00</span>
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار هذه</h6>
                                                                        </button>
                                                                </div><h4><span class='btb_price'>125.00</span>
                                                                        <span>ريال للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                        <?php
                                }
                                else
                                {
                                        
                                        if($foundProgramsListCount>0)
                                        {
                        ?>
                        <div class='booking_warning'>        يوجد <?php echo $foundProgramsListCount ?> برنامج تحت الإعداد موافق للمعايير المطلوبة ولكن لا يوجد رحلات مفتوحة حاليا</div>
                        <?php
                                        }
                                        
                                        if($foundBiggerProgramsListCount>0)
                                        {
                        ?>
                        <div class='booking_warning'>نود إعلامك عميلنا العزيز بتوفر برنامج قريب من المطلوبة ولكنه يميتد إلى <?php echo $bigger_period ?> يوم وليس <?php echo $period ?> يوم</div>
                        <?php
                                        }
                                        
                                        if($foundSmallerProgramsListCount>0)
                                        {
                        ?>
                        <div class='booking_warning'>أو إن شئت عميلنا العزيز هنالك برنامج <?php echo $smaller_period ?> يوم وليس <?php echo $period ?> يوم</div>
                        <?php
                                        }

                                        if(!$allCount)
                                        {
                        ?>
                        <div class='booking_warning'>        لا يوجد عند عملائنا حاليا برامج تطابق هذه المعايير، نتشرف بزيارتكم لنا لاحقا</div>
                        <?php
                                        }
                                }
                        ?>
                                <div class='booking_info'>يسعدنا خدمتك</div>        
                                        
                                        
                                </div>
                                <div class="list-component-con">
                                        <div class="list-head"><h4>
                                                        <span>سفر من الغردقة
                                                        </span> الغردقة</h4>
                                                <div>
                                                        <i class="fas fa-bus"></i>
                                                        <i class="fas fa-long-arrow-alt-left"></i>
                                                </div><h4>
                                                        <span>وصول إلى القاهرة
                                                        </span> عبد المنعم رياض </h4>
                                        </div>
                                        <div class="trip-date">ثلاثاء ١٥ سبتمبر  ٢٠٢٠
                                        </div>
                                        <div class="list-calendar">
                                                <div class="list-calendar-con">
                                                        <span class="calnder-arrow-disabled">
                                                                <i class="material-icons">keyboard_arrow_right</i>
                                                        </span>
                                                        <div class="calnder-content">
                                                                <span>إثنين ١٤
                                                                </span>
                                                                <span class="active">ثلاثاء ١٥
                                                                </span>
                                                                <span>أربعاء ١٦
                                                                </span>
                                                        </div>
                                                        <span class="calnder-arrow">
                                                                <i class="material-icons">keyboard_arrow_left</i>
                                                        </span>
                                                </div>
                                        </div>
                                        <div class="list return_morning buscateg_1">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>11:45
                                                                        <span>صباحاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>06:45
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>225.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_1">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>12:30
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>07:30
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>225.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_2">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>01:25
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-elite">Elite D.D</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>08:25
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                        <span class="gb-warn">متبقي كرسي واحد
                                                                        </span>
                                                                </div><h4>405.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_1">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>02:00
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>09:00
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>225.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_1">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>02:15
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>09:15
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>225.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_1">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>02:35
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>09:35
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>225.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_2">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>03:00
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-elite">اليت</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>10:00
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>405.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_1">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>04:05
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>11:05
                                                                        <span>مساءاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>225.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_2">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>05:00
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-royal">فئة 2</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>12:00
                                                                        <span>صباحاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>545.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_3">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>05:31
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-classic">فئة 3</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>12:31
                                                                        <span>صباحاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>180.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_1">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>06:00
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>01:00
                                                                        <span>صباحاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>225.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_2">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>07:01
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-elite">إيليت</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>02:01
                                                                        <span>صباحاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>385.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_1">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>10:00
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-deluxe">دي لوكس بلس</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>05:00
                                                                        <span>صباحاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>225.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="list return_evening buscateg_3">
                                                <div class="list-con">
                                                        <div class="right-side"><h4>
                                                                        <p>سفر من الغردقة 
                                                                        </p>11:00
                                                                        <span>مساءاً
                                                                        </span></h4>
                                                                <strong class="bus-class-name bus-class-name-classic">فئة 3</strong>
                                                                <div class="bus-icon">
                                                                        <i class="material-icons">directions_bus</i>
                                                                        <span>
                                                                        </span>
                                                                </div><h5>
                                                                        <p> وصول إلى عبد المنعم رياض
                                                                        </p>06:00
                                                                        <span>صباحاً
                                                                        </span></h5>
                                                        </div>
                                                        <div class="left-side">
                                                                <div class="btn-container">
                                                                        <button class="btn" style="position: relative;">
                                                                                <h6>أختار الرحلة
                                                                                </h6>
                                                                        </button>
                                                                </div><h4>180.00
                                                                        <span>EGP للكرسي
                                                                        </span></h4>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="tickets-component">
                                <div class="calc-ticket">
                                        <div class="ticketData">
                                                <div class="ticketData-head"><h4>تذاكري</h4>
                                                </div>
                                                <div class="empty-ticket">
                                                        <i class="fas fa-ticket-alt"></i>
                                                        <p>إختار رحلتك من جدول رحلات الجانب الأيمن
                                                        </p><h5>إحجز رحلة ذهاب و عودة</h5><h5>القاهرة  -  الغردقة</h5>
                                                </div>
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
                });

                $(".closeSearchForm").click(function(){
                        $(".search-component-form").removeClass("show"); 
                        $(".search-comp-text").removeClass("hide");
                        $(".list-component").removeClass("hide"); 
                });


                $("#going_evening").click(function(){
                        
                        /*alert("going_evening.checked = "+$("#going_evening").prop('checked'));
                        alert("going_morning.checked = "+$("#going_morning").prop('checked'));*/
                        if(($("#going_evening").prop('checked') == true) || ($("#going_morning").prop('checked') == false)) $(".go_evening").removeClass("hide"); 
                        else $(".go_evening").addClass("hide"); 

                        // alert("rafik 004");

                        if(($("#going_morning").prop('checked') == true) || ($("#going_evening").prop('checked') == false)) $(".go_morning").removeClass("hide"); 
                        else $(".go_morning").addClass("hide");                        
                });

                $("#going_morning").click(function(){
                        if(($("#going_evening").prop('checked') == true) || ($("#going_morning").prop('checked') == false)) $(".go_evening").removeClass("hide"); 
                        else $(".go_evening").addClass("hide"); 
                        if(($("#going_morning").prop('checked') == true) || ($("#going_evening").prop('checked') == false)) $(".go_morning").removeClass("hide"); 
                        else $(".go_morning").addClass("hide");                        
                });

                $("#returning_evening").click(function(){
                        if(($("#returning_evening").prop('checked') == true) || ($("#returning_morning").prop('checked') == false)) $(".return_evening").removeClass("hide"); 
                        else $(".return_evening").addClass("hide"); 

                        if(($("#returning_evening").prop('checked') == true) || ($("#returning_morning").prop('checked') == false)) $(".return_evening").removeClass("hide"); 
                        else $(".return_evening").addClass("hide"); 
                });

                $("#returning_morning").click(function(){
                        if(($("#returning_evening").prop('checked') == true) || ($("#returning_morning").prop('checked') == false)) $(".return_evening").removeClass("hide"); 
                        else $(".return_evening").addClass("hide"); 

                        if(($("#returning_evening").prop('checked') == true) || ($("#returning_morning").prop('checked') == false)) $(".return_evening").removeClass("hide"); 
                        else $(".return_evening").addClass("hide"); 
                });

                $("#buscat_1").click(function(){
                        if($("#buscat_1").prop('checked') == true) $(".buscateg_1").removeClass("buscateg_hide"); 
                        else $(".buscateg_1").addClass("buscateg_hide"); 
                });

                $("#buscat_2").click(function(){
                        if($("#buscat_2").prop('checked') == true) $(".buscateg_2").removeClass("buscateg_hide"); 
                        else $(".buscateg_2").addClass("buscateg_hide"); 
                });

                $("#buscat_3").click(function(){
                        if($("#buscat_3").prop('checked') == true) $(".buscateg_3").removeClass("buscateg_hide"); 
                        else $(".buscateg_3").addClass("buscateg_hide"); 
                });

                $("#buscat_4").click(function(){
                        if($("#buscat_4").prop('checked') == true) $(".buscateg_4").removeClass("buscateg_hide"); 
                        else $(".buscateg_4").addClass("buscateg_hide"); 
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
                })      ;


                

                
        });


</script>
-->