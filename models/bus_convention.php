<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_convention : bus_convention - اتفاقيات وقواعد لحجز الباصات 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class BusConvention extends BtbObject{

        public static $MY_ATABLE_ID=13771; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		orgunit_id => array(SHORTNAME => tcompany,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => ManyToOne,  READONLY => true, ),

		tbranch_id => array(SHORTNAME => tbranch,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => true,
                                WHERE=>"(parent_id = §orgunit_id§ or id = §orgunit_id§)",  
				RELATION => OneToMany,  READONLY => true, ),

		condition_num => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

		bus_company_id => array(SHORTNAME => company,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,
                                WHERE=>"id != §orgunit_id§ and parent_id = 0 and (work_service_mfk like '%,1,%' or work_service_mfk like '%,2,%')",
                                DEPENDENT_OFME=>array("bus_branch_id", "bus_id"),   
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => false,  
				RELATION => ManyToOne,  READONLY => false, ),

		bus_branch_id => array(SHORTNAME => branch,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => false,
                                WHERE=>"(id != §tbranch_id§) and (parent_id = §bus_company_id§ or id = §bus_company_id§) and (work_service_mfk like '%,1,%' or work_service_mfk like '%,2,%')",
                                DEPENDENCY=>bus_company_id,
                                DEPENDENT_OFME=>array("bus_id"),  
				RELATION => OneToMany,  READONLY => false, ),

		bus_id => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => bus,  ANSMODULE => btb,  AUTOCOMPLETE => false,
                                WHERE=>"(orgunit_id = §bus_company_id§ or orgunit_id = §bus_branch_id§) and active = 'Y' and publish = 'Y'",
                                DEPENDENCIES => array("bus_company_id","bus_branch_id"),  
				RELATION => OneToMany,  READONLY => false, ),

		city_mfk => array(SEARCH => false,  QSEARCH => false,  SHOW => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => MFK,  ANSWER => city,  ANSMODULE => pag,  READONLY => false, ),

		distance_max => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
                                TYPE => "INT",  READONLY => false, ),
                                
                expiry_date => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 10,  MAXLENGTH => 10,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => false, ),

                /*
		start_date => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  FORMAT => HIJRI_UNIT,  UTF8 => false,  
				TYPE => "DATE",  READONLY => false, ),

		end_date => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  FORMAT => HIJRI_UNIT,  UTF8 => false,  
				TYPE => "DATE",  READONLY => false, ),
                
		start_gdate => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "GDAT",  READONLY => false, ),

		end_gdate => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "GDAT",  READONLY => false, ),
                * /
		comment => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 255,  MAXLENGTH => 255,  "MIN-SIZE" => 10,  CHAR_TEMPLATE => "ALL",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

                
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
		parent::__construct("bus_convention","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "orgunit_id, tbranch_id, condition_num";
                $this->horizontalTabs = true;
                 
                
                $this->UNIQUE_KEY = array('orgunit_id','tbranch_id','condition_num');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->after_save_edit = array("class"=> 'WorkBranch',"attribute"=>'tbranch_id', "currmod"=> 'btb',"currstep"=>6);
	}
        
        public static function loadById($id)
        {
           $obj = new BusConvention();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($orgunit_id, $tbranch_id, $condition_num,$create_obj_if_not_found=false)
        {
           $obj = new BusConvention();
           if(!$orgunit_id) throw new AfwRuntimeException("loadByMainIndex : orgunit_id is mandatory field");
           if(!$tbranch_id) throw new AfwRuntimeException("loadByMainIndex : tbranch_id is mandatory field");
           if(!$condition_num) throw new AfwRuntimeException("loadByMainIndex : condition_num is mandatory field");


           $obj->select("orgunit_id",$orgunit_id);
           $obj->select("tbranch_id",$tbranch_id);
           $obj->select("condition_num",$condition_num);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("orgunit_id",$orgunit_id);
                $obj->set("tbranch_id",$tbranch_id);
                $obj->set("condition_num",$condition_num);

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
               

               list($data[0],$link[0]) = $this->displayAttribute("orgunit_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("tbranch_id",false, $lang);
               list($data[2],$link[2]) = $this->displayAttribute("condition_num",false, $lang);

               
               return implode(" - ",$data);
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
        
        public function isRelatedToBus($bus_id)
        {
                return (($bus_id==0) or ($this->bus_id == $bus_id));
        }
             
}
?>