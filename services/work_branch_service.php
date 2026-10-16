<?php
class WorkBranchService {

    public static function getTravelsByStatusAndRemainDays($companyObj, $status_id, $remain_days, $other_where = "1", $travel_template_id=0)
    {
            $travel_date_limit = AfwDateHelper::shiftHijriDate("", $remain_days);
            $travelList = $companyObj->relTravelList()
                    ->resetWhere("($travel_template_id=0 or travel_template_id=$travel_template_id) 
                                    and ($status_id=0 or travel_status_id = '$status_id') 
                                    and travel_date <= '$travel_date_limit' 
                                    and $other_where")
                    ->orderBy("travel_gdate asc")
                    ->getList();
                    
            return $travelList;
    }


}