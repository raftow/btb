<?php
        $bannum = round(rand(1,3));
        
        
        $ichhar_by_context = array();
        
        $ichhar_by_context["public"][] = "احجز رحلتك ببطاقتك الائتمانية في أقل من دقيقتين";
        $ichhar_by_context["public"][] = "تحتاج راحة ؟ وش أحسن من مكة أو المدينة؟";
        
        $context = "public";
        
        $context_ichhar_count = count($ichhar_by_context[$context]);
        
        $ich_rand = round(rand(0,$context_ichhar_count-1));
        $ichhar_text = $ichhar_by_context[$context][$ich_rand];
        /*
        $cityList = City::loadAll(0, "symbol != 'sa'");
        if(count($cityList)>7) $use_city_pictures = false;
        else $use_city_pictures = true;
        */


        $cityList = City::loadAll();
        $use_city_pictures = false;
?>        
<div class="home_banner home_banner<?=$bannum?>">
        <div class="quick_filter_container scheduleContainer" height-flag="true" style="height: 200px;">
                <div class="row booking_filter">
                        <div class="col-xs-12">					
                                <div class="">						
                                        <div id="animated-text" class="text-center letterSpacing08 white opacity-0 animated huge2 customchain opacity-1">							
                                                <div class="booking_filter_header banner<?=$bannum?>" data-bind="i18n-text: { key: 'TextField-Genel-40'}"><?php echo $ichhar_text ?>
                                                </div>						
                                        </div>					
                                </div>                        
                                <div class="select-travel grid-gutter-small mb-10">						
                                        <!--
                                        <div class="row zz-booker-nav">							
                                                <div class="col-sm-12 col-xs-12 mb5">								
                                                        <div class="text-center bookings-buttons fadeIn animated huge delay20 zz-booker-tab flipInX">									
                                                                <ul class="nav nav-pills">										
                                                                        										
                                                                        <li>											
                                                                                <a class="zz-booker-tab-btn ws-normal" href="#bookingManageTab" data-toggle="tab" aria-label="Check-in / Manage booking">												
                                                                                        <h2 class="zz-booker-tab-btn-head" data-bind="i18n-text: { key: 'Label-REZ-LOGIN-99'}">إدارة حجز سابق</h2>										
                                                                                </a> 
                                                                        </li>										
                                                                        <li>											
                                                                                <a class="zz-booker-tab-btn ws-normal" href="#bookerFind" data-toggle="tab" aria-label="Flight status">												
                                                                                        <h2 class="zz-booker-tab-btn-head" data-bind="i18n-text: { key: 'Label-KV-24'}">البحث عن حملة</h2>										
                                                                                </a>										
                                                                        </li>
                                                                        										
                                                                        <li class="active">
                                                                                <a class="zz-booker-tab-btn ws-normal active" data-toggle="tab" href="#omraAvailabilityTab" data-bind="click: focusOnFromInput" aria-label="Book a flight">												
                                                                                        <h1 class="zz-booker-tab-btn-head" data-bind="i18n-text: { key: 'Label-OB-64'}">العمرة والزيارة</h1>										
                                                                                </a>
                                                                        </li>									

                                                                        <li>
                                                                                <a class="zz-booker-tab-btn ws-normal active" data-toggle="tab" href="#bookerAvailabilityTab" data-bind="click: focusOnFromInput" aria-label="Book a flight">												
                                                                                        <h1 class="zz-booker-tab-btn-head" data-bind="i18n-text: { key: 'Label-OB-64'}">حجز تذاكر الباص</h1>										
                                                                                </a>
                                                                        </li>									

                                                                </ul>								
                                                        </div>							
                                                </div>						
                                        </div>-->						
                                        <div class="zz-tab-content clearfix">							
                                                <div id="omraAvailabilityTab" class="tab-pane noborder fade in active">								
                                                        <form id="mySearchOmraForm" action="i.php" method="POST">
                                                        <div>
                                                                <input type="hidden" name="depart_period" id="depart_period" value="now">
                                                                <input type="hidden" name="omtype" id="omtype" value="omra">
                                                                <input type="hidden" name="omsakan" id="omsakan" value="1">
                                                                <input type="hidden" name="cn" id="cn" value="Booker">
                                                                <input type="hidden" name="mt" id="mt" value="omra_ziara_period">
                                                                
                                                                <div class="row zz-booker general-booker">
                                                                        <div class="col-xs-12 booker-menu-wrapper">		
                                                                                <div class="booker-menu">			
                                                                                        <a id="option_both" role="button" tabindex="0" class="white mini-booker-link booker-type-link" onClick="changeOmraType('both')">عمرة وزيارة</a>			
                                                                                        <a id="option_omra" role="button" tabindex="0" class="white mini-booker-link booker-type-link active"        onClick="changeOmraType('omra')">عمرة فقط</a>		 		
                                                                                        <a id="option_ziara" role="button" tabindex="0" class="white mini-booker-link booker-type-link"        onClick="changeOmraType('ziara')">زيارة فقط</a>
                                                                                        		
                                                                                        <a id="option_omra_sakan" role="button" tabindex="0" class="white mini-booker-link award-link pull-right-sm checked" onClick="toggleOmraSakan()">رحلة مع سكن</a>				
                                                                                        <select class="period_travel" name="period">
                                                                                                <option value="2">لمدة يومين</option>
                                                                                                <option value="3" selected>لمدة 3 أيام</option>
                                                                                                <option value="4">لمدة 4 أيام</option>
                                                                                                <option value="5">لمدة 5 أيام</option>
                                                                                                <option value="6">لمدة 6 أيام</option>
                                                                                                <option value="99">تزيد عن 6 أيام</option>
                                                                                        </select>
                                                                                        <select class="nb_travelers" name="nb_travelers">
                                                                                                <option value="1" selected>مسافر واحد</option>
                                                                                                <option value="2">مسافران اثنان</option>
                                                                                                <option value="3">ثلاثة مسافرين</option>
                                                                                                <option value="4">4 مسافرين</option>
                                                                                                <option value="5">5 مسافرين</option>
                                                                                                <option value="6">6 مسافرين</option>
                                                                                                <option value="7">7 مسافرين</option>
                                                                                        </select>
                                                                                </div>	
                                                                        </div>

                                                                        <div class="col-xs-12 booker-content" id="singleCityContainer">		
                                                                                <div class="row">			
                                                                                        <div class="col-xs-12">				
                                                                                                <div class="row">					
                                                                                                <?php
                                                                                                        $cityBoth = array();
                                                                                                        $cityBoth[Travel::$CITY_MAKKA_FIRST] = "مكة أولا ثم المدينة";
                                                                                                        $cityBoth[Travel::$CITY_MADINA_FIRST] = "المدينة أولا ثم مكة";
                                                                                                        if($use_city_pictures)
                                                                                                        {
                                                                                                                $cityBothPic = array();
                                                                                                                $cityBothPic[Travel::$CITY_MAKKA_FIRST] = "cities/mak.png";
                                                                                                                $cityBothPic[Travel::$CITY_MADINA_FIRST] = "cities/mad.png";
                                                                                                        }
                                                                                                        else $cityBothPic = false;
                                                                                                ?>

                                                                                                        <div class="col-xs-12 col-sm-12 animated flipInX delay19" id="omra_originSelector" data-scroll-parent="">						
                                                                                                                        <div class="port-select-wrapper active" data-bind="css:{ 'active': selectedElem }, click: focusToInput">	
                                                                                                                        <!-- onchange="showValue(this)" -->
                                                                                                                        <?php echo AfwInputHelper::picture_dropdown($cityList, "departure_city_id", $selected=array(301), 
                                                                                                                                                "departure_city_id",$use_city_pictures, $dd_width="", $dd_css="home_filter_dd"); ?>
                                                                                                                        </div>
                                                                                                                					
                                                                                                        </div>					
                                                                                                        <div class="destination_selector col-xs-12 col-sm-12 animated flipInX delay19 hide" id="bothDestinationSelector" data-scroll-parent="">						
                                                                                                                        <div class="port-select-wrapper" data-bind="css:{ 'active': selectedElem }, click: focusToInput">	
                                                                                                                        <?php echo AfwInputHelper::picture_dropdown($cityBoth, "omra_city_first", $selected=array(10101), 
                                                                                                                                                "omra_city_first", $cityBothPic, $dd_width="", $dd_css="home_filter_dd"); ?>
                                                                                                                        </div>
                                                                                                        </div>
                                                                                                        <div class="destination_selector col-xs-12 col-sm-12 animated flipInX delay19" id="omraDestinationSelector" data-scroll-parent="">						
                                                                                                                <div class="dd ddcommon borderRadius" id="destination_city_id_msdd" tabindex="0" style="width: 100%;">
                                                                                                                        <div class="ddTitle borderRadiusTp">
                                                                                                                                <span class="ddTitleText " id="destination_city_id_title">
                                                                                                                                        <!-- <img src="cities/mak.png" class="fnone"> -->
                                                                                                                                        <span class="ddlabel">مكة المكرمة
                                                                                                                                        </span>
                                                                                                                                        <span class="description" style="display: none;">
                                                                                                                                        </span>
                                                                                                                                </span>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="destination_selector col-xs-12 col-sm-12 animated flipInX delay19 hide" id="ziaraDestinationSelector" data-scroll-parent="">						
                                                                                                                <div class="dd ddcommon borderRadius" id="destination_city_id_msdd" tabindex="0" style="width: 100%;">
                                                                                                                        <div class="ddTitle borderRadiusTp">
                                                                                                                                <span class="ddTitleText " id="destination_city_id_title">
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
                                                                                                <div class="animated flipInX delay23 submit-booker submit-booker-asssoon">					
                                                                                                        <a role="button" name="submitSearchOmraNow" tabindex="0" class="btn-input-red lh_booker_submit zz-booker-submit zz-booker-asssoon" id="submitSearchOmraNow" aria-label="Search bus travel">
                                                                                                        أقرب رحلة
                                                                                                        </a>				
                                                                                                </div>
                                                                                                <div class="animated flipInX delay23 submit-booker submit-booker-nextweek">					
                                                                                                        <a role="button" name="submitSearchOmraNextWeek" tabindex="0" class="btn-input-blue lh_booker_submit zz-booker-submit zz-booker-nextweek" id="submitSearchOmraNextWeek" aria-label="Search bus travel">
                                                                                                        رحلات الأسبوع القادم
                                                                                                        </a>				
                                                                                                </div>
                                                                                                <div class="animated flipInX delay23 submit-booker submit-booker-after2w">					
                                                                                                        <a role="button" name="submitSearchOmraAfter2W" tabindex="0" class="btn-input-red lh_booker_submit zz-booker-submit zz-booker-after2w" id="submitSearchOmraAfter2W" aria-label="Search bus travel">
                                                                                                        رحلات بعد أسبوعين
                                                                                                        </a>				
                                                                                                </div>
                                                                                                <div class="animated flipInX delay23 submit-booker submit-booker-nextmonth">					
                                                                                                        <a role="button" name="submitSearchOmraNextMonth" tabindex="0" class="btn-input-red lh_booker_submit zz-booker-submit zz-booker-nextmonth" id="submitSearchOmraNextMonth" aria-label="Search bus travel">
                                                                                                        رحلات الشهر القادم
                                                                                                        </a>				
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
                                                <div id="bookerAvailabilityTab" class="tab-pane noborder fade">								
                                                        <form id="mySearchBookingForm" action="search_booking.php" method="POST">
                                                        <div>
                                                                <input type="hidden" name="btype" id="btype" value="round">
                                                                <input type="hidden" name="bsakan" id="bsakan" value="0">
                                                                
                                                                <div class="row zz-booker general-booker">
                                                                        <div class="col-xs-12 booker-menu-wrapper">		
                                                                                <div class="booker-menu">			
                                                                                        <a id="option_round" role="button" tabindex="0" class="white mini-booker-link booker-type-link active" onClick="changeBookerType('round')">ذهاب وعودة</a>			
                                                                                        <a id="option_oneway" role="button" tabindex="0" class="white mini-booker-link booker-type-link"        onClick="changeBookerType('oneway')">ذهاب فقط</a>		 		
                                                                                        <a id="option_multicity" role="button" tabindex="0" class="white mini-booker-link booker-type-link"        onClick="changeBookerType('multicity')">أكثر من مدينة</a>
                                                                                        		
                                                                                        <a id="option_sakan" role="button" tabindex="0" class="white mini-booker-link award-link pull-right-sm" onClick="toggleSakan()">رحلة مع سكن</a>				
                                                                                </div>	
                                                                        </div>

                                                                        <div class="col-xs-12 booker-content" id="singleCityContainer">		
                                                                                <div class="row">			
                                                                                        <div class="col-xs-12">				
                                                                                                <div class="row">					
                                                                                                        <div class="col-xs-6 col-sm-6 animated flipInX delay19" id="originSelector" data-scroll-parent="">						
                                                                                                                        <div class="port-select-wrapper active" data-bind="css:{ 'active': selectedElem }, click: focusToInput">	
                                                                                                                               <select style="width:250px" class="from_city_select" name="from_city" id="from_city" onchange="showValue(this)">
                                                                                                                                      <option value="makkah" data-image="cities/mak.png">مكة المكرمة</option>
                                                                                                                                      <option value="madinah" data-image="cities/mad.png">المدينة</option>
                                                                                                                                      <option value="abha" data-image="cities/abh.png" name="abha">أبها</option>
                                                                                                                                      <option value="riyadh" data-image="cities/ruh.png" name="ruh" selected>الرياض</option>
                                                                                                                                </select> 
                                                                                                                        </div>
                                                                                                                					
                                                                                                        </div>					
                                                                                                        <div class="col-xs-6 col-sm-6 animated flipInX delay19" id="destinationSelector" data-scroll-parent="">						
                                                                                                                        <div class="port-select-wrapper" data-bind="css:{ 'active': selectedElem }, click: focusToInput">	
                                                                                                                               <select style="width:250px" class="to_city_select" name="to_city" id="to_city" onchange="showValue(this)">
                                                                                                                                      <option value="makkah" data-image="cities/mak.png" selected>مكة المكرمة</option>
                                                                                                                                      <option value="madinah" data-image="cities/mad.png">المدينة</option>
                                                                                                                                      <option value="abha" data-image="cities/abh.png" name="abha">أبها</option>
                                                                                                                                      <option value="riyadh" data-image="cities/ruh.png" name="ruh">الرياض</option>
                                                                                                                                </select>
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
                                                                                                <div class="animated flipInX delay23">					
                                                                                                        <a role="button" name="submitSearchBooking" tabindex="0" class="btn-input-red lh114 zz-booker-submit" id="submitSearchBooking" aria-label="Search bus travel">
                                                                                                        بحث
                                                                                                        </a>				
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
                                                <div id="bookingManageTab" class="tab-pane noborder fade" data-bind="jqValidation: validationContext">								
                                                        <div class="row zz-booker mt-15">									
                                                                <div class="col-xs-12 col-sm-5">										
                                                                        <div class="form-group animated delay21 flipInX">											
                                                                                <label class="sr-only booker-text-label" for="ticketNo" data-bind="i18n-text: { key: 'Label-REZ-LOGIN-05'}">رقم التذكرة أو رقم الحجز
                                                                                </label>											
                                                                                <input type="text" id="ticketNo" name="ticketNo" maxlength="13" class="form-control zz-booker-input zz-text-input input-huge text-uppercase" autocomplete="off" autocorrect="off" spellcheck="false" placeholder="رقم التذكرة أو رقم الحجز">										
                                                                        </div>									
                                                                </div>									
                                                                <div class="col-xs-12 col-sm-5">										
                                                                        <div class="form-group animated delay21 flipInX">											
                                                                                <label class="sr-only booker-text-label" for="mobile" data-bind="i18n-text: { key: 'Label-REZ-LOGIN-03'}">رقم الجوال
                                                                                </label>											
                                                                                <input type="text" name="mobileNumber" id="mobileNumber" maxlength="49" class="form-control zz-booker-input zz-text-input input-huge text-uppercase" autocomplete="off" autocorrect="off" spellcheck="false" placeholder="رقم الجوال">										
                                                                        </div>									
                                                                </div>									
                                                                <div class="col-xs-12 col-sm-2">										
                                                                        <div class="form-group animated delay21 flipInX">											
                                                                                <a role="button" name="submit" tabindex="0" class="btn-input-red lh114 zz-booker-submit" data-bind="click: openManageBooking" aria-label="Manage booking / Check-in"> 
                                                                                        <i class="light-arrow-right"></i> 
                                                                                        <span>إدارة الحجز </span>											
                                                                                </a>										
                                                                        </div>									
                                                                </div>									
                                                        </div>
                                                </div>        							
                                                <div id="bookerFind" class="tab-pane noborder fade" data-bind="jqValidation: validationContext">								
                                                        <div class="row zz-booker mt-15">									
                                                                <div class="col-xs-12 col-sm-5">										
                                                                        <div class="form-group animated delay21 flipInX">											
                                                                                <label class="sr-only booker-text-label" for="bookerName" data-bind="i18n-text: { key: 'Label-REZ-LOGIN-05'}">جزء من اسم الحملة
                                                                                </label>											
                                                                                <input type="text" id="bookerName" name="bookerName" maxlength="13" class="form-control zz-booker-input zz-text-input input-huge text-uppercase" autocomplete="off" autocorrect="off" spellcheck="false" placeholder="جزء من اسم الحملة">										
                                                                        </div>									
                                                                </div>									
                                                                									
                                                                <div class="col-xs-12 col-sm-2">										
                                                                        <div class="form-group animated delay21 flipInX">											
                                                                                <a role="button" name="submit" tabindex="0" class="btn-input-red lh114 zz-booker-submit" data-bind="click: openManageBooking" aria-label="Manage booking / Check-in"> 
                                                                                        <i class="light-arrow-right"></i> 
                                                                                        <span>البحث عن الحملة </span>											
                                                                                </a>										
                                                                        </div>									
                                                                </div>									
                                                        </div>
                                                </div>						
                                        </div>						
                                        <!-- for later @rafik
                                        <div id="additionalServices">							
                                                <div class="row">								
                                                        <div class="col-xs-12 col-sm-12 additional-badge-countainer">									
                                                                <div class="col-xs-4 col-sm-4 text-center additional-travelInsurance pl-5-mbl pr-5-mbl">										
                                                                        <a href="#">
                                                                                <span class="additional-badge">
                                                                                        <i class="fa fa-bus"></i>
                                                                                </span>											
                                                                                <br>										
                                                                                <div class="well well-dark well-mini fs-12">												
                                                                                        <span>حجز باص كامل
                                                                                        </span>												
                                                                                        <i class="fa fa-share ml-5" aria-hidden="true"></i>											
                                                                                </div></a>									
                                                                </div>									
                                                                <div class="col-xs-4 col-sm-4 text-center additional-rentACar pl-5-mbl pr-5-mbl">										
                                                                        <a href="#">
                                                                                <span class="additional-badge">
                                                                                        <i class="icon zz-icon-transport" aria-hidden="true"></i>
                                                                                </span>
                                                                                <br>										
                                                                                <div class="well well-dark well-mini fs-12">												
                                                                                        <span">تأجير سيارة
                                                                                        </span>												
                                                                                        <i class="fa fa-share ml-5" aria-hidden="true"></i>											
                                                                                </div></a>									
                                                                </div>									
                                                                <div class="col-xs-4 col-sm-4 text-center additional-hotel pl-5-mbl pr-5-mbl hidden-sm">										
                                                                        <a href="#">
                                                                                <span class="additional-badge">
                                                                                        <i class="icon zz-icon-hotels" aria-hidden="true"></i>
                                                                                </span>
                                                                                <br>										
                                                                                <div class="well well-dark well-mini fs-12">												
                                                                                        <span">حجز غرف بالجملة
                                                                                        </span>												
                                                                                        <i class="fa fa-share ml-5" aria-hidden="true"></i>											
                                                                                </div></a>									
                                                                </div>									
                                                                <div class="col-xs-4 col-sm-4 text-center additional-hotel pl-5-mbl pr-5-mbl visible-xs visible-sm">										
                                                                        <a href="#">
                                                                                <span class="additional-badge">
                                                                                        <i class="icon zz-icon-hotels" aria-hidden="true"></i>
                                                                                </span>
                                                                                <br>										
                                                                                <div class="well well-dark well-mini fs-12">												
                                                                                        <span>خدمات أخرى
                                                                                        </span>												
                                                                                        <i class="fa fa-share ml-5" aria-hidden="true"></i>											
                                                                                </div></a>									
                                                                </div>								
                                                        </div>							
                                                </div>						
                                        </div>						
                                        -->
                                </div>
                        </div>
                </div>
        </div>
