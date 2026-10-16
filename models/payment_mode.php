<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of �table� payment_mode : payment_mode - طرق السداد 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class PaymentMode extends BtbObject{

        public static $MY_ATABLE_ID=13802; 


 // lookup Value List codes 
  
        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		lookup_code => array("TYPE" => "TEXT", "SHOW" => true, "RETRIEVE"=>true, "EDIT" => true, "SIZE" => 64, "QEDIT" => true, SHORTNAME=>code),

		name_ar => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  AUDIT => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 128,  MAXLENGTH => 128,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		desc_ar => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  AUDIT => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => "AREA",  MAXLENGTH => 32,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		name_en => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  AUDIT => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => true,  
				SIZE => 128,  MAXLENGTH => 128,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "ALPHABETIC,SPACE",  MANDATORY => true,  UTF8 => false,  
				TYPE => "TEXT",  READONLY => false, ),

		desc_en => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  AUDIT => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => "AREA",  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "TEXT",  READONLY => false, ),

                
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                active => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => true, QEDIT => true, "DEFAULT" => Y, TYPE => YN),
                draft => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => true, QEDIT => true, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);  
	
	*/ public function __construct(){
		parent::__construct("payment_mode","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "name_ar";
                // $this->ENABLE_DISPLAY_MODE_IN_QEDIT=true;
                $this->ORDER_BY_FIELDS = "lookup_code";
                $this->horizontalTabs = true;
                $this->IS_LOOKUP = true; 
                
                $this->ignore_insert_doublon = true;
                $this->UNIQUE_KEY = array('lookup_code');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->general_check_errors = true;
                $this->public_display = true;
                $this->ENABLE_DISPLAY_MODE_IN_QEDIT = true;
                
        }
        
        public static function loadAll()
        {
           $obj = new PaymentMode();
           $obj->select("active",'Y');
 
           $objList = $obj->loadMany();
 
           return $objList;
        }
        
        public static function loadById($id)
        {
           $obj = new PaymentMode();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($lookup_code,$create_obj_if_not_found=false)
        {
           if(!$lookup_code) throw new RuntimeException("loadByMainIndex : lookup_code is mandatory field");


           $obj = new PaymentMode();
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
        
        
        

        
        
        
        
        
        
        public function beforeDelete($id,$id_replace) 
        {
            global $server_db_prefix;
            
            if(!$id)
            {
                $id = $this->getId();
                $simul = true;
            }
            else
            {
                $simul = false;
            }
            
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
             
}
?>