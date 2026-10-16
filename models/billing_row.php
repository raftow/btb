<?php

$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class BillingRow extends BtbObject{

        public static $MY_ATABLE_ID=13779; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		billing_id => array(SHORTNAME => billing,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => billing,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true, ),

		unit_code => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 16,  MAXLENGTH => 16,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "ALPHABETIC,NUMERIC,UNDERSCORE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => true, ),

		row_num => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

		description => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 96,  MAXLENGTH => 196,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),
               
		unit_amount => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2",  READONLY => false, ),

		unit_nb => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

		row_amount => array(SEARCH => true,  QSEARCH => false,  SHOW => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2",  READONLY => false, ),

		credit => array(SHOW => true,  RETRIEVE => true,  
				SIZE => 16, TYPE => "FLOAT", FORMAT=>"*.2",  CATEGORY => FORMULA, ),
                  
		debit => array(SHOW => true,  RETRIEVE => true,  
				SIZE => 16, TYPE => "FLOAT", FORMAT=>"*.2",  CATEGORY => FORMULA, ),
                
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                active => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                draft => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("billing_row","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "billing_id, row_num";
                $this->horizontalTabs = true;
                 
                
                $this->UNIQUE_KEY = array('billing_id','unit_code');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->rowCategoryAttribute = "unit_code";
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
        }
        
        public function rowCategoryAttribute($mode = "retrieve")
        {
                return "unit_code";
        }
        
        public static function loadById($id)
        {
           $obj = new BillingRow();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($billing_id, $unit_code,$create_obj_if_not_found=false)
        {
           $obj = new BillingRow();
           if(!$billing_id) throw new AfwRuntimeException("loadByMainIndex : billing_id is mandatory field");
           if(!$unit_code) throw new AfwRuntimeException("loadByMainIndex : unit_code is mandatory field");


           $obj->select("billing_id",$billing_id);
           $obj->select("unit_code",$unit_code);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("billing_id",$billing_id);
                $obj->set("unit_code",$unit_code);

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
               

               list($data[0],$link[0]) = $this->displayAttribute("row_num",false, $lang);

               
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

               }
               else
               {
                        // FK on me 

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
        
        public function calcCredit()
        {
            $row_amount = floatval($this->getVal("row_amount"));
            if($row_amount>0) return $row_amount;
            else return "";
        }
        
        public function calcDebit()
        {
            $row_amount = -floatval($this->getVal("row_amount"));
            if($row_amount>0) return $row_amount;
            else return "";
        }
             
}
?>