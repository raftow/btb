<?php
        $bannum = round(rand(1,3));
        
        
        $ichhar_by_context = array();
        
        $ichhar_by_context["public"][] = "احجز رحلتك في أقل من دقيقتين";
        $ichhar_by_context["public"][] = "تحتاج راحة ؟ وش أحسن من مكة أو المدينة؟";
        
        $context = "public";
        
        $context_ichhar_count = count($ichhar_by_context[$context]);
        
        $ich_rand = round(rand(0,$context_ichhar_count-1));
        $ichhar_text = $ichhar_by_context[$context][$ich_rand];

        $cityList = City::loadAll();
        $use_city_pictures = false;

        $both_active  = ($omtype == "both")  ? "active" : "";
        $omra_active  = ($omtype == "omra")  ? "active" : "";
        $ziara_active = ($omtype == "ziara") ? "active" : "";

        $sakan_checked = ($omsakan == 1) ? "checked" : "";


        $both_destination_selector_hide  = ($omtype == "both")  ? "" : "hide";
        $omra_destination_selector_hide  = ($omtype == "omra")  ? "" : "hide";
        $ziara_destination_selector_hide = ($omtype == "ziara") ? "" : "hide";

        $message_destination_city_id_title = "توضيح";
        $message_destination_city_id_content = "إذا كنت تريد تعديل مدينة الوصول فعليك بتعديل اختيارك لنوع الرحلة عمرة إلى مكة أو زيارة للمدينة أو كلاهما في أول معايير البحث";

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
<div class="home_banner home_banner<?=$bannum?>">
        <div class="quick_filter_container scheduleContainer" height-flag="true" style="height: 200px;">
                <div class="row booking_filter">
                        <div class="col-xs-12">					
                                <div class="">						
                                        <div id="animated-text" class="text-center letterSpacing08 noir opacity-0 animated huge2 customchain opacity-1">							
                                                <div class="booking_filter_header banner<?=$bannum?>" data-bind="i18n-text: { key: 'TextField-Genel-40'}"><?php echo $ichhar_text ?>
                                                </div>						
                                        </div>					
                                </div>                        
                                <div class="select-travel grid-gutter-small mb-10">						                                        						
                                        <div class="zz-tab-content clearfix">							
                                                <div id="omraAvailabilityTab" class="tab-pane noborder fade in active">								
                                                        <form id="mySearchOmraForm" action="i.php" method="POST">
                                                        <div>
                                                                <input type="hidden" name="omtype" id="omtype" value="<?php echo $omtype ?>">
                                                                <input type="hidden" name="omsakan" id="omsakan" value="<?php echo $omsakan ?>">
                                                                <input type="hidden" name="cn" id="cn" value="Booker">
                                                                <input type="hidden" name="mt" id="mt" value="omra_ziara_date">
                                                                
                                                                <div class="row zz-booker general-booker">
                                                                        <div class="col-xs-12 booker-menu-wrapper">		
                                                                                <div class="booker-menu">			
                                                                                        <a id="option_both" role="button" tabindex="0" class="noir mini-booker-link booker-type-link <?php echo $both_active?>" onClick="changeOmraType('both')">عمرة وزيارة</a>			
                                                                                        <a id="option_omra" role="button" tabindex="0" class="noir mini-booker-link booker-type-link <?php echo $omra_active?>"        onClick="changeOmraType('omra')">عمرة فقط</a>		 		
                                                                                        <a id="option_ziara" role="button" tabindex="0" class="noir mini-booker-link booker-type-link <?php echo $ziara_active?>"        onClick="changeOmraType('ziara')">زيارة فقط</a>
                                                                                        		
                                                                                        <a id="option_omra_sakan" role="button" tabindex="0" class="noir mini-booker-link award-link pull-right-sm <?php echo $sakan_checked?>" onClick="toggleOmraSakan()">رحلة مع سكن</a>				
                                                                                        
                                                                                </div>	
                                                                        </div>

                                                                        <div class="col-xs-12 booker-content" id="singleCityContainer">		
                                                                                <div class="row">
                                                                                        
                                                                                        <div class="col-xs-6">				
                                                                                                <div class="row">
                                                                                                        <label for="nb_travelers">عدد المسافرين</label>
                                                                                                        <?php
                                                                                                                $nb_travelers_id_val = array();
                                                                                                                $nb_travelers_id_val[1] = "مسافر واحد";
                                                                                                                $nb_travelers_id_val[2] = "مسافران اثنان";
                                                                                                                $nb_travelers_id_val[3] = "3 مسافرين";
                                                                                                                $nb_travelers_id_val[4] = "4 مسافرين";
                                                                                                                $nb_travelers_id_val[5] = "5 مسافرين";
                                                                                                                $nb_travelers_id_val[6] = "6 مسافرين";
                                                                                                                $nb_travelers_id_val[7] = "7 مسافرين";
                                                                                                                $nb_travelers_id_val[8] = "8 مسافرين";
                                                                                                                $nb_travelers_id_val[9] = "9 مسافرين";
                                                                                                                $nb_travelers_id_val[10] = "10 مسافرين";
                                                                                                                $nb_travelers_id_val[11] = "11 مسافر";
                                                                                                                

                                                                                                                $props = array();
                                                                                                                $props["class"] = "nb_travelers";
                                                                                                                $props["name"] = "nb_travelers";
                                                                                                                $props["id"] = "nb_travelers";
                                                                                                                $props["required"] = true;
                                                                                                                echo AfwInputHelper::drop_down($nb_travelers_id_val, $selected = array($nb_travelers), $props);
                                                                                                        ?>                                                                                                         
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-xs-6">				
                                                                                                <div class="row">
                                                                                                
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

                                                                                                 
                                                                                                 
                                                                                                ?>
                                                                                                <input type='hidden' id='date_system' name='date_system' value='<?php echo $date_system?>'>
                                                                                                <div id='bloc_search_hijri' class="<?php echo $hide_hijri ?>">
                                                                                                        <label for="departure_gdate">تاريخ الرحلة 
                                                                                                        <span id='switch_to_greg' class='sysswitch switch_to_greg'>هجري </span>
                                                                                                        
                                                                                                        </label>
                                                                                                        <input type="text" id="departure_date" name="departure_date" value="<?php echo $departure_date_formatted ?>" autocomplete="off" <?php echo $required_hijri ?>>
                                                                                                        <script type="text/javascript">
                                                                                                                $('#departure_date').calendarsPicker(
                                                                                                                        {
                                                                                                                                calendar: $.calendars.instance('UmmAlQura'),
                                                                                                                                /*monthsToShow: [1, 1], 
                                                                                                                                showOtherMonths: true,*/
                                                                                                                                minDate: 0,
                                                                                                                                <?php echo $calendar_tr ?>
                                                                                                                                <?php echo "onSelect:" ?> function (date) {
                                                                                                                                        if(date[0]<'<?php echo $hijri_today_formatted ?>')
                                                                                                                                        {
                                                                                                                                                atalert('تنبيه', 'لقد اخترت تاريخا في الماضي '+date[0]+' الرجاء اختيار تاريخ آخر'); 
                                                                                                                                                $('#departure_date').val("");
                                                                                                                                        }
                                                                                                                                }
                                                                                                                        });
                                                                                                        </script>
                                                                                                </div>
                                                                                                <?php
                                                                                                 
                                                                                                ?>
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
                                                                                                <?php
                                                                                                 
                                                                                                ?>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-xs-6">				
                                                                                                <div class="row">        
                                                                                                        <label for="period">مدة الرحلة</label>
                                                                                                        <?php
                                                                                                                $modda_id_val = array();
                                                                                                                $modda_id_val[2] = "يومين";
                                                                                                                $modda_id_val[3] = "3 أيام";
                                                                                                                $modda_id_val[4] = "4 أيام";
                                                                                                                $modda_id_val[5] = "5 أيام";
                                                                                                                $modda_id_val[6] = "6 أيام";
                                                                                                                $modda_id_val[99] = "تزيد عن 6 أيام";

                                                                                                                $props = array();
                                                                                                                $props["class"] = "period_travel";
                                                                                                                $props["name"] = "period";
                                                                                                                $props["id"] = "period";
                                                                                                                $props["required"] = true;
                                                                                                                $props["default_value"] = 4;
                                                                                                                echo AfwInputHelper::drop_down($modda_id_val, $selected = array($period), $props);
                                                                                                        ?>                                                                                                        
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-xs-6">				
                                                                                                <div class="row">        
                                                                                                        <label for="morouna">مرونة في مدة الرحلة؟</label>
                                                                                                        <?php
                                                                                                                $morouna_id_val = array();
                                                                                                                $morouna_id_val[0] = "لا بل أريد نفس هذه المدة";
                                                                                                                $morouna_id_val[1] = "نعم +/- يوم واحد";
                                                                                                                $morouna_id_val[2] = "نعم +/- يومين";
                                                                                                                $morouna_id_val[3] = "نعم +/- 3 أيام";

                                                                                                                

                                                                                                                $props = array();
                                                                                                                $props["class"] = "morouna";
                                                                                                                $props["name"] = "morouna";
                                                                                                                $props["id"] = "morouna";
                                                                                                                $props["required"] = true;
                                                                                                                $props["default_value"] = 1;
                                                                                                                echo AfwInputHelper::drop_down($morouna_id_val, $selected = array($morouna), $props);
                                                                                                        ?>
                                                                                                </div>
                                                                                        </div>
                                                                                        
                                                                                        
                                                                                        <div class="col-xs-6">				
                                                                                                <div class="row">					
                                                                                                <?php
                                                                                                        $cityBoth = array();
                                                                                                        $cityBoth[Travel::$CITY_MAKKA_FIRST] = "مكة المكرمة أولا ثم المدينة";
                                                                                                        $cityBoth[Travel::$CITY_MADINA_FIRST] = " المدينة أولا ثم مكة المكرمة ";
                                                                                                        if($use_city_pictures)
                                                                                                        {
                                                                                                                $cityBothPic = array();
                                                                                                                $cityBothPic[Travel::$CITY_MAKKA_FIRST] = "cities/mak.png";
                                                                                                                $cityBothPic[Travel::$CITY_MADINA_FIRST] = "cities/mad.png";
                                                                                                        }
                                                                                                        else $cityBothPic = false;
                                                                                                ?>
                                                                                                        <label for="departure_city_id">المغادرة من</label>
                                                                                                        <div class="col-xs-12 col-sm-12 animated flipInX delay19" id="omra_originSelector" data-scroll-parent="">						
                                                                                                                        <div class="port-select-wrapper active" data-bind="css:{ 'active': selectedElem }, click: focusToInput">	
                                                                                                                        <!-- onchange="showValue(this)" -->
                                                                                                                        <?php echo AfwInputHelper::picture_dropdown($cityList, "departure_city_id", $selected=array(301), 
                                                                                                                                                "departure_city_id",$use_city_pictures, $dd_width="", $dd_css="home_filter_dd"); ?>
                                                                                                                        </div>
                                                                                                                					
                                                                                                        </div>
                                                                                                </div>        					
                                                                                        </div>
                                                                                        <div class="col-xs-6">				
                                                                                                <div class="row">
                                                                                                        <label for="destination_city_id">الوصول إلى</label>
                                                                                                        <div class="destination_selector col-xs-12 col-sm-12 animated flipInX delay19 <?php echo $both_destination_selector_hide?>" id="bothDestinationSelector" data-scroll-parent="">						
                                                                                                                        <div class="port-select-wrapper" data-bind="css:{ 'active': selectedElem }, click: focusToInput">	
                                                                                                                        <?php echo AfwInputHelper::picture_dropdown($cityBoth, "omra_city_first", $selected=array($omra_city_first),
                                                                                                                                                "omra_city_first", $cityBothPic, $dd_width="", $dd_css="home_filter_dd"); ?>
                                                                                                                        </div>
                                                                                                        </div>
                                                                                                        <div class="destination_selector col-xs-12 col-sm-12 animated flipInX delay19 <?php echo $omra_destination_selector_hide?>" id="omraDestinationSelector" data-scroll-parent="">						
                                                                                                                <div class="dd ddcommon borderRadius" id="destination_city_id_msdd" tabindex="0" style="width: 100%;">
                                                                                                                        <div class="ddTitle borderRadiusTp">
                                                                                                                                <span class="ddTitleText " id="makka_destination_city_id_title">
                                                                                                                                        <!-- <img src="cities/mak.png" class="fnone"> -->
                                                                                                                                        <span class="ddlabel">مكة المكرمة
                                                                                                                                        </span>
                                                                                                                                        <span class="description" style="display: none;">
                                                                                                                                        </span>
                                                                                                                                </span>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="destination_selector col-xs-12 col-sm-12 animated flipInX delay19 <?php echo $ziara_destination_selector_hide?>" id="ziaraDestinationSelector" data-scroll-parent="">						
                                                                                                                <div class="dd ddcommon borderRadius" id="destination_city_id_msdd" tabindex="0" style="width: 100%;">
                                                                                                                        <div class="ddTitle borderRadiusTp">
                                                                                                                                <span class="ddTitleText " id="madina_destination_city_id_title">
                                                                                                                                        <!-- <img src="cities/mad.png" class="fnone"> -->
                                                                                                                                        <span class="ddlabel">المدينة
                                                                                                                                        </span>
                                                                                                                                        <span class="description" style="display: none;">
                                                                                                                                        </span>
                                                                                                                                </span>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>				
                                                                                        </div>	 			
                                                                                        <div class="col-xs-12 col-sm-4 zz-btn-col">				
                                                                                                <div class="row">					
                                                                                                        <div class="col-xs-6">						
                                                                                                                <div class="animated flipInX delay23">							
                                                                                                                        						
                                                                                                                </div>					
                                                                                                        </div>					
                                                                                                        <div class="col-xs-6">						
                                                                                                                <div class="animated flipInX delay23">							
                                                                                                                        						
                                                                                                                </div>					
                                                                                                        </div>				
                                                                                                </div>			
                                                                                        </div>			
                                                                                        <div class="col-xs-12 col-sm-1">				
                                                                                                <div class="onebtn animated flipInX delay23 submit-booker submit-booker-asssoon">					
                                                                                                        <input type="submit" name="submitSearch" tabindex="0" class="onebtn btn-input-red lh_booker_submit zz-booker-submit zz-booker-asssoon" id="submitSearch" value="بحث" aria-label="Search bus travel" />
                                                                                                </div>                                                                                                			
                                                                                        </div>	 			
                                                                                        <div class="col-xs-12 col-md-9">				
                                                                                                <div class="relative booker booking-cols">					
                                                                                                        				
                                                                                                </div>			
                                                                                        </div>			
                                                                                        <div class="col-xs-12 col-md-5 col-md-offset-7">				
                                                                                                <div class="relative booker booking-cols">					
                                                                                                        				
                                                                                                </div>			
                                                                                        </div>		
                                                                                </div>	
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        </form>
                                                        							
                                                </div>							
                                                						
                                        </div>						
                                        
                                </div>
                        </div>
                </div>
        </div>
