<?php
                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class TravelProgram extends BtbObject{

       public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(

                id => array(SHOW => true, RETRIEVE => true, EDIT => false, TYPE => PK),

		travel_program_name => array(FGROUP=>travel_props, SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  MINIBOX =>true, 
				EDIT => true,  QEDIT => true,  
				SIZE => 48,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

                trips_nb => array(FGROUP=>travel_props, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false, CSS => width_pct_50,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),


                depart_city_id => array('STEP' =>2, SHORTNAME => city,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,
				SIZE => 40,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,  
                                WHERE=>"avail='Y'",  
				RELATION => ManyToOne,  READONLY => false, ),
 
		city1_id => array('STEP' =>2, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 40,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,  
                                WHERE=>"avail='Y'",  
				RELATION => ManyToOne,  READONLY => false, ),
 
		city2_id => array('STEP' =>2, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,  
                                WHERE=>"avail='Y'",  
				RELATION => ManyToOne,  READONLY => false, ),
 
		city3_id => array('STEP' =>2, SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 40,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  AUTOCOMPLETE => false,  
                                WHERE=>"avail='Y'",  
				RELATION => ManyToOne,  READONLY => false, ),

                full_distance => array('STEP' => 5, FGROUP=>trip1,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 64,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  UNIT => "كم",  READONLY => false, ),


                active => array(FGROUP=>options, "SHOW-ADMIN" => true, RETRIEVE => false, EDIT => true, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
        );
	
	*/ public function __construct(){
		parent::__construct("travel_program","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "travel_program_name";
                $this->ORDER_BY_FIELDS = "travel_program_name";
                $this->horizontalTabs = true; 
                
                $this->UNIQUE_KEY = array('travel_program_name');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
	}
        
        public static function loadById($id)
        {
           $obj = new TravelProgram();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        public function getDisplay($lang="ar")
        {
               if($this->getVal("travel_program_name")) return $this->getVal("travel_program_name");
               $data = array();
               $link = array();
 
 
               list($data[0],$link[0]) = $this->displayAttribute("depart_city_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("city1_id",false, $lang);
               list($data[2],$link[2]) = $this->displayAttribute("city2_id",false, $lang);
               list($data[3],$link[3]) = $this->displayAttribute("city3_id",false, $lang);
               if(!$data[2]) unset($data[2]);
               if(!$data[3]) unset($data[3]);
 
 
               return implode(" ",$data);
        }
        
        public static function loadByMainIndex($depart_city_id, $city1_id, $city2_id, $city3_id, $trips_nb, $full_distance, $create_obj_if_not_found=false)
        {
           $obj = new TravelProgram();
 
 
           $obj->select("depart_city_id",$depart_city_id);
           $obj->select("city1_id",$city1_id);
           $obj->select("city2_id",$city2_id);
           $obj->select("city3_id",$city3_id);
 
           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                $obj->set("trips_nb",$trips_nb);
                $obj->set("full_distance",$full_distance);
                
                $obj->genereName();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("depart_city_id",$depart_city_id);
                $obj->set("city1_id",$city1_id);
                $obj->set("city2_id",$city2_id);
                $obj->set("city3_id",$city3_id);
                $obj->set("trips_nb",$trips_nb);
                $obj->set("full_distance",$full_distance);
                $obj->genereName();
                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
 
        }
        
        public function attributeIsApplicable($attribute)
        {
              for($i=1;$i<=3;$i++)
              {
                      if($attribute=="city${i}_id") 
                      {
                          return (intval($this->getVal("trips_nb"))>$i) ;
                      }
              }
              
              return true;
         }
         
         public function genereName()
         {
               $data = array();
               $link = array();
               
               $trips_nb = intval($this->getVal("trips_nb"));
               list($data[],$link[]) = $this->displayAttribute("depart_city_id",false, $lang);
               
               if($trips_nb>1) list($data[],$link[]) = $this->displayAttribute("city1_id",false, $lang);
               if($trips_nb>2) list($data[],$link[]) = $this->displayAttribute("city2_id",false, $lang);
               if($trips_nb>3) list($data[],$link[]) = $this->displayAttribute("city3_id",false, $lang);
 
 
               $this->set("travel_program_name", implode("-",$data));
         
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
        
         
        
}

?>