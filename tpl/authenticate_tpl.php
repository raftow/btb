<?php

/**
 * @var string $lang
 * @var string $birth_date
 * @var string $mobile
 * @var string $customer_origin
 * @var string $birth_gdate
 * @var string $birth_date
 * @var string $limit_birth_gdate
 * @var string $limit_birth_date
 * @var array $data
 */

$calendar_tr = AfwEditMotor::calendar_translations($lang, '', '');

?>
<div class="in-group-customer_data cssgroup_pct_100">
    <div id="group_customer_data" class="" aria-expanded="true">
        <!-- fg-mobile -->
        <div id="fg-mobile" class="attrib-mobile form-group width_pct_100 ">
            <label for="mobile" class="hzm_label hzm_data_mobile label_required">الجوال :
            </label>
            <input placeholder="" type="text" tabindex="0" class="form-control" name="mobile" id="mobile" dir="rtl" value="<?php echo $mobile ?>" size="16" maxlength="16" required="true" aria-invalid="false">
            <?php echo AfwInputHelper::inputErrorsInRequest("mobile", $data); ?>
        </div>
        <!-- fg-mobile -->

        <!-- fg-birth_date -->
        <?php
        if (!$date_system) $date_system = "greg";

        if ($date_system == "greg") {
            $hide_hijri = "hide";
            $hide_greg = "";

            $required_hijri = "";
            $required_greg = "required";
        } else {
            $hide_hijri = "";
            $hide_greg = "hide";

            $required_hijri = "required";
            $required_greg = "";
        }
        ?>
        <input type='hidden' id='date_system' name='date_system' value='<?php echo $date_system ?>'>
        <div id='bloc_hijri' class="<?php echo $hide_hijri ?>">
            <label for="birth_gdate" class="hzm_label hzm_data_mobile label_required">تاريخ الولادة (هـ)
                <span id='switch_to_greg' class='sysswitch switch_to_greg'>ميلادي </span>

            </label>
            <input type="text" class="form-control" id="birth_date" name="birth_date" value="<?php echo $birth_date ?>" autocomplete="off" <?php echo $required_hijri ?>>
            <script type="text/javascript">
                $('#birth_date').calendarsPicker({
                    calendar: $.calendars.instance('UmmAlQura'),
                    /*monthsToShow: [1, 1], 
                    showOtherMonths: true,*/
                    maxDate: -5000,
                    monthNames: <?php echo $calendar_tr ?>,
                    onSelect:

                        function(date) {
                            if (date[0] > '<?php echo $limit_birth_date ?>') {
                                atalert('تنبيه', 'لقد اخترت تاريخا غير صالح ' + date[0] + ' الرجاء اختيار تاريخ آخر');
                                $('#birth_date').val("");
                            }
                        }
                });
            </script>
        </div>
        <?php

        ?>
        <div id='bloc_greg' class="<?php echo $hide_greg ?>">
            <label for="birth_date" class="hzm_label hzm_data_mobile label_required">تاريخ الولادة (م)
                <span id='switch_to_hijri' class='sysswitch switch_to_hijri'>هجري </span>
            </label>
            <input type="text" class="form-control" id="birth_gdate" name="birth_gdate" class="hasCalendarsPicker" value="<?php echo $birth_gdate ?>" autocomplete="off" <?php echo $required_greg ?>>
            <script>
                $(function() {
                    $("#birth_gdate").datepicker({
                        showAnim: "fold",
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        changeYear: true,
                        maxDate: -5000,
                        monthNames: <?php echo $calendar_tr ?>,
                    });
                });
            </script>
        </div>
        <?php

        ?>
        <!-- fg-birth_date -->
        <script>
            $(document).ready(function() {

                $("#birth_gdate").change(function() {
                    $("#attr_error_all").addClass("hide");
                    $("#birth_date").val("");
                });

                $("#birth_date").change(function() {
                    $("#attr_error_all").addClass("hide");
                    $("#birth_gdate").val("");
                });

                $("#switch_to_greg").click(function() {
                    $("#bloc_hijri").addClass("hide");
                    $("#bloc_greg").removeClass("hide");
                    // $("#birth_date").val("");
                    $("#date_system").val("greg");
                    $("#birth_date").prop('required', false);
                    $("#birth_gdate").prop('required', true);
                    $("#birth_gdate").focus();
                });

                $("#switch_to_hijri").click(function() {
                    $("#bloc_hijri").removeClass("hide");
                    $("#bloc_greg").addClass("hide");
                    // $("#birth_gdate").val("");
                    $("#date_system").val("hijri");
                    $("#birth_gdate").prop('required', false);
                    $("#birth_date").prop('required', true);
                    $("#birth_date").focus();
                });
            });
        </script>