</div>

<script>

$(document).ready(function(){

        $("#switch_to_greg").click(function(){        
                                $("#bloc_search_hijri").addClass("hide"); 
                                $("#bloc_search_greg").removeClass("hide"); 
                                $("#departure_date").val("");
                                $("#departure_date").prop('required',false);
                                $("#departure_gdate").prop('required',true);
        });

        $("#switch_to_hijri").click(function(){        
                                $("#bloc_search_hijri").removeClass("hide"); 
                                $("#bloc_search_greg").addClass("hide"); 
                                $("#departure_gdate").val("");
                                $("#departure_gdate").prop('required',false);
                                $("#departure_date").prop('required',true);
        });
        
        $("#makka_destination_city_id_title").click(function(){        
                                new Attention.Alert({
                                        title: '<?php echo $message_destination_city_id_title ?>',
                                        content: '<?php echo $message_destination_city_id_content ?>',
                                        afterClose: () => {                                        
                                }
                                });
                                $("#makka_destination_city_id_title").blur();
        });

        $("#madina_destination_city_id_title").click(function(){        
                                new Attention.Alert({
                                        title: '<?php echo $message_destination_city_id_title ?>',
                                        content: '<?php echo $message_destination_city_id_content ?>',
                                        afterClose: () => {                                        
                                }
                                });
                                $("#madina_destination_city_id_title").blur();
        });

        
});

/*        
                        $("#submitSearch").click(function(){        
                                $("#mySearchOmraForm").submit(); // Submit the form
                        });
                });
*/
</script>
