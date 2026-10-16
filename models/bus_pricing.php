<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_pricing : bus_pricing - أسعار الباصات 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class BusPricing extends BtbObject{

        public static $MY_ATABLE_ID=13785; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		bus_id => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true, SHORTNAME => bus, 
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => bus,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true,  DNA => true, ),

		travel_program_id => array(SHORTNAME => program,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => travel_program,  ANSMODULE => btb,  
				RELATION => ManyToOne,  READONLY => true, ),

		days_nb => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => false,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

                program_title  => array(SHOW => true, EDIT => true,  QEDIT => true,  READONLY => true, MANDATORY => true, CATEGORY => FORMULA,  TYPE => TEXT),

		week_period_enum => array(SHORTNAME => period,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => false,  UTF8 => false,  
				TYPE => ENUM,  ANSWER => "FUNCTION",  READONLY => true,  "EDIT-SHORT-LIST" => true, ),
                  
		period_type_enum => array(SHORTNAME => type,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => false,  UTF8 => false,  
				TYPE => ENUM,  ANSWER => "FUNCTION",  READONLY => true,  "EDIT-SHORT-LIST" => true, ),

		yperiod_id => array(SHORTNAME => yperiod,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => FK,  ANSWER => yperiod,  ANSMODULE => btb,  
				RELATION => ManyToOne,  READONLY => true, ),
                
                period_title  => array(SHOW => true, EDIT => true,  QEDIT => true,  READONLY => true, MANDATORY => true, CATEGORY => FORMULA,  TYPE => TEXT),

		'price' => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => "FLOAT",  UNIT => "ريال",  UNIT_EN => "SAR", FORMAT=>"*.2" ,  READONLY => false, ),

                
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
		parent::__construct("bus_pricing","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "bus_id, travel_program_id, days_nb, week_period_enum, period_type_enum, yperiod_id";
                $this->horizontalTabs = true;
                 
                
                $this->UNIQUE_KEY = array('bus_id','travel_program_id','days_nb','week_period_enum','period_type_enum','yperiod_id');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
	}
        
        public function list_of_week_period_enum() { 
            $list_of_items = array(); 
            $list_of_items[1] = "ويكاند";
            $list_of_items[2] = "وسط الأسبوع";
             
           return  $list_of_items;
        }
        
        public function list_of_period_type_enum() { 
            $list_of_items = array(); 
            $list_of_items[1] = "فترة عادية";
            $list_of_items[2] = "فترة موسمية";
             
           return  $list_of_items;
        }
        
        public static function loadById($id)
        {
           $obj = new BusPricing();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($bus_id, $travel_program_id, $days_nb, $week_period_enum, $period_type_enum, $yperiod_id,$create_obj_if_not_found=false)
        {
           $obj = new BusPricing();
           if(!$bus_id) throw new AfwRuntimeException("loadByMainIndex : bus_id is mandatory field");
           if(!$travel_program_id) throw new AfwRuntimeException("loadByMainIndex : travel_program_id is mandatory field");
           if(!$days_nb) throw new AfwRuntimeException("loadByMainIndex : days_nb is mandatory field");
           //if(!$week_period_enum) throw new AfwRuntimeException("loadByMainIndex : week_period_enum is mandatory field");
           //if(!$period_type_enum) throw new AfwRuntimeException("loadByMainIndex : period_type_enum is mandatory field");


           $obj->select("bus_id",$bus_id);
           $obj->select("travel_program_id",$travel_program_id);
           $obj->select("days_nb",$days_nb);
           $obj->select("week_period_enum",$week_period_enum);
           $obj->select("period_type_enum",$period_type_enum);
           $obj->select("yperiod_id",$yperiod_id);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("bus_id",$bus_id);
                $obj->set("travel_program_id",$travel_program_id);
                $obj->set("days_nb",$days_nb);
                $obj->set("week_period_enum",$week_period_enum);
                $obj->set("period_type_enum",$period_type_enum);
                $obj->set("yperiod_id",$yperiod_id);

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
               

               list($data[0],$link[0]) = $this->displayAttribute("bus_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("travel_program_id",false, $lang);
               list($data[2],$link[2]) = $this->displayAttribute("days_nb",false, $lang);
               list($data[3],$link[3]) = $this->displayAttribute("week_period_enum",false, $lang);
               list($data[4],$link[4]) = $this->displayAttribute("period_type_enum",false, $lang);
               list($data[5],$link[5]) = $this->displayAttribute("yperiod_id",false, $lang);

               
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
        
  
               
               
               
        public function calcProgram_title()
        {
           $lang = AfwLanguageHelper::getGlobalLanguage();
              list($travel_program,$link) = $this->displayAttribute("travel_program_id",false, $lang);
              $days_nb = $this->getVal("days_nb");
              if($days_nb==1) $days_nb_title = "يوم واحد";
              if($days_nb==2) $days_nb_title = "يومين";
              if($days_nb>=3) $days_nb_title = "$days_nb أيام";
              return $travel_program."-".$days_nb_title;
        }
        
        public function calcPeriod_title()
        {
            $lang = AfwLanguageHelper::getGlobalLanguage();
            
              $data = [];
              $link = [];
              
              list($data[],$link[]) = $this->displayAttribute("week_period_enum",false, $lang);
              list($data[],$link[]) = $this->displayAttribute("period_type_enum",false, $lang);
              //list($data[],$link[]) = $this->displayAttribute("yperiod_id",false, $lang);
              return implode("-",$data);
        }

        public function afterMaj($id, $fields_updated) 
        {
                $objBus = $this->bus;
                if($objBus) 
                {
                      // inform the bus that this bus pricing item has been changed
                      $objBus->triggerPricingItemChanged($this, $fields_updated);  

                }
        }
             
}
?>