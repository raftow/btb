<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_brand : bus_brand - ماركات الباصات 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class BusBrand extends BtbObject{

        public static $MY_ATABLE_ID=13738; 
        // إدارة ماركات الباصات 
        public static $BF_QEDIT_BUS_BRAND = 104064; 
        // عرض تفاصيل ماركة الباص 
        public static $BF_DISPLAY_BUS_BRAND = 104066; 
        // مسح ماركة الباص 
        public static $BF_DELETE_BUS_BRAND = 104065; 


 // lookup Value List codes 

        
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

                busModelList => array(TYPE => FK, ANSWER => bus_model, ANSMODULE => btb, CATEGORY => ITEMS, ITEM => 'bus_brand_id',
                                        WHERE=>'', 
                                        SHOW => true, FORMAT=>retrieve, EDIT => false, READONLY=> true, 
                                        ICONS=>true, 'DELETE-ICON'=>true, BUTTONS=>true, "NO-LABEL"=>false),
                
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
		parent::__construct("bus_brand","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "name_ar";
                $this->ORDER_BY_FIELDS = "lookup_code";
                $this->IS_LOOKUP = true; 
                $this->ignore_insert_doublon = true;
                $this->UNIQUE_KEY = array('lookup_code');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->public_display = true;
	}
        
        public static function loadById($id)
        {
           $obj = new BusBrand();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($lookup_code,$create_obj_if_not_found=false)
        {
           $obj = new BusBrand();
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
        
        
        

        
        protected function getOtherLinksArray($mode, $genereLog = false, $step="all")            
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             $otherLinksArray = array();
             $my_id = $this->getId();
             $displ = $this->getDisplay($lang);
 
             if($mode=="mode_busModelList")
             {
                   unset($link);
                   $my_id = $this->getId();
                   $link = array();
                   $title = "إدارة موديلات الباصات ";
                   $title_detailed = $title ."لـ : ". $displ;
                   $link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=BusModel&currmod=btb&id_origin=$my_id&class_origin=BusBrand&module_origin=btb&newo=10&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=bus_brand_id=$my_id&sel_bus_brand_id=$my_id";
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

                        
                   // FK part of me - deletable 

                   
                   // FK not part of me - replaceable 
                       // btb.bus-ماركة الباص	bus_brand_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus set bus_brand_id='$id_replace' where bus_brand_id='$id' ");
                       // btb.bus_model-ماركة الباص	bus_brand_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus_model set bus_brand_id='$id_replace' where bus_brand_id='$id' ");

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 
                       // btb.bus-ماركة الباص	bus_brand_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus set bus_brand_id='$id_replace' where bus_brand_id='$id' ");
                       // btb.bus_model-ماركة الباص	bus_brand_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus_model set bus_brand_id='$id_replace' where bus_brand_id='$id' ");

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
             
}
?>