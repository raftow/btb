<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table road_station : road_station - المحطات 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class RoadStation extends BtbObject{

        public static $MY_ATABLE_ID=13766; 


 // lookup Value List codes 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		road_id => array(SEARCH => false,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => road,  ANSMODULE => btb,  AUTOCOMPLETE => false,  
				RELATION => ManyToOne,  READONLY => false, ),

		name_ar => array(SEARCH => false,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 128,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		distance => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "INT",  UNIT => "كم",  READONLY => false, ),

		road_service_mfk => array(SHORTNAME => services,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => MFK,  ANSWER => road_service,  ANSMODULE => btb,  READONLY => false, "DEFAULT"=>",1,2,3,"),
                
		contact_name => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ALPHABETIC,SPACE",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		contact_phone => array(SEARCH => false,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 128,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ALPHABETIC,SPACE",  UTF8 => false,  
				TYPE => "TEXT",  READONLY => false, ),

		desc_ar => array(SEARCH => false,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => "AREA",  UTF8 => true,  
				TYPE => "TEXT", ROWS=>10, READONLY => false, ),

		email => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 128,  CHAR_TEMPLATE => "",  FORMAT => EMAIL,  UTF8 => false,  
				TYPE => "TEXT",  READONLY => false, ),

		gmap => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		latitude => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  TITLE_AFTER => "(in DEG)",  UTF8 => false,  
				TYPE => "FLOAT",  READONLY => false, ),

		longitude => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  TITLE_AFTER => "(in DEG)",  UTF8 => false,  
				TYPE => "FLOAT",  READONLY => false, ),

		desc_en => array(SEARCH => false,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => "AREA",  UTF8 => false,  
				TYPE => "TEXT",  READONLY => false, ),

                
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
                //tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("road_station","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "name_ar";
                $this->ORDER_BY_FIELDS = "road_id, distance, name_ar";
                $this->horizontalTabs = true;
                $this->IS_LOOKUP = true; 
                $this->ignore_insert_doublon = true;
                $this->UNIQUE_KEY = array('road_id','name_ar','distance');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->public_display = true;
                $this->after_save_edit = array("class"=>'Road',"attribute"=>'road_id', "currmod"=> 'btb',);

	}
        
        public static function loadById($id)
        {
           $obj = new RoadStation();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($road_id, $name_ar, $distance,$create_obj_if_not_found=false)
        {
           $obj = new RoadStation();
           if(!$road_id) throw new AfwRuntimeException("loadByMainIndex : road_id is mandatory field");
           if(!$name_ar) throw new AfwRuntimeException("loadByMainIndex : name_ar is mandatory field");
           if(!$distance) throw new AfwRuntimeException("loadByMainIndex : distance is mandatory field");


           $obj->select("road_id",$road_id);
           $obj->select("name_ar",$name_ar);
           $obj->select("distance",$distance);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("road_id",$road_id);
                $obj->set("name_ar",$name_ar);
                $obj->set("distance",$distance);

                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }


        public function getDisplay($lang="ar")
        {
               
               $data = array();
               $link = array();
               

               //list($data[0],$link[0]) = $this->displayAttribute("road_id",false, $lang);
               list($data[0],$link[0]) = $this->displayAttribute("name_ar",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("distance",false, $lang);
               
               return implode(" - ",$data);
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
                       // btb.travel_template-المحطات  بين مدينة 0 و مدينة 1	road1_station_mfk  
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road1_station_mfk=REPLACE(road1_station_mfk, ',$id,', ',') where road1_station_mfk like '%,$id,%' ");
                       // btb.travel_template-المحطات بين مدينة 1 و مدينة 2	road2_station_mfk  
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road2_station_mfk=REPLACE(road2_station_mfk, ',$id,', ',') where road2_station_mfk like '%,$id,%' ");
                       // btb.travel_template-المحطات بين مدينة 2 و مدينة 3	road3_station_mfk  
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road3_station_mfk=REPLACE(road3_station_mfk, ',$id,', ',') where road3_station_mfk like '%,$id,%' ");
                       // btb.travel_template-محطات العودة	road_return_station_mfk  
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road_return_station_mfk=REPLACE(road_return_station_mfk, ',$id,', ',') where road_return_station_mfk like '%,$id,%' ");

               }
               else
               {
                        // FK on me 

                        
                        // MFK
                       // btb.travel_template-المحطات  بين مدينة 0 و مدينة 1	road1_station_mfk  
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road1_station_mfk=REPLACE(road1_station_mfk, ',$id,', ',$id_replace,') where road1_station_mfk like '%,$id,%' ");
                       // btb.travel_template-المحطات بين مدينة 1 و مدينة 2	road2_station_mfk  
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road2_station_mfk=REPLACE(road2_station_mfk, ',$id,', ',$id_replace,') where road2_station_mfk like '%,$id,%' ");
                       // btb.travel_template-المحطات بين مدينة 2 و مدينة 3	road3_station_mfk  
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road3_station_mfk=REPLACE(road3_station_mfk, ',$id,', ',$id_replace,') where road3_station_mfk like '%,$id,%' ");
                       // btb.travel_template-محطات العودة	road_return_station_mfk  
                        $this->execQuery("update ${server_db_prefix}btb.travel_template set road_return_station_mfk=REPLACE(road_return_station_mfk, ',$id,', ',$id_replace,') where road_return_station_mfk like '%,$id,%' ");

                   
               } 
               return true;
            }    
	}
        
        public function isMikat()
        {
            return $this->findInMfk("road_service_mfk",9,false);
        }
        
        
        
        
        
        
        
        
             
}
?>