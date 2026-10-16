<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table traveler_type : traveler_type - أنواع المسافرين 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class TravelerType extends BtbObject{

        public static $MY_ATABLE_ID=13735; 
        // إدارة أنواع المسافرين 
        public static $BF_QEDIT_TRAVELER_TYPE = 104013; 
        // عرض تفاصيل نوع مسافر 
        public static $BF_DISPLAY_TRAVELER_TYPE = 104015; 
        // مسح نوع مسافر 
        public static $BF_DELETE_TRAVELER_TYPE = 104014; 


 // lookup Value List codes 
        // E - فراغ  
        public static $TRAVELER_TYPE_E = 4; 

        // F - نساء  
        public static $TRAVELER_TYPE_F = 2; 

        // M - عزابي  
        public static $TRAVELER_TYPE_M = 1; 

        // T - الجميع  
        public static $TRAVELER_TYPE_T = 5; 

        // X - عوائل  
        public static $TRAVELER_TYPE_X = 3; 


        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		lookup_code => array("TYPE" => "TEXT", "SHOW" => true, "RETRIEVE"=>true, "EDIT" => true, "SIZE" => 64, "QEDIT" => true, SHORTNAME=>code),

		name_ar => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 128,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		name_en => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 128,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "ALPHABETIC,SPACE",  MANDATORY => true,  UTF8 => false,  
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
		parent::__construct("traveler_type","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "name_ar";
                $this->ORDER_BY_FIELDS = "lookup_code";
                $this->IS_LOOKUP = true; 
                $this->ignore_insert_doublon = true;
                $this->UNIQUE_KEY = array('lookup_code');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->general_check_errors = true;
                $this->ENABLE_DISPLAY_MODE_IN_QEDIT = true;
	}
        
        public static function loadById($id)
        {
           $obj = new TravelerType();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        public static function loadAll()
        {
           $obj = new TravelerType();
           $obj->select("active",'Y');

           $objList = $obj->loadMany();
           
           return $objList;
        }

        
        public static function loadByMainIndex($lookup_code,$create_obj_if_not_found=false)
        {
           $obj = new TravelerType();
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
               if($this->getVal("name_$lang")) return $this->getVal("name_$lang");
               $data = array();
               $link = array();
               

               list($data[0],$link[0]) = $this->displayAttribute("name_ar",false, $lang);

               
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
        
        

        public function getSeatTypeCode()
        {
                if($this->lookup_code=="M") return "men";
                if($this->lookup_code=="X") return "family";
                return $this->name_en;
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
                       // btb.traveler_distribution-نوع المسافر في الأمام	front_traveler_type_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.traveler_distribution set front_traveler_type_id='$id_replace' where front_traveler_type_id='$id' ");
                       // btb.traveler_distribution-نوع المسافر في الخلف	back_traveler_type_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.traveler_distribution set back_traveler_type_id='$id_replace' where back_traveler_type_id='$id' ");

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 
                       // btb.traveler_distribution-نوع المسافر في الأمام	front_traveler_type_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.traveler_distribution set front_traveler_type_id='$id_replace' where front_traveler_type_id='$id' ");
                       // btb.traveler_distribution-نوع المسافر في الخلف	back_traveler_type_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.traveler_distribution set back_traveler_type_id='$id_replace' where back_traveler_type_id='$id' ");

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
             
}
?>