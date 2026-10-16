<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table yperiod : yperiod - الفترات السنوية 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class Yperiod extends BtbObject{

        public static $MY_ATABLE_ID=13786; 


 // lookup Value List codes 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => false, TYPE => PK),

		
		work_branch_id => array(SHORTNAME => branch,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true, ),

		yperiod_code => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => 128,  MAXLENGTH => 128,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ALPHABETIC,SPACE",  REQUIRED => false,  UTF8 => false,  
				TYPE => "TEXT",  READONLY => true, ),

		lookup_code => array("TYPE" => "TEXT", "SHOW" => true, "RETRIEVE"=>true, "EDIT" => true, "SIZE" => 64, "QEDIT" => true, SHORTNAME=>code, CSS => width_pct_50),

		yperiod_name_ar => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true, CSS => width_pct_50,  
				EDIT => true,  QEDIT => true,  
				SIZE => 128,  MAXLENGTH => 128,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

                active => array(SHOW => true, RETRIEVE => false, EDIT => true, CSS => width_pct_50, QEDIT => true, "DEFAULT" => Y, TYPE => YN),

		hijri_year => array(SHORTNAME=>hijri, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "YN", "DEFAULT" => "Y",  READONLY => false, ),

		yperiod_specs => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => "AREA",  MAXLENGTH => 255,  "MIN-SIZE" => 1,  CHAR_TEMPLATE => "ALPHABETIC,BRACKETS,MATH-SYMBOLS,NUMERIC,OTHER-SYMBOLS",  REQUIRED => true,  UTF8 => false,  
				TYPE => "TEXT", "DEFAULT" => "0101=>1229",  READONLY => false, ),

		yperiod_desc_ar => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false, CSS => width_pct_50,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => "AREA",  MAXLENGTH => 32,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => ",ARABIC-CHARS,NUMERIC,SPACE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),


                hijri_from => array(SHORTNAME=>from, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  CATEGORY => "FORMULA", CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "DATE", "VALUE-NO-FORMAT"=>true, FORMAT=>"CONVERT_NASRANI_2LINES", HIJRI_UNIT=>true, READONLY => true, ),

                hijri_to => array(SHORTNAME=>to, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  CATEGORY => "FORMULA", CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => "DATE", "VALUE-NO-FORMAT"=>true, FORMAT=>"CONVERT_NASRANI_2LINES", HIJRI_UNIT=>true,  READONLY => true, ),

                
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                draft => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => true, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("yperiod","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "yperiod_name_ar";
                $this->ORDER_BY_FIELDS = "lookup_code";
                $this->horizontalTabs = true;
                $this->IS_LOOKUP = true; 
                $this->ignore_insert_doublon = true;
                $this->UNIQUE_KEY = array('lookup_code');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->after_save_edit = array("class"=> 'WorkBranch',"attribute"=>'work_branch_id', "currmod"=> 'btb',"currstep"=>10);
	}
        
        public static function loadById($id)
        {
           $obj = new Yperiod();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($lookup_code,$create_obj_if_not_found=false)
        {
           $obj = new Yperiod();
           if(!$lookup_code) throw new AfwRuntimeException("loadByMainIndex : lookup_code is mandatory field");


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
               

               list($data["ar"],$link["ar"]) = $this->displayAttribute("yperiod_name_ar",false, $lang);

               
               return $data[$lang];
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
                       // btb.bus_pricing-الفترة السنوية	yperiod_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus_pricing set yperiod_id='$id_replace' where yperiod_id='$id' ");

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 
                       // btb.bus_pricing-الفترة السنوية	yperiod_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus_pricing set yperiod_id='$id_replace' where yperiod_id='$id' ");

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
        
        public function getFromTo()
        {        
            list($date_from, $date_to) = explode("=", $this->getVal("yperiod_specs"));
            $date_from = trim($date_from, ">");
            $date_from = trim($date_from, "<");
                
            $date_to = trim($date_to, ">");
            $date_to = trim($date_to, "<");
                
            if($this->estHijri())
            {
                $hijri_year = substr(AfwDateHelper::currentHijriDate(), 0, 4);
                $date_to_old = $date_to;
                if(!$date_from) $date_to = "0101";
                if(!$date_to) $date_to = "1229";
                $date_to = $hijri_year.$date_to;
                // die("$date_to = $hijri_year . $date_to_old");
                
                $date_from = $hijri_year.$date_from;
                
            }
            else
            {
                $greg_year = date("Y-");
                $date_to_old = $date_to;
                if(!$date_from) $date_to = "01-01";
                if(!$date_to) $date_to = "12-31";
                $date_to = AfwDateHelper::to_hijri($greg_year.$date_to);
                // die("$date_to = to_hijri($greg_year . $date_to_old);");
                $date_from = AfwDateHelper::to_hijri($greg_year.$date_from);
            }
            
            return array($date_from, $date_to);
            
        }
        
        public function calcHijri_from()
        {
             list($date_from, $date_to) = $this->getFromTo();
             return $date_from; 
        }
        
        public function calcHijri_to()
        {
             list($date_from, $date_to) = $this->getFromTo();
             return $date_to; 
        }    
        
        public function contain($hdate)
        {
            list($date_from, $date_to) = $this->getFromTo(); 
            return (($date_from<=$hdate) and ($date_to>=$hdate));
        }
        
        public static function getLocalHoliday($hdate, $work_branch_id, $ypList)
        {
              $lang = AfwLanguageHelper::getGlobalLanguage();
              if(($ypList===null) or (!isset($ypList)) or (!is_array($ypList)))
              {
                      $yp = new Yperiod();
                      $yp->where("active = 'Y' and work_branch_id in (0,$work_branch_id)");
                      $ypList = $yp->loadMany();
              }
                      
              foreach($ypList as $ypItem)
              {
                    if($ypItem->contain($hdate)) return array(2, $ypItem->getId(), $ypItem->getDisplay($lang), $ypList);
              }
              
              return array(1, 0, "فترة عادية", $ypList);
              
              
        }
             
}
?>