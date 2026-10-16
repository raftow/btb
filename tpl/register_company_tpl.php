<div class="booker_bg_pic">    
<div class="content_form_bg">
<div class="content_big_title registration">  تسجيل مكاتب وشركات الرحلات</div>
<div class="content_form">
<form id="booking_form" method="POST">
<?php


?>
<input type="hidden" name="cn" id="cn" value="content">
<input type="hidden" name="mt" id="mt" value="submit_register">

<div class="in-group-customer_data cssgroup_pct_100">                                          
        <?php
                echo AfwInputHelper::inputErrorsInRequest("all", $data);
                if($source=="customer")
                {
        ?>
        <div class="">
                <h5 class="greentitle"><i></i>بياناتك <?php echo $customer_origin ?></h5>
        </div>        
        <div id="group_customer_data" class="" aria-expanded="true" style="">
                <div id="fg-warn" class="attrib-warn form-group width_pct_100 ">
                        نشكرك على تعريفنا بمكاتب العمرة والزيارة الذين تعرفهم أو الذين هم قريبون من مسكنك وهذا يمنحك إلى غاية 100 نقطة عميل نشط على كل مكتب يسجل معنا بسببك. سجل أدناه اسمك الكامل ورقم جوالك لنسجل لك هذه النقاط والتي تستفيد منها لاحقا عبر هذا التطبيق في الحصول على تخفيضات أو عروض خاصة
                </div>
                <!-- fg-your_full_name -->
                <div id="fg-your_full_name" class="attrib-your_full_name form-group width_pct_100 ">
                        <label for="your_full_name" class="hzm_label hzm_data_your_full_name">اسمك الكامل  (إختياري)
                        </label>        				
                        <input placeholder="" type="text" tabindex="0" class="form-control valid" name="your_full_name" id="your_full_name" dir="rtl" value="<?php echo $your_full_name ?>" size="24" maxlength="32" onchange="" aria-invalid="false">	
                        <?php echo AfwInputHelper::inputErrorsInRequest("your_full_name", $data); ?>
                </div>
                <!-- fg-your_full_name -->
                <!-- fg-customer_mobile -->
                <div id="fg-customer_mobile" class="attrib-customer_mobile form-group width_pct_100 ">
                        <label for="customer_mobile" class="hzm_label hzm_data_customer_mobile">رقم جوالك (إختياري ولكن لنسجل لك نقاطك)
                        </label>                    				
                        <input placeholder="" type="text" tabindex="0" class="form-control" name="customer_mobile" id="customer_mobile" dir="rtl" value="<?php echo $customer_mobile ?>" size="16" maxlength="16" aria-invalid="false" <?php echo $customer_mobile_readonly ?>>	
                        <?php echo AfwInputHelper::inputErrorsInRequest("customer_mobile", $data); ?>
                </div>
                <!-- fg-customer_mobile -->
                <!-- fg-customer_idn -->
                <div id="fg-customer_idn" class="attrib-customer_idn form-group width_pct_100 ">
                        <label for="customer_idn" class="hzm_label hzm_data_customer_idn">رقم الهوية (إختياري)
                        </label>                    				
                        <input placeholder="" type="text" tabindex="0" class="form-control" name="customer_idn" id="customer_idn" dir="rtl" value="<?php echo $customer_idn ?>" size="16" maxlength="16" aria-invalid="false" <?php echo $customer_idn_readonly ?>>	
                        <?php echo AfwInputHelper::inputErrorsInRequest("customer_idn", $data); ?>
                </div>
                <!-- fg-customer_idn -->
        </div>   
        <?php
                }
        ?>     
        <div class="">
                <h5 class="greentitle"><i></i>بيانات شركة/مكتب رحلات العمرة والزيارة <?php echo $customer_origin ?></h5>
        </div>        
        <div id="group_company_data" class="" aria-expanded="true" style="">        
                <div id="fg-warn" class="attrib-warn form-group width_pct_100 ">
                        رجاء ادخال بيانات مكتملة وصحيحة حتى يتم التسجيل والتواصل معكم. سيتم آليا اهمال أي طلب يحتوي على بيانات غير صحيحة
                </div>
                <!-- fg-company_name -->
                <div id="fg-company_name" class="attrib-company_name form-group width_pct_100 ">
                        <label for="company_name" class="hzm_label hzm_data_company_name label_required">مسمى الشركة/المكتب :  
                        </label>        				
                        <input placeholder="" type="text" tabindex="0" class="form-control valid" name="company_name" id="company_name" dir="rtl" value="<?php echo $company_name ?>" size="24" maxlength="32" onchange="" required="true" aria-invalid="false">	
                        <?php echo AfwInputHelper::inputErrorsInRequest("company_name", $data); ?>
                </div>
                <!-- fg-company_name -->

                <!-- fg-city_id -->
                <div id="fg-city_id" class="attrib-city_id form-group width_pct_100 ">
                        <label for="city_id" class="hzm_label hzm_data_city_id label_required">المدينة</label>                  
                        <?php echo AfwInputHelper::picture_dropdown($cityList, "city_id", $selected=array($city_id), 
                                                                        "city_id",
                                                                        $data_images=false, // no drop dwon pictures
                                                                        $select_width=0, // means auto
                                                                        $select_css="form-control",
                                                                        $sort_order = "", 
                                                                        $empty_option = false,  // no empty option (so required)
                                                                        $lang
                                                                        ); ?>        
                </div>
                <!-- fg-city_id -->

                

                <!-- fg-mobile -->
                <div id="fg-mobile" class="attrib-mobile form-group width_pct_100 ">
                        <label for="mobile" class="hzm_label hzm_data_mobile label_required">رقم الجوال للتواصل مع المكتب
                        </label>                    				
                        <input placeholder="" type="text" tabindex="0" class="form-control" name="mobile" id="mobile" dir="rtl" value="<?php echo $mobile ?>" size="16" maxlength="16" required="true" aria-invalid="false" <?php echo $mobile_readonly ?>>	
                        <?php echo AfwInputHelper::inputErrorsInRequest("mobile", $data); ?>
                </div>
                <!-- fg-mobile -->
                
                <!-- fg-web_site -->
                <div id="fg-web_site" class="attrib-web_site form-group width_pct_100 ">
                        <label for="web_site" class="hzm_label hzm_data_web_site">الموقع الالكتروني على الانترنت (إختياري)
                        </label>                    				
                        <input placeholder="" type="text" tabindex="0" class="form-control" name="web_site" id="web_site" dir="rtl" value="<?php echo $web_site ?>" size="255" maxlength="255" required="true" aria-invalid="false" <?php echo $web_site_readonly ?>>	
                        <?php echo AfwInputHelper::inputErrorsInRequest("web_site", $data); ?>
                </div>
                <!-- fg-web_site --> 

                <!-- fg-email -->
                <div id="fg-email" class="attrib-email form-group width_pct_100 ">
                        <label for="email" class="hzm_label hzm_data_email">البريد الالكتروني (إختياري)  
                        </label>        				
                        <input placeholder="" type="text" tabindex="0" class="form-control" name="email" id="email" dir="rtl" value="<?php echo $email ?>" size="255" maxlength="255" onchange="">	
                        <?php echo AfwInputHelper::inputErrorsInRequest("email", $data); ?>
                </div>
                <!-- fg-email -->

                <!-- fg-trade_idn -->
                <div id="fg-trade_idn" class="attrib-trade_idn form-group width_pct_100 ">
                        <label for="trade_idn" class="hzm_label hzm_data_trade_idn">رقم السجل التجاري :  (إختياري)
                        </label>                    				
                        <input placeholder="" type="text" tabindex="0" class="form-control" name="trade_idn" id="trade_idn" dir="ltr" value="<?php echo $trade_idn ?>" size="255" maxlength="255" required="true" aria-invalid="false" <?php echo $trade_idn_readonly ?>>	
                        <?php echo AfwInputHelper::inputErrorsInRequest("trade_idn", $data); ?>
                </div>
                <!-- fg-trade_idn -->

                
        </div>
        <input type="submit" name="save" id="save_form" class="bluebtn wizardbtn fright" value="&nbsp; تسجيل &nbsp;"       style="margin-right: 5px;" >
</div>
</form>
</div>
<div class="register_pic">
</div>        
</div>
</div>