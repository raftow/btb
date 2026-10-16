<?php
        $paymodeList = PaymentMode::loadAll();
        $nb_paymodes = count($paymodeList);
?>
<div class='hzm_travel_bloc travel_trips<?php echo $trips ?> hzm_travel_top_bloc'> 
        <input type='hidden' name='amount_to_pay' id='amount_to_pay' value='<?php echo $total_amount ?>'> 
        
        <div class='btb_amount_to_pay hzm_ul_container'>                   
                <?php echo AfwInputHelper::inputErrorsInRequest("amount_to_pay", $data); ?>
                <div id='total_amount_to_pay' class='amount_to_pay total_amount selected' alt='<?php echo $total_amount ?>'>
                أدفع من الآن كامل المبلغ <?php echo $total_amount ?> ريال واكسب <?php echo $points ?> نقطة عميل وفي
                </div>
<?php 
if((abs($amount_part - $total_amount) > 40.0) and ($amount_part > 40.0))
{                
?>            

                <div id='part_amount_to_pay' class='amount_to_pay amount_part' alt='<?php echo $amount_part ?>'>
                        أدفع الآن <?php echo $amount_part ?> ريال فقط والباقي يوم الرحلة كاش
                </div>
<?php 
}
?>            

        </div>

        <input type='hidden' name='payment_mode_id' id='payment_mode_id' value='<?php echo $payment_mode_id ?>'> 
        
        
        <div class='btb_paymode_selection hzm_ul_container paymode_selection<?php echo $nb_paymodes ?>'>                   
                <?php echo AfwInputHelper::inputErrorsInRequest("payment_mode_id", $data); ?>
                <?php 
                foreach($paymodeList as $paymodeId => $paymodeItem)
                { 
                        if($paymodeId == $payment_mode_id) $paymode_selected = "selected";
                        else $paymode_selected = "";
                        $paymodeCode = $paymodeItem->lookup_code;               
                ?>            
                        <div id='paymode_<?php echo $paymodeCode ?>' class='btb_paymode btb_paymode_<?php echo $paymodeCode." ".$paymode_selected ?>' alt='<?php echo $paymodeId ?>'>
                        </div>
                <?php
                }
                ?>
        </div>           
</div>