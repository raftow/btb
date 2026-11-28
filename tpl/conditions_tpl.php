<?php

/**
 * @var Travel $travelObj
 * @var string $lang
 */
?>
<div class='conditions_book'>
      <?php
      $busSACompany = WorkBranch::loadById(1);
      // die("got busSACompany = " . var_export($busSACompany, true));
      ?>


      <p class='front_title'>الشروط الخاصة بمؤسسة بساط</p>
      <div class="front_conditions hzm_data hzm_data_conditions">
            <?php echo $busSACompany->showAttribute("conditions"); ?>
      </div>
      <br>
      <?php
      // die("conditions showed from got busSACompany = " . var_export($busSACompany, true));
      $travelCompany = $travelObj->het("work_branch_id");
      // die("got travelCompany = " . var_export($travelCompany, true));
      ?>
      <p class='front_title'>الشروط الخاصة بمؤسسة <?php echo $travelCompany->getWideDisplay($lang) ?></p>
      <?php
      // die("getWideDisplay showed from got travelCompany = " . var_export($travelCompany, true));
      ?>
      <div class="front_conditions hzm_data hzm_data_conditions">
            <?php
            echo $travelCompany->showAttribute("conditions");

            // die("conditions showAttribute showed from got travelCompany = " . var_export($travelCompany, true));
            ?>
      </div>



</div>