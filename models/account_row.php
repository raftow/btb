<?php

$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class AccountRow extends BtbObject{

        public static $MY_ATABLE_ID=0;
        
        public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),
                
                acompany_id => array(FGROUP=>data, SHORTNAME => company,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true, ),
                
		product_code => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 16,  MAXLENGTH => 16,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "ALPHABETIC,NUMERIC,UNDERSCORE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => true, ),

		product_ref => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "ALPHABETIC,NUMERIC,UNDERSCORE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => true, ),

                account_type_id => array(FGROUP=>data, SHORTNAME => company,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "ENUM",  ANSWER => "FUNCTION" ,  ),
                                 
                account_id => array(FGROUP=>data, SHORTNAME => company,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => account,  ANSMODULE => btb,  
				RELATION => OneToMany,  READONLY => true, ),
                                
		row_date => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => false, ),

		description => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 96,  MAXLENGTH => 196,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),
                                
                row_amount => array(SEARCH => true,  QSEARCH => false,  SHOW => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "FLOAT", FORMAT=>"*.2",  READONLY => false, ),

		credit => array(SHOW => true,  RETRIEVE => true,  
				SIZE => 16, TYPE => "FLOAT", FORMAT=>"*.2",  CATEGORY => FORMULA, ),
                  
		debit => array(SHOW => true,  RETRIEVE => true,  
				SIZE => 16, TYPE => "FLOAT", FORMAT=>"*.2",  CATEGORY => FORMULA, ),
                                                
		deadline_date => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => false, ),
                
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
		parent::__construct("account_row","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "acompany_id, product_code, product_ref, account_type_id, account_id";
                $this->horizontalTabs = true;
 
 
 
                $this->UNIQUE_KEY = array('acompany_id','product_code','product_ref','account_type_id','account_id');
 
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
	}
 
        public static function loadById($id)
        {
           $obj = new AccountRow();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
 
        public static function cancelRow($acompany_id, $product_code, $product_ref, $account_type_id, $account_id)
        {
           $obj = new AccountRow();
           if(!$acompany_id) throw new AfwRuntimeException("loadByMainIndex : acompany_id is mandatory field");
           if(!$product_code) throw new AfwRuntimeException("loadByMainIndex : product_code is mandatory field");
           if(!$product_ref) throw new AfwRuntimeException("loadByMainIndex : product_ref is mandatory field");
           if(!$account_type_id) throw new AfwRuntimeException("loadByMainIndex : account_type_id is mandatory field");
           if(!$account_id) throw new AfwRuntimeException("loadByMainIndex : account_id is mandatory field");
 
 
           $obj->select("acompany_id",$acompany_id);
           $obj->select("product_code",$product_code);
           $obj->select("product_ref",$product_ref);
           $obj->select("account_type_id",$account_type_id);
           $obj->select("account_id",$account_id);
 
 
           if($obj->load())
           {
                $obj->logicDelete();
           }
           
           return $obj;
        }
 
        public static function pushRow($acompany_id, $product_code, $product_ref, $account_type_id, $account_id, $description, $credit, $debit, $deadline_date)
        {
           $obj = new AccountRow();
           if(!$acompany_id) throw new AfwRuntimeException("loadByMainIndex : acompany_id is mandatory field");
           if(!$product_code) throw new AfwRuntimeException("loadByMainIndex : product_code is mandatory field");
           if(!$product_ref) throw new AfwRuntimeException("loadByMainIndex : product_ref is mandatory field");
           if(!$account_type_id) throw new AfwRuntimeException("loadByMainIndex : account_type_id is mandatory field");
           if(!$account_id) throw new AfwRuntimeException("loadByMainIndex : account_id is mandatory field");
 
           if(!$description) throw new AfwRuntimeException("loadByMainIndex : description is mandatory field");
           if(!$deadline_date) throw new AfwRuntimeException("loadByMainIndex : deadline_date is mandatory field");
           
           
           
           $row_amount = floatval($credit) - floatval($debit);
 
           
           if(abs($row_amount)<0.01) throw new AfwRuntimeException("loadByMainIndex : credit or debit params is mandatory and should be >= 0.01 SAR");
 
           $hijri_current_date = AfwDateHelper::currentHijriDate();
           
           $obj->select("acompany_id",$acompany_id);
           $obj->select("product_code",$product_code);
           $obj->select("product_ref",$product_ref);
           $obj->select("account_type_id",$account_type_id);
           $obj->select("account_id",$account_id);
 
           if($obj->load())
           {
                $obj->set("row_date",$hijri_current_date);
                $obj->set("description",$description);
                $obj->set("row_amount",$row_amount);
                $obj->set("deadline_date",$deadline_date);
                $obj->activate();
           }
           else
           {
                $obj->set("acompany_id",$acompany_id);
                $obj->set("row_date",$hijri_current_date);
                $obj->set("product_code",$product_code);
                $obj->set("product_ref",$product_ref);
                $obj->set("account_type_id",$account_type_id);
                $obj->set("account_id",$account_id);
                
                $obj->set("row_date",$hijri_current_date);
                $obj->set("description",$description);
                $obj->set("row_amount",$row_amount);
                $obj->set("deadline_date",$deadline_date);
 
                $obj->insertNew();
                $obj->is_new = true;
           }
           
           return $obj;
        }
 
 
        public function getDisplay($lang="ar")
        {
 
               $data = array();
               $link = array();
 
 
               list($data[0],$link[0]) = $this->displayAttribute("product_code",false, $lang);
 
 
               return implode(" - ",$data);
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
        
        public function list_of_account_type_id() { 
            $list_of_items = array(); 
            $list_of_items[1] = "شركة باصات";
            $list_of_items[2] = "فندق";
             
           return  $list_of_items;
        }
        
        
 
 
 
        protected function getOtherLinksArray($mode, $genereLog = false, $step="all")            
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             $otherLinksArray = $this->getOtherLinksArrayStandard($mode);
             $my_id = $this->getId();
             $displ = $this->getDisplay($lang);
 
 
 
             return $otherLinksArray;
        }
 
        protected function getPublicMethods()
        {
 
            $pbms = array();
 
            $color = "green";
            $title_ar = "xxxxxxxxxxxxxxxxxxxx"; 
            $methodName = "mmmmmmmmmmmmmmmmmmmmmmm";
            //$pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD"=>$methodName,"COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"");
 
 
 
            return $pbms;
        }
 
        public function fld_CREATION_USER_ID()
        {
                return "created_by";
        }
 
        public function fld_CREATION_DATE()
        {
                return "created_at";
        }
 
        public function fld_UPDATE_USER_ID()
        {
        	return "updated_by";
        }
 
        public function fld_UPDATE_DATE()
        {
        	return "updated_at";
        }
 
        public function fld_VALIDATION_USER_ID()
        {
        	return "validated_by";
        }
 
        public function fld_VALIDATION_DATE()
        {
                return "validated_at";
        }
 
        public function fld_VERSION()
        {
        	return "version";
        }
 
        public function fld_ACTIVE()
        {
        	return  "active";
        }
 
        public function isTechField($attribute) {
            return (($attribute=="created_by") or ($attribute=="created_at") or ($attribute=="updated_by") or ($attribute=="updated_at") or ($attribute=="validated_by") or ($attribute=="validated_at") or ($attribute=="version"));  
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