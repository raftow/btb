<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_model : bus_model - موديلات الباصات 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class BusModel extends BtbObject{

        public static $MY_ATABLE_ID=13739; 
        // إجراء إحصائيات حول موديلات الباصات 
        public static $BF_STATS_BUS_MODEL = 104029; 
        // إدارة موديلات الباصات 
        public static $BF_QEDIT_BUS_MODEL = 104024; 
        // إنشاء موديل باص 
        public static $BF_EDIT_BUS_MODEL = 104023; 
        // الاستعلام عن موديل باص 
        public static $BF_QSEARCH_BUS_MODEL = 104028; 
        // البحث في موديلات الباصات 
        public static $BF_SEARCH_BUS_MODEL = 104027; 
        // عرض تفاصيل موديل باص 
        public static $BF_DISPLAY_BUS_MODEL = 104026; 
        // مسح موديل باص 
        public static $BF_DELETE_BUS_MODEL = 104025; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		bus_brand_id => array(SHORTNAME => brand,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => bus_brand,  ANSMODULE => btb,  
				RELATION => ManyToOne,  READONLY => false, ),

		bus_model_name => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 48,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		bus_template_id => array(SHORTNAME => template,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => bus_template,  ANSMODULE => btb,  AUTOCOMPLETE => false,  
				RELATION => ManyToOne,  READONLY => false, ),

                
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
		parent::__construct("bus_model","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "bus_model_name";
                $this->ORDER_BY_FIELDS = "bus_brand_id, bus_model_name";
                 
                
                $this->UNIQUE_KEY = array('bus_brand_id','bus_model_name');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->public_display = true;
	}
        
        public static function loadById($id)
        {
           $obj = new BusModel();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($bus_brand_id, $bus_model_name,$create_obj_if_not_found=false)
        {
           $obj = new BusModel();
           if(!$bus_brand_id) throw new AfwRuntimeException("loadByMainIndex : bus_brand_id is mandatory field");
           if(!$bus_model_name) throw new AfwRuntimeException("loadByMainIndex : bus_model_name is mandatory field");


           $obj->select("bus_brand_id",$bus_brand_id);
           $obj->select("bus_model_name",$bus_model_name);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("bus_brand_id",$bus_brand_id);
                $obj->set("bus_model_name",$bus_model_name);

                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }


        public function getDisplay($lang="ar")
        {
               if($this->getVal("bus_model_name")) return $this->getVal("bus_model_name");
               $data = array();
               $link = array();
               

               list($data[0],$link[0]) = $this->displayAttribute("bus_brand_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("bus_model_name",false, $lang);

               
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
                       // btb.bus-موديل الباص	bus_model_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus set bus_model_id='$id_replace' where bus_model_id='$id' ");

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 
                       // btb.bus-موديل الباص	bus_model_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus set bus_model_id='$id_replace' where bus_model_id='$id' ");

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
             
}
?>