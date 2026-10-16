<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table billing : billing - الفواتير 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class Billing extends BtbObject{

        public static $MY_ATABLE_ID=13778; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		crm_customer_id => array(SHORTNAME => customer,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => crm_customer,  ANSMODULE => crm,  AUTOCOMPLETE => true,  
				RELATION => ManyToOne,  READONLY => false, ),

		billing_type => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 12,  MAXLENGTH => 12,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		billing_reference => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 16,  MAXLENGTH => 16,  "MIN-SIZE" => 2,  CHAR_TEMPLATE => "",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		billing_name => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 48,  MAXLENGTH => 64,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		paid => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "YN",  READONLY => false, ),

		payment_data => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 64,  MAXLENGTH => 96,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		payment_date => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => false, ),

                rowList => array(SHORTNAME => rows,  SHOW => true,  FORMAT => retrieve,  ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  
				CATEGORY => ITEMS,  ANSWER => billing_row,  ANSMODULE => btb,  ITEM => "billing_id",  READONLY => true,  "CAN-BE-SETTED" => true, ),
                                                
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
		parent::__construct("billing","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "billing_name";
                $this->ORDER_BY_FIELDS = "crm_customer_id, billing_type, billing_reference";
                $this->horizontalTabs = true;
                 
                
                $this->UNIQUE_KEY = array('crm_customer_id','billing_type','billing_reference');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
	}
        
        public static function loadById($id)
        {
           $obj = new Billing();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($crm_customer_id, $billing_type, $billing_reference,$create_obj_if_not_found=false)
        {
           $obj = new Billing();
           if(!$crm_customer_id) throw new AfwRuntimeException("loadByMainIndex : crm_customer_id is mandatory field");
           if(!$billing_type) throw new AfwRuntimeException("loadByMainIndex : billing_type is mandatory field");
           if(!$billing_reference) throw new AfwRuntimeException("loadByMainIndex : billing_reference is mandatory field");


           $obj->select("crm_customer_id",$crm_customer_id);
           $obj->select("billing_type",$billing_type);
           $obj->select("billing_reference",$billing_reference);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("crm_customer_id",$crm_customer_id);
                $obj->set("billing_type",$billing_type);
                $obj->set("billing_reference",$billing_reference);

                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }


        public function getDisplay($lang="ar")
        {
               if($this->getVal("billing_name")) return $this->getVal("billing_name");
               $data = array();
               $link = array();
               

               list($data[0],$link[0]) = $this->displayAttribute("billing_name",false, $lang);

               
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
        
        
        public function resetBilling($lang="ar", $commit=true)
        {
              $file_dir_name = dirname(__FILE__); 
              // require_once("$file_dir_name/../btb/billing_row.php");
              
              $br = new BillingRow();
              
              $br->select("billing_id", $this->getId());
              $nbrows = $br->logicDelete($commit=true,$only_me=false);
              
              return array("", "$nbrows billing rows deleted");
        
        }

        public function billingTotalAmount()
        {
              list($brow,) = $this->relRowList()->resetWhere("unit_code='total'")->getFirst();
              //if($this->id==57) die("brow(total) = ".var_export($brow,true));
              if($brow) $return =  $brow->getFloatVal("row_amount");  
              else return 0.0;
              // if($this->id==57) die("brow(total) = ".var_export($brow,true)." $return =  brow->getFloatVal(row_amount)");

              return $return;
              
        }
             
}
?>