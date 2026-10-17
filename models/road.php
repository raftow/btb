<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table road : road - الطرق بين المدن 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

// old call to AutoLoader::addModule('btb');

class Road extends BtbObject{

        public static $MY_ATABLE_ID=13763; 

        public static $DEFAULT_ROAD_NAME = "الطريق السريعة";
 // lookup Value List codes 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		road_name => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 48,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),
                
                city_mfk => array(CATEGORY => FORMULA, TYPE => MFK, ANSWER => city, ANSMODULE => pag, "NO-COTE"=>true),
                
		depart_city_id => array(SHORTNAME => city,  
				 SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 40,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,
                                WHERE => "avail='Y' and id in (0§city_mfk§0)",  
				RELATION => ManyToOne,  READONLY => false, ),

		arrival_city_id => array(SHORTNAME => city,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 40,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,
                                WHERE => "avail='Y' and id in (0§city_mfk§0)",  
				RELATION => ManyToOne,  READONLY => false, ),

		distance => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "INT",  UNIT => "كم",  READONLY => false, ),

		medium_bus_speed => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "INT",  UNIT => "كم/س",  READONLY => false, ),

                roadStationList => array(TYPE => FK, ANSWER => road_station, ANSMODULE => btb, CATEGORY => ITEMS, ITEM => 'road_id', 
                                           WHERE=>'', SHOW => true, FORMAT=>retrieve, EDIT => false, READONLY=> true, ICONS=>true, 
                                           'DELETE-ICON'=>true, BUTTONS=>true, "NO-LABEL"=>false),
                
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                active => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => true, QEDIT => true, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("road","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "road_name";
                $this->ORDER_BY_FIELDS = "road_name, depart_city_id, arrival_city_id";
                $this->horizontalTabs = true;
                $this->IS_LOOKUP = true; 
                $this->ignore_insert_doublon = true;
                $this->UNIQUE_KEY = array('road_name','depart_city_id','arrival_city_id');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->public_display = true;
	}
        
        public static function loadById($id)
        {
           $obj = new Road();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($road_name, $depart_city_id, $arrival_city_id,$create_obj_if_not_found=false)
        {
           $obj = new Road();
           if(!$road_name) throw new AfwRuntimeException("loadByMainIndex : road_name is mandatory field");
           if(!$depart_city_id) throw new AfwRuntimeException("loadByMainIndex : depart_city_id is mandatory field");
           if(!$arrival_city_id) throw new AfwRuntimeException("loadByMainIndex : arrival_city_id is mandatory field");


           $obj->select("road_name",$road_name);
           $obj->select("depart_city_id",$depart_city_id);
           $obj->select("arrival_city_id",$arrival_city_id);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("road_name",$road_name);
                $obj->set("depart_city_id",$depart_city_id);
                $obj->set("arrival_city_id",$arrival_city_id);

                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }
        
        
        public static function setRoadInfos($road_name, $depart_city_id, $arrival_city_id, $distance, $speed = 80, $update_inverse_road=true)
        {
             $r1 = self::loadByMainIndex($road_name, $depart_city_id, $arrival_city_id,$create_obj_if_not_found=true);
             $distance1 = intval($r1->getVal("distance"));
             $speed1 = intval($r1->getVal("medium_bus_speed"));
             if(($distance1>10) and ($distance1<1500) and (0.8*$distance1<=$distance) and (1.2*$distance1>=$distance))
             {
                 $new_distance = round(($distance1 + $distance) / 2);
             }
             elseif($distance)
             {
                 $new_distance = round($distance);
             }
             else
             {
                 $new_distance = round($distance1);
             }
             $r1->set("distance",$new_distance);
             if(!$speed1) $r1->set("medium_bus_speed",$speed);
             $r1->commit();
             
             if($update_inverse_road)
             {
                 self::setRoadInfos($road_name, $arrival_city_id, $depart_city_id, $distance, $speed, false); // false to avoid infinite loop
             } 
        }

        public function getDropDownDisplay($lang="ar")
        {
	    return $this->getDisplay($lang);
        }


        public function getShortDisplay($lang="ar")
        {
               return $this->getVal("road_name");
        }       

        public function getDisplay($lang="ar")
        {
               $data = array();
               $link = array();
               

               list($data[0],$link[0]) = $this->displayAttribute("road_name",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("depart_city_id",false, $lang);
               list($data[2],$link[2]) = $this->displayAttribute("arrival_city_id",false, $lang);

               
               return $data[0]." من ".$data[1]." إلى ".$data[2];
        }
        
        
        

        
        protected function getOtherLinksArray($mode, $genereLog = false, $step="all")            
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             $otherLinksArray = $this->getOtherLinksArrayStandard($mode);
             $my_id = $this->getId();
             $displ = $this->getDisplay($lang);
             
             if($mode=="mode_roadStationList")
             {
                   unset($link);
                   $my_id = $this->getId();
                   $link = array();
                   $title = "إضافة محطة جديدة";
                   $title_detailed = $title ." لـ". $displ;
                   $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=RoadStation&currmod=btb&id_origin=$my_id&class_origin=Road&module_origin=btb&sel_road_id=$my_id";
                   $link["TITLE"] = $title;
                   $link["UGROUPS"] = array();
                   $otherLinksArray[] = $link;
             }
             
             return $otherLinksArray;
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
                       // btb.road_station-الطريق	road_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("delete from ${server_db_prefix}btb.road_station where road_id = '$id' and active='N'");
                        
                        $obj = new RoadStation();
                        $obj->where("road_id = '$id'");
                        $nbRecords = $obj->count();
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "Used in some Road stations(s) as Road";
                            return false;
                        }
 
 
                   // FK part of me - deletable 
 
 
                   // FK not part of me - replaceable 
                       // btb.travel_template-الطريق بين مدينة 0 و مدينة 1	road1_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road1_id='$id_replace' where road1_id='$id' ");
                       // btb.travel_template-الطريق بين مدينة 1 و مدينة 2	road2_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road2_id='$id_replace' where road2_id='$id' ");
                       // btb.travel_template-الطريق بين مدينة 2 و مدينة 3	road3_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road3_id='$id_replace' where road3_id='$id' ");
                       // btb.travel_template-طريق العودة	road_return_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road_return_id='$id_replace' where road_return_id='$id' ");
 
 
 
                   // MFK
 
               }
               else
               {
                        // FK on me 
                       // btb.road_station-الطريق	road_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("update ${server_db_prefix}btb.road_station set road_id='$id_replace' where road_id='$id' ");
                       // btb.travel_template-الطريق بين مدينة 0 و مدينة 1	road1_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road1_id='$id_replace' where road1_id='$id' ");
                       // btb.travel_template-الطريق بين مدينة 1 و مدينة 2	road2_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road2_id='$id_replace' where road2_id='$id' ");
                       // btb.travel_template-الطريق بين مدينة 2 و مدينة 3	road3_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road3_id='$id_replace' where road3_id='$id' ");
                       // btb.travel_template-طريق العودة	road_return_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road_return_id='$id_replace' where road_return_id='$id' ");
 
 
                        // MFK
 
 
               } 
               return true;
            }    
	}
        
        public function getFormuleResult($attribute, $what='value') 
         {
               global $server_db_prefix, $images;
               $objme = AfwSession::getUserConnected();
               
               $orgunit_id = $objme->getMyOrganizationId();
               if($orgunit_id) $woObj = WorkBranch::loadById($orgunit_id);
               else $woObj = null;
               
               switch($attribute) 
               {
                    
                    case "city_mfk" :
                        if($woObj) return $woObj->getVal("city_mfk");
                        else return "";
		    break;
                    
                    default:
                         $methodFormule = "get". ucfirst($attribute);
                         //die("methodFormule = $methodFormule");
		         return $this->$methodFormule();
                    break;  
               }
         }
             
}
?>