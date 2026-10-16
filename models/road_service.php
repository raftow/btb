<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table road_service : road_service - خدمات محطات الطرقات 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class RoadService extends BtbObject{

        public static $MY_ATABLE_ID=13765; 
        // إدارة خدمات محطات الطرقات 
        public static $BF_QEDIT_ROAD_SERVICE = 104158; 
        // عرض تفاصيل خدمة في محطة طريق 
        public static $BF_DISPLAY_ROAD_SERVICE = 104160; 
        // مسح خدمة في محطة طريق 
        public static $BF_DELETE_ROAD_SERVICE = 104159; 


 // lookup Value List codes 
        // BAKALA - تموينات  
        public static $ROAD_SERVICE_BAKALA = 3; 

        // BENCHER - بنشر  
        public static $ROAD_SERVICE_BENCHER = 8; 

        // BENZINE - وقود بنزين  
        public static $ROAD_SERVICE_BENZINE = 1; 

        // BUFFET - بوفيه  
        public static $ROAD_SERVICE_BUFFET = 5; 

        // CAFE - شاي وقهوة  
        public static $ROAD_SERVICE_CAFE = 6; 

        // DIESEL - وقود ديزل  
        public static $ROAD_SERVICE_DIESEL = 2; 

        // GAMES - ألعاب  
        public static $ROAD_SERVICE_GAMES = 7; 

        // RESTAURANT - مطعم  
        public static $ROAD_SERVICE_RESTAURANT = 4; 


        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		lookup_code => array("TYPE" => "TEXT", "SHOW" => true, "RETRIEVE"=>true, "EDIT" => true, "SIZE" => 64, "QEDIT" => true, SHORTNAME=>code),

		name_ar => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 128,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		name_en => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 128,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ALPHABETIC,SPACE",  MANDATORY => true,  UTF8 => false,  
				TYPE => "TEXT",  READONLY => false, ),

		desc_ar => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => "AREA",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		desc_en => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
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
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("road_service","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "name_ar";
                $this->ORDER_BY_FIELDS = "lookup_code";
                $this->horizontalTabs = true;
                $this->IS_LOOKUP = true; 
                $this->ignore_insert_doublon = true;
                $this->UNIQUE_KEY = array('lookup_code');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->public_display = true;
	}
        
        public static function loadById($id)
        {
           $obj = new RoadService();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        public static function loadAll()
        {
           $obj = new RoadService();
           $obj->select("active",'Y');

           $objList = $obj->loadMany();
           
           return $objList;
        }

        
        public static function loadByMainIndex($lookup_code,$create_obj_if_not_found=false)
        {
           $obj = new RoadService();
           if(!$lookup_code) throw new AfwRuntimeException("loadByMainIndex : lookup_code is mandatory field");


           $obj->select("lookup_code",$lookup_code);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("lookup_code",$lookup_code);

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
               

               list($data["ar"],$link["ar"]) = $this->displayAttribute("name_ar",false, $lang);

               
               return $data[$lang];
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
                       // btb.road_station-خدمات المحطة 	road_service_mfk  
                        $this->execQuery("update ${server_db_prefix}btb.road_station set road_service_mfk=REPLACE(road_service_mfk, ',$id,', ',') where road_service_mfk like '%,$id,%' ");

               }
               else
               {
                        // FK on me 

                        
                        // MFK
                       // btb.road_station-خدمات المحطة 	road_service_mfk  
                        $this->execQuery("update ${server_db_prefix}btb.road_station set road_service_mfk=REPLACE(road_service_mfk, ',$id,', ',$id_replace,') where road_service_mfk like '%,$id,%' ");

                   
               } 
               return true;
            }    
	}
             
}
?>