<div class='conditions_book'>
<?php
      $busSACompany = WorkBranch::loadById(1); 
?>

<p class='front_title'>الشروط الخاصة بمؤسسة باص السعودية</p>
<div class="front_conditions hzm_data hzm_data_conditions" style="">
   <?php echo $busSACompany->showAttribute("conditions"); ?>
</div>
<br>
<?php
      $travelCompany = $travelObj->hetCompany(); 
?>
<p class='front_title'>الشروط الخاصة بمؤسسة <?php echo $travelCompany->getWideDisplay($lang) ?></p>
<div class="front_conditions hzm_data hzm_data_conditions" style="">
   <?php echo $travelCompany->showAttribute("conditions"); ?>
</div>



</div>