</div>

<script>
// $("#departure_city_id").msDropdown({roundedBorder:false, visibleRows:4, rowHeight:90});
// $("#departure_city_id").data("dd");
/*
$("#omra_city_first").msDropdown({roundedBorder:false, visibleRows:4, rowHeight:90});
$("#omra_city_first").data("dd");


$("#from_city").msDropdown({roundedBorder:false, visibleRows:4, rowHeight:90});
$("#from_city").data("dd");

$("#to_city").msDropdown({roundedBorder:false, visibleRows:4, rowHeight:90});
$("#to_city").data("dd");*/

$(document).ready(function(){
                        $("#submitSearchBooking").click(function(){        
                                $("#mySearchBookingForm").submit(); // Submit the form
                        });

                        $("#submitSearchOmraNow").click(function(){        
                                $("#depart_period").val("now");
                                $("#mySearchOmraForm").submit(); // Submit the form
                        });

                        $("#submitSearchOmraNextWeek").click(function(){        
                                $("#depart_period").val("nextweek");
                                $("#mySearchOmraForm").submit(); // Submit the form
                        });

                        $("#submitSearchOmraAfter2W").click(function(){        
                                $("#depart_period").val("after2w");
                                $("#mySearchOmraForm").submit(); // Submit the form
                        });

                        $("#submitSearchOmraNextMonth").click(function(){        
                                $("#depart_period").val("nextmonth");
                                $("#mySearchOmraForm").submit(); // Submit the form
                        });
                });

</script>