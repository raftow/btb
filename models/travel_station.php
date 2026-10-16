<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table travel_station : travel_station - محطات التوقف 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class TravelStation extends BtbObject{

        public static $MY_ATABLE_ID=13767; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		travel_id => array(SHORTNAME => travel,  SEARCH => false,  QSEARCH => false,  SHOW => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => travel,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => false, ),

                road_station_id => array(SHORTNAME => station,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => FK,  ANSWER => road_station,  ANSMODULE => btb,  AUTOCOMPLETE => false,  
				RELATION => ManyToOne,  READONLY => true, ),
                                
                station_city_id => array('STEP' =>2, SHORTNAME => city,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,
				SIZE => 40,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,  
                                WHERE=>"avail='Y'",  
				RELATION => ManyToOne,  READONLY => true, ),                

		travel_station_name => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 48, MAXLENGTH => 48,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => true, ),
                
		arrival_date => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MANDATORY => true,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "MEDIUM_HIJRI", HIJRI_UNIT=>false,  READONLY => false, ),
                                
                arrival_time => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 8,  MAXLENGTH => 8,  REQUIRED => true,  UTF8 => false,  
				TYPE => "TIME",  READONLY => false, ),

		activities => array(SEARCH => false,  QSEARCH => false,  SHOW => false,  RETRIEVE => true,  
				EDIT => false,  QEDIT => false,  
				SIZE => 64,  MAXLENGTH => 192,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),
                
		departure_date => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MANDATORY => true,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "MEDIUM_HIJRI", HIJRI_UNIT=>false, READONLY => false, ),
                                
		departure_time => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 8,  MAXLENGTH => 8,  MANDATORY => true,  UTF8 => false,  
				TYPE => "TIME",  READONLY => false, ),


                
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                active => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("travel_station","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "travel_id, arrival_date, arrival_time";
                $this->horizontalTabs = true;
 
 
                $this->UNIQUE_KEY = array('travel_id','road_station_id','station_city_id');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->public_display = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
	}
        
        public static function loadById($id)
        {
           $obj = new TravelStation();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($travel_id, $road_station_id, $station_city_id, $travel_station_name, $create_obj_if_not_found=false)
        {
           $obj = new TravelStation();
           if((!$road_station_id) and (!$station_city_id)) throw new AfwRuntimeException("loadByMainIndex : one of road_station_id or station_city_id should be specified");
 
 
           $obj->select("travel_id",$travel_id);
           $obj->select("road_station_id",$road_station_id);
           $obj->select("station_city_id",$station_city_id);
 
           if($obj->load())
           {
                if($create_obj_if_not_found)
                {
                        $obj->set("travel_station_name",$travel_station_name);
                        $obj->activate();
                }
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("travel_id",$travel_id);
                $obj->set("road_station_id",$road_station_id);
                $obj->set("station_city_id",$station_city_id);
                $obj->set("travel_station_name",$travel_station_name);
                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
 
        }


        public function getDisplay($lang="ar")
        {
               return $this->getVal("travel_station_name");
        }
        
        
        public function getDropDownDisplay($lang="ar")
        {
               return $this->getVal("travel_station_name");
        }
        
        

        
        protected function getPublicMethods()
        {
            
            $pbms = array();
            
            $color = "green";
            $title_ar = "xxxxxxxxxxxxxxxxxxxx"; 
            //$pbms["xc123B"] = array("METHOD"=>"methodName","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"");
            
            
            
            return $pbms;
        }
        
        
        
        
        public function beforeDelete($id,$id_replace) 
        {
            global $server_db_prefix;
            
            if($id)
            {   
               if($id_replace==0)
               {
                   // FK part of me - not deletable 

                        
                   // FK part of me - deletable 

                   
                   // FK not part of me - replaceable 

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
        
        public function attributeIsApplicable($attribute)
        {
             $tObj = $this->het("travel_id");
             if(!$tObj) return false;

             $ttObj = $tObj->het("travel_template_id");
             if(!$ttObj) return false;
             
             $depart_city_id = $ttObj->getVal("depart_city_id");
             $station_city_id = $this->getVal("station_city_id");
             /*
             
             $order =  $this->getVal("trip_num");
             $trips_nb = intval($ttObj->getVal("trips_nb"));*/
             if(($attribute=="departure_date") or ($attribute=="departure_time"))
             {
                   return ($depart_city_id != $station_city_id);
             }
             
             
             return true;
      
        }
        
        public function getActivitiesPostponed($arrival_time, $postponed_time)
        {
             $activ_arr = array();   
             $activ_arr[] = array('name' =>"ظهر و عصر", 'start' =>"12:00", 'end' =>"16:30", 'need_time' => 18.0);
             $activ_arr[] = array('name' =>"مغرب و عشاء", 'start' =>"17:30", 'end' =>"22:30", 'need_time' => 20.0);
             $activ_arr[] = array('name' =>"وجبة فطور الصباح", 'start' =>"05:00", 'end' =>"10:15", 'need_time' => 17.0);
             $activ_arr[] = array('name' =>"وجبة الغداء", 'start' =>"11:40", 'end' =>"15:55", 'need_time' => 27.0);
             $activ_arr[] = array('name' =>"وجبة العشاء", 'start' =>"18:00", 'end' =>"23:30", 'need_time' => 27.0);
             
             $postponed_activ_arr = array();
             $needed_time = 0;
             
             $station = $this->hetStation();
             if($station and $station->isMikat()) 
             {
                 $postponed_activ_arr[] = "الإحرام من الميقات";
                 $needed_time += 40.0;
             }
             
             foreach($activ_arr as $activity_row)
             {
                 $start = $activity_row["start"];
                 $end = $activity_row["end"];
                 
                 if(($start <= $arrival_time) and ($end >= $arrival_time))
                 {
                      $postponed_activ_arr[] = $activity_row["name"]; //. " ($start <= $arrival_time) and ($end >= $arrival_time) ";
                      $needed_time += $activity_row["need_time"];
                 }
             }
             
             if($needed_time==0)
             {
                      $postponed_activ_arr[] = "إستراحة صغيرة";
                      $needed_time += 5;
             }
             
             $diff_time = $needed_time - $postponed_time;
             
             return array(implode(" / ",$postponed_activ_arr),  $diff_time);
        }
        
        
        
        
        
        
        
        
        
        
        
             
}
?> 