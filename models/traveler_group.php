<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table traveler_group : traveler_group - مجموعات المسافرين 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class TravelerGroup extends BtbObject{

        public static $MY_ATABLE_ID=13774; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		crm_customer_id => array(SHORTNAME => customer,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true, DISPLAY=>SHORT, 
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => crm_customer,  ANSMODULE => crm,  AUTOCOMPLETE => true,  
				RELATION => ManyToOne,  READONLY => false, ),

		traveler_group_type_id => array(SHORTNAME => group_type,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => traveler_group_type,  ANSMODULE => btb,  
				RELATION => ManyToOne,  READONLY => false, ),

		group_num => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

		traveler_type_id => array(SHORTNAME => type,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => traveler_type,  ANSMODULE => btb,  READONLY => false,  "EDIT-SHORT-LIST" => true, ),

		traveler_group_name => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 48,  MAXLENGTH => 48,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		travelers_nb => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

                travelerList => array(TYPE => FK, ANSWER => traveler, ANSMODULE => btb, CATEGORY => ITEMS, ITEM => 'traveler_group_id', WHERE=>'', SHOW => true, FORMAT=>retrieve, EDIT => false, READONLY=> true, ICONS=>true, 'DELETE-ICON'=>true, BUTTONS=>true, "NO-LABEL"=>false),

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
		parent::__construct("traveler_group","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "traveler_group_name";
                $this->ORDER_BY_FIELDS = "crm_customer_id, traveler_group_type_id, group_num";
                $this->horizontalTabs = true;
                 
                
                $this->UNIQUE_KEY = array('crm_customer_id','traveler_group_type_id','group_num');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
	}
        
        public static function loadById($id)
        {
           $obj = new TravelerGroup();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($crm_customer_id, $traveler_group_type_id, $group_num,$create_obj_if_not_found=false)
        {
           $obj = new TravelerGroup();
           if(!$crm_customer_id) throw new AfwRuntimeException("loadByMainIndex : crm_customer_id is mandatory field");
           if(!$traveler_group_type_id) throw new AfwRuntimeException("loadByMainIndex : traveler_group_type_id is mandatory field");
           if(!$group_num) throw new AfwRuntimeException("loadByMainIndex : group_num is mandatory field");


           $obj->select("crm_customer_id",$crm_customer_id);
           $obj->select("traveler_group_type_id",$traveler_group_type_id);
           $obj->select("group_num",$group_num);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("crm_customer_id",$crm_customer_id);
                $obj->set("traveler_group_type_id",$traveler_group_type_id);
                $obj->set("group_num",$group_num);
                $traveler_group_name = $obj->getShortDisplay();
                $obj->set("traveler_group_name",$traveler_group_name);

                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }
        
        public function getShortDisplay($lang="ar")
        {
               $data = array();
               $link = array();
               

               list($data[0],$link[0]) = $this->displayAttribute("crm_customer_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("traveler_group_type_id",false, $lang);
               list($data[2],$link[2]) = $this->displayAttribute("group_num",false, $lang);
               
               return implode("-",$data);
        } 


        public function getDisplay($lang="ar")
        {
               if($this->getVal("traveler_group_name")) return $this->getVal("traveler_group_name");
               $data = array();
               $link = array();
               

               list($data[0],$link[0]) = $this->displayAttribute("crm_customer_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("traveler_group_type_id",false, $lang);
               list($data[2],$link[2]) = $this->displayAttribute("group_num",false, $lang);
               list($data[3],$link[3]) = $this->displayAttribute("traveler_type_id",false, $lang);
               list($data[4],$link[4]) = $this->displayAttribute("traveler_group_name",false, $lang);

               
               return implode(" - ",$data);
        }
        
        
        
        public function list_of_traveler_type_id() { 
            $list_of_items = array(); 
            $list_of_items[4] = "فراغ";  //     code : E 
            $list_of_items[2] = "نساء";  //     code : F 
            $list_of_items[1] = "رجال";  //     code : M 
            $list_of_items[5] = "الجميع";  //     code : T 
            $list_of_items[3] = "عوائل";  //     code : X 
           return  $list_of_items;
        } 



        
        protected function getOtherLinksArray($mode, $genereLog = false, $step="all")            
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             $otherLinksArray = array();
             $my_id = $this->getId();
             $displ = $this->getDisplay($lang);
             
             if($mode=="mode_travelerList")
             {
                   unset($link);
                   $link = array();
                   $title = "إضافة مسافر جديد";
                   $title_detailed = $title ."لـ : ". $displ;
                   $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=Traveler&currmod=btb&sel_traveler_group_id=$my_id";
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
                       // btb.traveler-مجموعة المسافرين	traveler_group_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("delete from ${server_db_prefix}btb.traveler where traveler_group_id = '$id' ");

                   
                   // FK not part of me - replaceable 

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 
                       // btb.traveler-مجموعة المسافرين	traveler_group_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("update ${server_db_prefix}btb.traveler set traveler_group_id='$id_replace' where traveler_group_id='$id' ");

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
             
}
?>