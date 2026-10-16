<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table traveler_distribution : traveler_distribution - طرق توزيع المسافرين 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class TravelerDistribution extends BtbObject{

        public static $MY_ATABLE_ID=13736; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		tcompany_id => array(SHORTNAME => tcompany,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 40,  MANDATORY => true,  UTF8 => false,  
                                TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => false,  
				RELATION => ManyToOne,  READONLY => false, ),

		traveler_distribution_name => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 48,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		front_traveler_type_id => array(SHORTNAME => traveler_type,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => traveler_type,  ANSMODULE => btb,  
				RELATION => ManyToOne,  READONLY => false, ),

		front_rows_nb => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

		back_traveler_type_id => array(SHORTNAME => traveler_type,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => traveler_type,  ANSMODULE => btb,  
				RELATION => ManyToOne,  READONLY => false, ),

		back_rows_nb => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

                
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
		parent::__construct("traveler_distribution","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "traveler_distribution_name";
                $this->ORDER_BY_FIELDS = "tcompany_id, traveler_distribution_name";
                 
                
                $this->UNIQUE_KEY = array('tcompany_id','traveler_distribution_name');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
	}
        
        public static function loadById($id)
        {
           $obj = new TravelerDistribution();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($tcompany_id, $traveler_distribution_name,$create_obj_if_not_found=false)
        {
           $obj = new TravelerDistribution();
           if(!$tcompany_id) throw new AfwRuntimeException("loadByMainIndex : tcompany_id is mandatory field");
           if(!$traveler_distribution_name) throw new AfwRuntimeException("loadByMainIndex : traveler_distribution_name is mandatory field");


           $obj->select("tcompany_id",$tcompany_id);
           $obj->select("traveler_distribution_name",$traveler_distribution_name);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("tcompany_id",$tcompany_id);
                $obj->set("traveler_distribution_name",$traveler_distribution_name);

                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }


        public function getDisplay($lang="ar")
        {
               if($this->getVal("traveler_distribution_name")) return $this->getVal("traveler_distribution_name");
               $data = array();
               $link = array();
               

               list($data[0],$link[0]) = $this->displayAttribute("tcompany_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("traveler_distribution_name",false, $lang);

               
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
             
}
?>