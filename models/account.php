<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table account : account - الأطراف الأخرى 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class Account extends BtbObject{

        public static $MY_ATABLE_ID=13797;
        
        public static $ACCOUNT_TYPE_BUS_COMPANY=1;
        
        public static $ACCOUNT_TYPE_HOTEL_COMPANY=2; 

	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
                acompany_id => array(FGROUP=>data, SHORTNAME => company,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true, ),
                
		account_type_id => array(FGROUP=>data, SHORTNAME => company,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "ENUM",  ANSWER => "FUNCTION" ,  ),

		code => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 16,  MAXLENGTH => 16,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "ALPHABETIC,NUMERIC,UNDERSCORE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => true, ),

		'name' => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 128,  MAXLENGTH => 128,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => true, ),

		description => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => "AREA",  MAXLENGTH => 128,  "MIN-SIZE" => 7,  CHAR_TEMPLATE => "",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

                   accountRowList => array(SHORTNAME => accountRows,  SHOW => true,  FORMAT => retrieve,  ICONS => true,  "DELETE-ICON" => true,  
                                BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  
				CATEGORY => ITEMS,  ANSWER => account_row,  ANSMODULE => btb,  ITEM => "account_id",  READONLY => true,  "CAN-BE-SETTED" => true, ),
                                                
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
		parent::__construct("account","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "acompany_id, account_type_id, code";
                $this->horizontalTabs = true;
 
 
 
                $this->UNIQUE_KEY = array('acompany_id','account_type_id','code');
 
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
	}
 
        public static function loadById($id)
        {
           $obj = new Account();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
 
 
 
        public static function loadByMainIndex($acompany_id, $account_type_id, $code,$create_obj_if_not_found=false)
        {
           $obj = new Account();
           if(!$code) throw new AfwRuntimeException("loadByMainIndex : code is mandatory field");
 
 
           $obj->select("acompany_id",$acompany_id);
           $obj->select("account_type_id",$account_type_id);
           $obj->select("code",$code);
 
           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("acompany_id",$acompany_id);
                $obj->set("account_type_id",$account_type_id);
                $obj->set("code",$code);
 
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
 
 
               list($data[0],$link[0]) = $this->displayAttribute("name",false, $lang);
 
 
               return implode(" - ",$data);
        }
 
 
 
        protected function getOtherLinksArray($mode, $genereLog = false, $step="all")            
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             $otherLinksArray = $this->getOtherLinksArrayStandard($mode);
             $my_id = $this->getId();
             $displ = $this->getDisplay($lang);
 
             if($mode=="mode_accountRowList")
             {
                   unset($link);
                   $link = array();
                   $title = "إضافة عملية مالية جديد";
                   $title_detailed = $title ."لـ : ". $displ;
                   $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=AccountRow&currmod=btb&sel_account_id=$my_id";
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
                       // btb.account_row-الطرف الآخر	account_id  أنا تفاصيل لها-OneToMany
                        if(!$simul) $this->execQuery("delete from ${server_db_prefix}btb.account_row where account_id = '$id' ");
 
 
                   // FK not part of me - replaceable 
 
 
 
                   // MFK
 
               }
               else
               {
                        // FK on me 
                       // btb.account_row-الطرف الآخر	account_id  أنا تفاصيل لها-OneToMany
                        if(!$simul) $this->execQuery("update ${server_db_prefix}btb.account_row set account_id='$id_replace' where account_id='$id' ");
 
 
                        // MFK
 
 
               } 
               return true;
            }    
	}
        
        public function list_of_account_type_id() { 
            $list_of_items = array(); 
            $list_of_items[1] = "شركة باصات";
            $list_of_items[2] = "فندق";
             
           return  $list_of_items;
        }
             
}
?>