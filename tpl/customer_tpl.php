<?php

/**
 * @var string $lang
 * @var string $customer_origin
 * @var string $mobile
 * @var string $idn_readonly
 * @var string $mobile_readonly
 * @var string $idn
 * 
 * 
 * @var array $cityList
 * @var array $data
 * @var array $genderList
 * @var array $travelerTypeList
 * 
 * @var int $customer_gender_id
 * @var int $city_id
 * @var int $traveler_type_id
 */

?>
<div class="in-group-customer_data cssgroup_pct_100">

        <!-- بيانات العميل <?php echo $customer_origin ?> -->

        <div id="group_customer_data" class="" aria-expanded="true">
                <!-- fg-city_id -->
                <div id="fg-city_id" class="attrib-city_id form-group width_pct_100 ">
                        <label for="city_id" class="hzm_label hzm_data_city_id label_required">مدينة السكن : </label>
                        <?php echo AfwInputHelper::picture_dropdown(
                                $cityList,
                                "city_id",
                                $selected = array($city_id),
                                "city_id",
                                $data_images = false, // no drop dwon pictures
                                $select_width = 0, // means auto
                                $select_css = "form-control",
                                $sort_order = "",
                                $empty_option = false,  // no empty option (so required)
                                $lang
                        ); ?>
                </div>
                <!-- fg-city_id -->





                <!-- fg-customer_gender_id -->
                <div id="fg-customer_gender_id" class="attrib-customer_gender_id form-group width_pct_100 ">
                        <label for="customer_gender_id" class="hzm_label hzm_data_customer_gender_id label_required">الجنس :
                        </label>
                        <?php echo AfwInputHelper::picture_dropdown($genderList, "customer_gender_id", $selected = array($customer_gender_id), "customer_gender_id", false, 0, "form-control"); ?>
                </div>
                <!-- fg-customer_gender_id -->

                <!-- fg-first_name_ar -->
                <div id="fg-first_name_ar" class="attrib-first_name_ar form-group width_pct_100 ">
                        <label for="first_name_ar" class="hzm_label hzm_data_first_name_ar label_required">الاسم الأول بالعربية :
                        </label>
                        <input placeholder="" type="text" tabindex="0" class="form-control valid" name="first_name_ar" id="first_name_ar" dir="rtl" value="<?php echo $first_name_ar ?>" size="24" maxlength="32" onchange="" required="true" aria-invalid="false">
                        <?php echo AfwInputHelper::inputErrorsInRequest("first_name_ar", $data); ?>
                </div>
                <!-- fg-first_name_ar -->

                <!-- fg-last_name_ar -->
                <div id="fg-last_name_ar" class="attrib-last_name_ar form-group width_pct_100 ">
                        <label for="last_name_ar" class="hzm_label hzm_data_last_name_ar label_required">إسم العائلة بالعربية :
                        </label>
                        <input placeholder="" type="text" tabindex="0" class="form-control" name="last_name_ar" id="last_name_ar" dir="rtl" value="<?php echo $last_name_ar ?>" size="24" maxlength="32" onchange="" required="true">
                        <?php echo AfwInputHelper::inputErrorsInRequest("last_name_ar", $data); ?>
                </div>
                <!-- fg-last_name_ar -->

                <!-- fg-traveler_type_id -->
                <div id="fg-traveler_type_id" class="attrib-traveler_type_id form-group width_pct_100 ">
                        <label for="traveler_type_id" class="hzm_label hzm_data_traveler_type_id label_required">نوع المسافرين :
                        </label>
                        <?php echo AfwInputHelper::picture_dropdown(
                                $travelerTypeList,
                                "traveler_type_id",
                                $selected = array($traveler_type_id),
                                "traveler_type_id",
                                $data_images = false, // no drop dwon pictures
                                $select_width = 0, // means auto
                                $select_css = "form-control",
                                $sort_order = "",
                                $empty_option = true,  // empty option exist
                                $lang,
                                $required = true // but required
                        ); ?>
                </div>
                <!-- fg-traveler_type_id -->

                <!-- fg-ref_num -->
                <div id="fg-ref_num" class="attrib-ref_num form-group width_pct_100 ">
                        <label for="ref_num" class="hzm_label hzm_data_ref_num">رقم الهوية / الإقامة / جواز السفر
                        </label>
                        <input placeholder="" type="text" tabindex="0" class="form-control" name="ref_num" id="ref_num" dir="rtl" value="<?php echo $ref_num ?>" size="32" maxlength="32" aria-invalid="false">
                        <?php echo AfwInputHelper::inputErrorsInRequest("ref_num", $data); ?>
                </div>
                <!-- fg-ref_num -->
        </div>
</div>