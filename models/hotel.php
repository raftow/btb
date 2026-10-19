<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table hotel : hotel - الفنادق 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class Hotel extends BtbObject{

        private $my_hotel_pricing_matrix = array();

        public static $MY_ATABLE_ID=13777; 

        // external_photo - صورة خارجية  
        public static $doc_type_external_photo = 15; 
 
        // internal_photo - صورة داخلية  
        public static $doc_type_internal_photo = 16; 
 
        // small_photo - صورة تعريفية  
        public static $doc_type_small_photo = 12;
        
        public static $MAKKA = 101;
        
        public static $MADINA = 201; 

 // lookup Value List codes 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => false, TYPE => PK),

		country_id => array(SHORTNAME => country,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => country,  ANSMODULE => pag,  AUTOCOMPLETE => false, "DEFAULT"=>183, 
				RELATION => ManyToOne,  READONLY => true, ),

		work_branch_id => array(SHORTNAME => branch,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => false,  
				RELATION => OneToMany,  READONLY => true, ),

		city_id => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => city,  ANSMODULE => pag,  
				RELATION => ManyToOne,  READONLY => false, ),

		name_ar => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => 128,  MAXLENGTH => 128,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		stars => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  CSS=>width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, FORMAT=>"DROPDOWN:1:5:1"),

                satisfaction => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 64,  MANDATORY => true,  UTF8 => false,  
				TYPE => "PCTG",  UNIT => "%",  READONLY => false, "DEFAULT"=>0, ),
                                
		desc_ar => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => "AREA",  MAXLENGTH => 32,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		location => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 255,  MAXLENGTH => 32,  CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),
                
		distance => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_33,  
				SIZE => 64,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  UNIT => "متر",  "DEFAULT"=>0, READONLY => false, ),
                
                dragDropDiv => array('STEP' => 2,  TYPE => TEXT, CATEGORY => FORMULA, SHOW=>true, EDIT => true,  READONLY => true,  "CAN-BE-SETTED" => false,  
                                               SIZE=>255, "NO-LABEL"=>true, INPUT_WIDE=>true),
                
                hotelFileList => array('STEP' => 3,  SHORTNAME => files,  SHOW => true,  FORMAT => retrieve,  ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => true, INPUT_WIDE=>true,  QEDIT => false,  
				SIZE => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK, "EMPTY-ITEMS-MESSAGE" => "no-hotel-file", 
				CATEGORY => ITEMS,  ANSWER => hotel_file,  ANSMODULE => btb,  ITEM => "hotel_id",  READONLY => true,  "CAN-BE-SETTED" => false, ),
        
                        ul_cl_files => array('STEP' => 3, SIZE => 255,  SHOW=> false, CATEGORY => FORMULA, TYPE => TEXT,  "NO-LABEL"=>true, ),                                          
                
                        
                        photo  => array('STEP' => 99, SHOW => false,  EDIT => false,  READONLY => true, MINIBOX =>false, CSS => width_pct_50, MANDATORY => false,     
			                       CATEGORY => FORMULA,  TYPE => FK, ANSWER => hotel_file,  ANSMODULE => btb ),

                        photo_path => array('STEP' => 3, TYPE => TEXT, 
                                          CATEGORY => SHORTCUT, SHORTCUT=>"photo.workflow_file_id.file_path",
                                          "DEFAULT"=>"pic/default_hotel_photo.png",
                                          "CAN-BE-SETTED"=>false,"NO-COTE"=>true,),
                
                floors_spec => array('STEP' => 4, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => AREA,  ROWS=>2, CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, INPUT_WIDE=>true, ),                

                rooms_spec => array('STEP' => 4, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => AREA,  ROWS=>3, CHAR_TEMPLATE => "",  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, INPUT_WIDE=>true, ),                

		roombed_men => array('STEP' => 4, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => false,  UTF8 => false,  
				TYPE => MENUM,  ANSWER => "FUNCTION",  READONLY => false,  "EDIT-SHORT-LIST" => true, ),

		week_period_men => array('STEP' => 4, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => false,  UTF8 => false,  
				TYPE => MENUM,  ANSWER => "FUNCTION",  READONLY => false,  "EDIT-SHORT-LIST" => true, ),
                  
		period_type_men => array('STEP' => 4, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => false,  UTF8 => false,  
				TYPE => MENUM,  ANSWER => "FUNCTION",  READONLY => false,  "EDIT-SHORT-LIST" => true, ),


                roomList => array('STEP' => 5, SHORTNAME => rooms,  SHOW => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  FORMAT => custom, CUSTOM_FORMAT => showRoomsFloors,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  
				CATEGORY => ITEMS,  ANSWER => hroom,  ANSMODULE => btb,  ITEM => "hotel_id",  READONLY => true, ),
                
                hotelPricingList => array('STEP' => 6, TYPE => FK, ANSWER => hotel_pricing, ANSMODULE => btb, CATEGORY => ITEMS, ITEM => 'hotel_id', 
                                   FORMAT => crossed, CROSS_COL=>roombed_enum, CROSSED_FIELD_COL => period_title, CROSSED_VALUE_COL =>price,
                                   WHERE=>'', SHOW => true, EDIT => true, READONLY=> true, ICONS=>true, 'DELETE-ICON'=>true, BUTTONS=>true, "NO-LABEL"=>false),
                
                booking_infos => array('STEP' => 7, SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => AREA, ROWS => 3,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

                travelHotelList => array('STEP' => 8,  SHORTNAME => travelHotels,  SHOW => true,  FORMAT => retrieve,  ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => false,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  
				CATEGORY => ITEMS,  ANSWER => travel_hotel,  ANSMODULE => btb,  ITEM => "hotel_id",  
                                WHERE => "(booking_needed='N' or booked='Y') and opened = 'Y' and closed='N'",
                                READONLY => true,  "CAN-BE-SETTED" => true, ),
                                                
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                active => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => true, QEDIT => true, "DEFAULT" => Y, TYPE => YN, CSS => width_pct_33),
                draft => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => true, QEDIT => true, "DEFAULT" => Y, TYPE => YN, CSS => width_pct_33),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("hotel","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "name_ar";
                $this->ORDER_BY_FIELDS = "work_branch_id, country_id, city_id, name_ar";
                $this->horizontalTabs = true;
                $this->IS_LOOKUP = true; 
                $this->ignore_insert_doublon = true;
                $this->UNIQUE_KEY = array('work_branch_id','country_id','city_id','name_ar');
                
                $this->editByStep = true;
                $this->editNbSteps = 8;
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->public_display = true;
                $this->after_save_edit = array("class"=> 'WorkBranch',"attribute"=>'work_branch_id', "currmod"=> 'btb',"currstep"=>8);
                /*
                $btr_html = _back_trace();
                global $Hotel_construcotr_counter;
                if(!$Hotel_construcotr_counter) $Hotel_construcotr_counter = 0;
                $Hotel_construcotr_counter++;
                $this->logHzm("", "Hotel", "Hotel::construcotr[$Hotel_construcotr_counter] : <br>".$btr_html);
                */
	}
        
        public static function loadById($id)
        {
           $obj = new Hotel();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        public function score()
        {
           $stars = intval($this->getVal("stars"));
           $satisfaction = floatval($this->getVal("satisfaction"));
           
           $return = ($stars * $satisfaction / 5.0);
           
           return $return;
        
        }
        
        public function list_of_roombed_men() { 
            $list_of_items = array(); 
            $list_of_items[1] = "سرير عزابي";
            $list_of_items[2] = "غرفة سريرين";
            $list_of_items[3] = "غرفة 3 سراير";
            $list_of_items[4] = "غرفة 4 سراير";
            $list_of_items[5] = "غرفة 5 سراير";
            $list_of_items[6] = "جناح 6 سراير";
             
           return  $list_of_items;
        }
        
        public function hasRoomSize($room_size)
        {
                 $roombed_men = $this->getVal("roombed_men");
                 $roombed_men_arr = explode(",",trim($roombed_men,","));
                 
                 foreach($roombed_men_arr as $roombed_enum)
                 {
                     if($room_size==$roombed_enum) return true;
                 }
                 
                 return false;

        
        }
        
        public function list_of_week_period_men() { 
            $list_of_items = array(); 
            $list_of_items[1] = "ويكاند";
            $list_of_items[2] = "وسط الأسبوع";
             
           return  $list_of_items;
        }
        
        public function list_of_period_type_men() { 
            $list_of_items = array(); 
            $list_of_items[1] = "فترة عادية";
            $list_of_items[2] = "فترة موسمية";
             
           return  $list_of_items;
        }
        
        public static function loadByMainIndex($work_branch_id, $country_id, $city_id, $name_ar,$create_obj_if_not_found=false)
        {
           $obj = new Hotel();
           if(!$work_branch_id) throw new AfwRuntimeException("loadByMainIndex : work_branch_id is mandatory field");
           if(!$country_id) throw new AfwRuntimeException("loadByMainIndex : country_id is mandatory field");
           if(!$city_id) throw new AfwRuntimeException("loadByMainIndex : city_id is mandatory field");
           if(!$name_ar) throw new AfwRuntimeException("loadByMainIndex : name_ar is mandatory field");


           $obj->select("work_branch_id",$work_branch_id);
           $obj->select("country_id",$country_id);
           $obj->select("city_id",$city_id);
           $obj->select("name_ar",$name_ar);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("work_branch_id",$work_branch_id);
                $obj->set("country_id",$country_id);
                $obj->set("city_id",$city_id);
                $obj->set("name_ar",$name_ar);

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
               

               list($data[0],$link[0]) = $this->displayAttribute("city_id",false, $lang);
               list($data["ar"],$link["ar"]) = $this->displayAttribute("name_ar",false, $lang);
               $stars = intval($this->getVal("stars"));
               $stars_html = str_repeat("&starf;", $stars);
               
               return $data[$lang]." ".$stars_html;
        }
        
        
        public function isAlreadyBooked()
        {
           // @todo : need implementation
           return false;
        }

        
        protected function getOtherLinksArray($mode, $genereLog = false, $step="all")            
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             $otherLinksArray = $this->getOtherLinksArrayStandard($mode);
             $my_id = $this->getId();
             $displ = $this->getDisplay($lang);
             
             
             if(($mode=="mode_hotelFileList") and (!$this->isAlreadyBooked()))
             {
                   $hotelFileList = $this->get("hotelFileList");
                   if(count($hotelFileList)>0)
                   {
                           unset($link);
                           $my_id = $this->getId();
                           $link = array();
                           $title = "تحرير وتوظيف الصور";
                           $title_detailed = $title ." لهذا الباص : ". $displ;
                           $link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=HotelFile&currmod=btb&id_origin=$my_id&class_origin=Hotel&module_origin=btb&newo=-1&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=hotel_id=$my_id&sel_hotel_id=$my_id&return_mode=1&popup=1";
                           $link["TITLE"] = $title;
                           $link["UGROUPS"] = array();
                           $link["OWNER"] = true;
                           $otherLinksArray[] = $link;
                   }
             }
             
             if($mode=="mode_hotelPricingList")
             {
                   unset($link);
                   $link = array();
                   $title = "إدارة أسعار السكن ";
                   $title_detailed = $title ."لـ : ". $displ;
                   //$link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=HotelPricing&currmod=btb&id_origin=$my_id&class_origin=Hotel&module_origin=btb&newo=-1&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=hotel_id=$my_id&sel_hotel_id=$my_id&return_mode=1";
                   // CROSS_COL=>roombed_enum, CROSSED_FIELD_COL => period_title, CROSSED_VALUE_COL =>price,
                   // &newo=-1&limit=30
                   // &fixmdisable=1&fixm=hotel_id=$my_id
                   $link["URL"] = "main.php?Main_Page=afw_mode_crossed.php&cl=HotelPricing&currmod=btb&ccol=roombed_enum&cfield=period_title&cvalue=price&ids=all&id_origin=$my_id&class_origin=Hotel&module_origin=btb&fixmtit=$title_detailed&sel_hotel_id=$my_id&return_mode=1";
                   $link["TITLE"] = $title;
                   $link["UGROUPS"] = array();
                   $otherLinksArray[] = $link;
             }
             
             
             
             return $otherLinksArray;
        }
        
        
        
        
        public function afterUpdate($id, $fields_updated, $disableAfterCommitDBEvent = false) 
        {
           // ******
           $lang = AfwLanguageHelper::getGlobalLanguage();
           if($fields_updated["floors_spec"])
           {
               list($_SESSION["error"],$_SESSION["information"]) = $this->applyfloorsSpecs($lang);
           }
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
                       // btb.booking-الفندق	hotel_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.booking set hotel_id='$id_replace' where hotel_id='$id' ");

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 
                       // btb.booking-الفندق	hotel_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.booking set hotel_id='$id_replace' where hotel_id='$id' ");

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
        
        public function hasRoomTypeAvail($capacity)
        {
            if($this->getId()==1) return false;
            return true;
        }
        
        protected function getPublicMethods()
        {
            
            $pbms = array();
            
            $color = "green";
            $title_ar = "إنشاء آلي للغرف حسب المواصفات"; 
            $pbms["ah12yU"] = array("METHOD"=>"genereRooms","COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' => 4);
            
            $color = "green";
            $title_ar = "إعادة تطبيق مواصفات الأدوار"; 
            $pbms["asd14i"] = array("METHOD"=>"applyfloorsSpecs","COLOR"=>$color, "LABEL_AR"=>$title_ar, "PUBLIC"=>true, "BF-ID"=>"", 'STEP' => 4, );
            
            
            
            return $pbms;
        }
        
        public function genereRoomNums($rooms_spec, $room_size, $nb_rooms, $room_size_max="")
        {
            $lang = AfwLanguageHelper::getGlobalLanguage();
            //if(!$nb_rooms) $this->throwError("hotel::genereRoomNums(rooms_spec=$rooms_spec, room_size=$room_size, nb_rooms=$nb_rooms)")
            if(!$room_size_max) $room_size_max = $room_size + 1;
            if($room_size_max>6) $room_size_max = 6;
            $hotel_id = $this->getId();

            $file_dir_name = dirname(__FILE__); 
            // require_once("$file_dir_name/../btb/hroom.php");
            $new_rooms = 0; 
            $old_rooms = 0;
            $log_arr = array();
            $hroom_arr = array();
            
            $room_nums_arr = array();
            $room_reel_nums_arr = array();
            $room_reel_counter = 1;
            
            $rooms_spec = trim($rooms_spec);
            if($rooms_spec)
            {
                    $rooms_spec = str_replace("/", "\n", $rooms_spec);
                    $room_floors = explode("\n",$rooms_spec);
                    
                    foreach($room_floors as $room_floor)
                    {
                        list($floor_num, $room_nums) = explode(":", $room_floor);
                        if($floor_num and (!$room_nums))
                        {
                            $room_nums = $floor_num;
                            $floor_num = 0;  // ألدور الأرضي افتراضيا
                        }
                        $room_nums = str_replace('+', ' ', $room_nums); 
                        $room_blocs = explode(" ", $room_nums);
                        foreach($room_blocs as $room_bloc)
                        {
                            list($room_min, $room_max) = explode("-", $room_bloc);
                            if(!$room_max) $room_max = $room_min;
        
                            $room_min = intval($room_min);
                            $room_max = intval($room_max);
                            if($room_max<$room_min)
                            {
                                 // swap
                                 $tmp00 = $room_max;
                                 $room_max = $room_min;
                                 $room_min = $tmp00;
                            }
                            if($room_min and $room_max)
                            {
                                for($rnum=$room_min;$rnum<=$room_max;$rnum++)
                                {
                                     $room_reel_nums_arr[$room_reel_counter] = array("num"=>$rnum, "floor"=>$floor_num);
                                     $room_reel_counter++;  
                                }
                            }
                            else
                            {
                                $log_arr[] = $this->translateMessage("خطأ في مواصفات الغرف", $lang) . ":" . $room_bloc;
                            }
                            
                        }
                    }
            }
            
            if($nb_rooms>0)
            {
                  for($i=1;$i<=$nb_rooms;$i++)
                  {
                        $rnum = $room_size*100000+$i;
                        $floor_num = 0;
                        $room_nums_arr[$i] = array("num"=>$rnum, "floor"=>$floor_num); 
                  }
            }
            
            foreach($room_nums_arr as $ri => $room_nums_row)
            {
                       $rnum = $room_nums_row["num"];
                       $rnum_reel = $room_reel_nums_arr[$ri]["num"];
                       $floor_num = $room_reel_nums_arr[$ri]["floor"];
                       if(!$floor_num) $floor_num = $this->getFloorNumFromRoomNum($rnum_reel); 
                       if(!$floor_num) $floor_num = $room_nums_row["floor"];
                       
                       $hroom = Hroom::loadByMainIndex($hotel_id, $rnum, $floor_num, $create_obj_if_not_found=true);
                       if($hroom->is_new)
                       {
                           $new_rooms++;
                       }
                       else
                       {
                           $old_rooms++;
                       }
                       
                       $hroom->resetDefaults($room_size_max, $room_size, $rnum_reel); 
                       $hroom_arr[$hroom->getId()] = $hroom;
            }
            
            $log_arr[] = $this->translateMessage("غرف جديدة",$lang) . ":" . $new_rooms;
            $log_arr[] = $this->translateMessage("غرف سابقة",$lang) . ":" . $old_rooms;
            $log_arr[] = "============================================================";
            
            
            return array($hroom_arr, $log_arr);        
        }
        
        public function genereRooms($lang="ar")
        {
            $rooms_spec = $this->getVal("rooms_spec");
            $rooms_spec = str_replace("\n","\\",$rooms_spec);
            $rooms_spec = str_replace("*","\\",$rooms_spec);
            $rooms_spec = str_replace("|",":",$rooms_spec);
            $rooms_spec = str_replace("=",":",$rooms_spec);
            $rooms_spec_arr = explode("\\",$rooms_spec);
            $log = "انشاء غرف حسب المواصفات  التالية : ".$rooms_spec;
            foreach($rooms_spec_arr as $rooms_spec_item)
            {
                  list($rooms_spec_quantity, $rooms_spec_size, $rooms_spec_spec) = explode(":",$rooms_spec_item);
                  $rooms_spec_size = intval($rooms_spec_size);
                  $rooms_spec_size_max = $rooms_spec_size+2;
                  list($hroom_arr, $log_arr) = $this->genereRoomNums(trim($rooms_spec_spec),$rooms_spec_size, $rooms_spec_quantity, $rooms_spec_size_max);    
                  $log .= "\n<br>".implode("\n<br>",$log_arr);
            }
            
            return array("",$log);
        }
        
        public function calcDragDropDiv()
        {
              global $MODULE, $module_config_token;
              
              $this_id = $this->getId();
              
              $file_dir_name = dirname(__FILE__); 
              
              
              
              
              list($ext_arr, $ft_arr) = DocType::getExentionsAllowed($module_config_token["file_types"]);
              $ext_list = implode(", ",$ext_arr);
              $ft_list = implode(", ",$ft_arr);
              
              
              $dtList = DocType::loadAll($module_config_token["file_types"]);
                
              $module_doc_types = array();
                
              foreach($dtList as $dtId => $dtObject)
              {
                     $module_doc_types[$dtId] = array('name' => $dtObject->getVal("titre_short"), 'mandatory' =>"لا", 'desc' => $dtObject->getVal("titre"), 'extentions' => $dtObject->getVal("extentions"));
              }
              
              $module_doc_types_header = array('name' => "صنف المستند", 'mandatory' =>"إجباري؟", 'desc' => "الوصف", 'extentions' => "أنواع الملفات المسموح بها");
              
              list($html_doc_types,  $f_ids) = AfwShowHelper::tableToHtml($module_doc_types, $module_doc_types_header);
              
               return "
                     </form>
                     <link href='../pag/assets/css/style.css' rel='stylesheet' />
                     <form id='upload' method='post' action='afw_my_upload.php' enctype='multipart/form-data'>
			<div id='drop'>
				اضغط على   [رفع الملفات] لاختيار الملف أو اسحب الملف مباشرة إلى هذه المنطقة لتحميله
                                <br>
				<a>رفع الملفات</a>
                                <input type='hidden' name='module' value='$MODULE' />
                                <input type='hidden' name='afup' value='htht' />
                                <input type='hidden' name='afup_objid' value='$this_id' />
				<input type='file' name='upl' multiple />
                                <br><br>
                                <div class='ft_h'>تفاصيل وشروط رفع المرفقات</div>
                                <div class='ft_table'>$html_doc_types</div>
                                <div class='fc_size'>جميع الملفات يجب ألا يتعدى حجمها <span>4</span> ميجابايت</div>
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul>

		</form>
                <!-- JavaScript Includes -->
		<script src='../pag/assets/js/jquery.knob.js'></script>

		<!-- jQuery File Upload Dependencies -->
		<script src='../pag/assets/js/jquery.ui.widget.js'></script>
		<script src='../pag/assets/js/jquery.iframe-transport.js'></script>
		<script src='../pag/assets/js/jquery.fileupload.js'></script>
		
		<!-- Our main JS file -->
		<script src='../pag/assets/js/script.js'></script>
                ";
        
        }
        
        public function attach_file($af)
        {
              $lang = AfwLanguageHelper::getGlobalLanguage();  
              $file_dir_name = dirname(__FILE__); 
              // require_once("$file_dir_name/../btb/hotel_file.php");
              
              $pfObj = HotelFile::loadByMainIndex($this->getId(), $af->getId(), $create_obj_if_not_found=true);
              $pfObj->set("description","[لم يتم إدخال عنوان مفسر للملف المرفق]");
              
              
              $doc_type_id = $af->getAvailableDocTypeId($this->getAvailableDocTypes());
              $pfObj->set("doc_type_id",$doc_type_id);
              // "تم تحميله من طرف ".$objme->getDisplay($lang)." بتاريخ ".date("d/m/Y")
              $pfObj->commit();

        }
        
        public function getAvailableDocTypes()
        {
            $doc_type_arr = array();
            // بترتيب الأولوية
            
            // صورة تعريفية   
            $pho = $this->getPhoto();
            if(!$pho or $pho->isEmpty()) $doc_type_arr[] = self::$doc_type_small_photo;
            
            // صورة داخلية
            $doc_type_arr[] = self::$doc_type_internal_photo;

            // صورة خارجية  
            $doc_type_arr[] = self::$doc_type_external_photo;
            
            return $doc_type_arr;
        }
        
        public function calcPhoto()
        {
             return $this->getAttachedFileWithType(self::$doc_type_small_photo);
        }

        public function getMainPhoto()
        {
                $hfObj = $this->calcPhoto();
                if($hfObj) $preview = $hfObj->preview();
                else $preview = "[no-main-photo]";
                return "<div class='my_main_photo'>". $preview."</div>";   
        }
        
        
        public function calcPhotoGalery($maxPhoto=4, $put_default_photo=false, $dont_repeat_photo=false, $already_photos_arr=array(), $galery_css="gallery-items", $img_style="width: 320px; height:auto;")
        {
                list($photoPathList, $title_arr) = $this->getPhotoPathList();
                $hotelObjId = $this->getId();
                
                $photo_num = 0;
                $intrnal_html = "";
                $fleft = "";
                foreach($photoPathList as $pp => $photoPath)
                {
                        if((!$dont_repeat_photo) or (!$already_photos_arr[$photoPath]))
                        {
                                $already_photos_arr[$photoPath] = true;
                                $photo_title = $title_arr[$pp];
                                if($photoPath)
                                {
                                        $photo_num++;
                                        $intrnal_html .= "<div class='btb_photo cf $fleft'><img class='$galery_css' title='$photo_title' data-high-res-src='$photoPath' src='$photoPath'  style='$img_style'></div>";
                                
                                }
                                elseif($put_default_photo)
                                {
                                        $intrnal_html .= "<div class='btb_photo $fleft'><img src='pic/default_hotel_photo.png'  style='width: 320px; height:auto;'></div>";
                                }
                                if(!$fleft) $fleft = "fleft";
                                else $fleft = "";
                        }
                        else
                        {
                        
                        }
                        if($photo_num==$maxPhoto) break;
                }
                $galHtml = "<div class='photo44_galery cf items$photo_num'>";
                $galHtml .= $intrnal_html;
                $galHtml .= "</div><div id='overlay'></div>";
                
                
                if(!$dont_repeat_photo) return $galHtml;
                else return array($galHtml, $already_photos_arr);
        }
        
        public function getAttachedFileWithType($type)
        {
            $file_dir_name = dirname(__FILE__); 
            // require_once("$file_dir_name/../btb/hotel_file.php");
            $pfObj = new HotelFile();
            $pfObj->select("hotel_id",$this->getId());
            $pfObj->select("doc_type_id",$type);
            
            $pfObj->load();
            
            return $pfObj;
        }
        
        public function getPhotoPathList()
        {
                $hotelFileList = $this->get("hotelFileList");
                $photo_path_arr = array();
                $title_arr = array();
                foreach($hotelFileList as $hotelFileItem)
                {
                        
                        // doc_type_id != 17 means do not show maps pictures
                        if($hotelFileItem and $hotelFileItem->getVal("doc_type_id") != 17)
                        { 
                                $photoFile = $hotelFileItem->het("workflow_file_id");
                                if($photoFile) 
                                {
                                        $photo_path_arr[] = $photoFile->getVal("file_path");
                                        $title_arr[] = $hotelFileItem->getVal("description");
                                }
                        }                   
                }
                
                return array($photo_path_arr, $title_arr);
        }
        
        public function getMyCLStep()
        {
           return "wizardv1_li";   // return "wizard1";
        }
        
        
        public function getWizardStepsClass()
        {
          return "steps_wizardv1 clearfix";   // return "hzmSteps";
        }
        
        public function getStepLiContentHtml($step_num,$step_name)
        {
            return "<span class=\"number\">${step_num}.</span> ${step_name}";
        }
        
        public function getWizardClass()
        {
            return "wizardv1";
        }
        
        public function getFieldGroupInfos($fgroup)
        {
           /*
           if($fgroup=="param1") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="param2") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="param3") return array("name"=>$fgroup, "css"=>"pct_50");
           if($fgroup=="conds") return array("name"=>$fgroup, "css"=>"pct_50");
           */  
           
           return array("name"=>$fgroup, "css"=>"none");
        }
        
        /**
         *
         *  The method getFreeRooms try to find free rooms with size = $room_size for the period [$arrival_date, $leave_date]
         *  when the number of rooms reach the limit $limit we break the search operation,
         *  
         *
         **/
        
        
        
        public function getFreeRooms($arrival_date, $leave_date, $room_size, $work_branch_id, $travel_id, $book = false, $limit=5, $room_size_exact=true)
        {
            $fail_counter = 0;
            $fail_log = array();
            $hotel_id = $this->getId();
            
            $file_dir_name = dirname(__FILE__); 
            // require_once("$file_dir_name/../btb/travel_hotel.php");
            $thObj = TravelHotel::loadByMainIndex($hotel_id, $travel_id, $create_obj_if_not_found=false);
            //dd("thObj = TravelHotel::loadByMainIndex($hotel_id, $travel_id) => ",$thObj);
            
            // اللهم أعني على ذكرك وشكرك وحسن عبادتك
            
            $travel_hotel_id = $thObj->getId();
            
            if($thObj and ($thObj->bookedTemporary() or (!$book))) 
            {
                $travel_hotel_id = $thObj->getId();
                if((!$this->hotelRoomList) or (!count($this->hotelRoomList)))
                { 
                    if($room_size_exact) $where = "capacity_default = $room_size";
                    else $where = "$room_size between capacity_default and capacity_max";
                    
                    $this->hotelRoomList = $this->relRooms()->resetWhere($where)->getList();
                }
            }
            else
            {
                $travel_hotel_id = 0;
                unset($this->hotelRoomList);
                $this->hotelRoomList = array();
            }
            
            

            $roomBooked_arr = array();
            $roomObj = null;
            $date_to = AfwDateHelper::addXDaysToGregDate(-1,$leave_date);
            $freeCount = 0;
            foreach($this->hotelRoomList as $roomItem)
            {
                if($freeCount < $limit)
                {
                        list($booking_success, $reason_booking_fail, $rdObjArray) = $roomItem->checkBookingPossibility($arrival_date, $date_to, $work_branch_id, $travel_hotel_id, $booking_id=0, $room_size, $book, $room_size_exact);
                        for($i=0; $i<count($rdObjArray); $i++)
                        {
                          $rdObjArray[$i]->destroyData();
                          unset($rdObjArray[$i]);
                        }
                        
                        if($booking_success)
                        {
                            if(!$roomObj) 
                            {
                                     $roomObj = $roomItem;
                            }        
                            $freeCount++;
                            $roomBooked_arr[] = $roomItem;
                        }
                        else
                        {
                            $fail_counter++;
                            $fail_log[] = $reason_booking_fail;
                            if($fail_counter>10) $this->throwError("$roomItem -> checkBookingPossibility(from=$arrival_date, to=$date_to, branch=$work_branch_id, travel_hotel_id=$travel_hotel_id, booking_id=$booking_id, size=$room_size, book=$book) failed : ".implode("\n<br>",$fail_log));
                        }
                }
                else break;
            }
            
        
            $return = array($freeCount, $roomObj, $roomBooked_arr);
            
            return $return;
        }
        
        
        
        public function loadHotelPricing($room_size, $week_period_enum, $period_type_enum, $yperiod_id)
        {
              $found_rep = "تسعيرة عثر عليها سايقا";
              $hotel_id = $this->getId();
              
              /* if($this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"]=="PRICE_NOT_FOUND")
              {
                  die("case PRICE_NOT_FOUND in my cache");
              }*/
              
              if($this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"])
              {
                  return array($found_rep, $this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"]);
              }


              $file_dir_name = dirname(__FILE__); 
              // require_once("$file_dir_name/../btb/hotel_pricing.php");
              
                            
              if(!$this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"]) 
              {
                  $this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"] = HotelPricing::loadByMainIndex($hotel_id, $room_size, $week_period_enum, $period_type_enum, $yperiod_id, $create_obj_if_not_found=false);
                  $found_rep = "تم العثور على التسعيرة المناسبة بدون أي تغيير";
              }
              if(!$this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"]) 
              {
                  if($yperiod_id) 
                  $this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"] = HotelPricing::loadByMainIndex($hotel_id, $room_size, $week_period_enum, $period_type_enum, 0, $create_obj_if_not_found=false);
                  $found_rep = "تم العثور على التسعيرة المناسبة مع عدم اعتبار مسمى الموسم";
              }
              if(!$this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"]) 
              {
                  $this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"] = HotelPricing::loadByMainIndex($hotel_id, $room_size, 0, $period_type_enum, 0, $create_obj_if_not_found=false);
                  $found_rep = "تم العثور على التسعيرة المناسبة مع عدم اعتبار ويكاند أو ليس ويكاند";
              }
              
              if(!$this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"]) 
              {
                  $this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"] = HotelPricing::loadByMainIndex($hotel_id, $room_size, $week_period_enum, 0, 0, $create_obj_if_not_found=false);
                  $found_rep = "تم العثور على التسعيرة المناسبة مع عدم اعتبار موسم أو ليس موسم";
              }
              
              if(!$this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"]) 
              {
                  $this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"] = HotelPricing::loadByMainIndex($hotel_id, $room_size, 0, 0, 0, $create_obj_if_not_found=false);
                  $found_rep = "تم العثور على التسعيرة المناسبة مع عدم اعتبارالفترة الزمنية";
              }
              
              if(!$this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"])
              {
                  $found_rep = "لم يتم العثور على التسعيرة";
                  $this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"] = "PRICE_NOT_FOUND";
              }
              
              
              
              return array($found_rep, $this->my_hotel_pricing_matrix["$room_size-$week_period_enum-$period_type_enum-$yperiod_id"]);
        }
        
        // Price for 1 room for the period [$arrival_date, $leave_date[  ($leave_date not included)
        public function getTotalPrice($room_size, $arrival_date, $arrival_date_hijri, $arrival_time, $leave_date, $leave_date_hijri, $leave_time)
        {
              $branchObj = $this->hetBranch();
              $total_price = 0;
              $period_arr = AfwDateHelper::genereHijriPeriod($arrival_date, $leave_date, $we_arr=array(6,7), $system="GREG", $increment_days=1, $increment_months=0, $increment_years=0, $calc_greg=true, $include_to_date=false);
              $report_arr = array();
              $day_num = 0;
              $hotel_id = $this->id;
              foreach($period_arr as $period_row)
              {
                 $hdate = $period_row["hdate"]; 
                 $gdate = $period_row["greg"];
                 $day_num++;
                 list($week_period_enum, $period_type_enum, $yperiod_id, $report) = $branchObj->getDateInfo($hdate);
                 $report_arr[] = "اليوم $day_num";
                 $report_arr[] = "التاريخ : $hdate في أي فترة ؟ ";
                 $report_arr[] = $report;
                 
                 list($found_rep, $myHotelPricingObject) = $this->loadHotelPricing($room_size, $week_period_enum, $period_type_enum, $yperiod_id);
              
                 if($myHotelPricingObject and ($myHotelPricingObject != "PRICE_NOT_FOUND"))
                 { 
                          if($myHotelPricingObject->attributeIsApplicable("price"))
                          {
                                  $uprice = round(floatval($myHotelPricingObject->getVal("price")));
                                  $report_arr[] = "$total_price + $uprice";
                                  $total_price += $uprice;
                                  $report_arr[] = "$total_price";
                          }
                          else
                          {
                                  return array(-22, "لا يوجد تسعيرة لهذا الصنف من الغرف : سعة=$room_size ويكاند=$week_period_enum موسم=$period_type_enum مسمى الموسم = $yperiod_id");
                          }
                          //$report_arr[] = "[$found_rep]";                          
                 }
                 else
                 {
                          $report_arr[] = "لم يتم العثور على تسعيرة لهذا التاريخ : $hdate";
                          return array(-11, "لم يتم العثور على تسعيرة لهذا التاريخ : $hdate في الفندق $this [مسلسل=$hotel_id] غرفة $room_size سرير.");
                 }
                 
              }
              
              return array($total_price,implode(" &larr; ",$report_arr));   
        
        }
        
        public function getBasicPrice($room_size, $week_period_enum, $period_type_enum, $yperiod_id, $days_nb)
        {
              $report_arr = array();
              $hotel_id = $this->getId();
              list($found_rep, $myHotelPricingObject) = $this->loadHotelPricing($room_size, $week_period_enum, $period_type_enum, $yperiod_id);
              
              if($myHotelPricingObject and ($myHotelPricingObject != "PRICE_NOT_FOUND"))
              { 
                  $report_arr[] = $found_rep;
              }
              else
              {
                  $report_arr[] = "لم يتم العثور على تسعيرة عامة لجميع الفترات";
                  return array(-1, "can't find prices for this hotel [$hotel_id] and room size [$room_size].");
              }
              $hpId = $myHotelPricingObject->getId();
              $total_price = round(floatval($myHotelPricingObject->getVal("price")))*$days_nb;
              $report_arr[] = "مرجع التسعيرة المعتمدة : $hpId";
              $report_arr[] = "سعر تكلفة الغرفة ل $days_nb يوم : $total_price";
              // $report_arr[] = "وفقا للخيارات التالية : @todo";
              
              return array($total_price,implode(" &larr; ",$report_arr));
        
        }
        
        public function attributeIsApplicable($attribute)
        {
              $city = $this->getVal("city_id");
              if($attribute=="distance") return (($city==self::$MAKKA) or ($city==self::$MADINA));
              
              return true;
        }
        
        public function getFloorNumFromRoomNum($room_num)
        {
            $floors_spec = $this->getVal("floors_spec");
            $floors_spec = str_replace("/", "\n", $floors_spec);
            $floors_spec_arr = explode("\n",$floors_spec);
            $nb_rec = 0;
            foreach($floors_spec_arr as $floors_spec_line)
            {
                list($floor,$floor_limits)  = explode(":",$floors_spec_line);
                $floor = intval(trim($floor));
                list($floor_room_min, $floor_room_max) = explode("-",trim($floor_limits));
                if(($floor>=0) and ($floor_room_min>=0) and ($floor_room_max>0))
                {
                        if(($room_num>=$floor_room_min) and ($room_num<=$floor_room_max)) return $floor;
                }
                 
            }
            
            return 0;
        }
        
        
        public function applyfloorsSpecs($lang="ar")
        {
            $file_dir_name = dirname(__FILE__); 
            // require_once("$file_dir_name/../btb/hroom.php");
            
            $floors_spec = $this->getVal("floors_spec");
            $floors_spec = str_replace("/", "\n", $floors_spec);
            $floors_spec_arr = explode("\n",$floors_spec);
            $nb_rec = 0;
            foreach($floors_spec_arr as $floors_spec_line)
            {
                list($floor,$floor_limits)  = explode(":",$floors_spec_line);
                $floor = intval(trim($floor));
                list($floor_room_min, $floor_room_max) = explode("-",trim($floor_limits));
                if(($floor>=0) and $floor_room_min and $floor_room_max)
                {
                        $hrObj = new Hroom();
                        $hrObj->forceMode();
                        $hrObj->select("hotel_id",$this->getId());
                        $hrObj->where("room_reel_num between $floor_room_min and $floor_room_max");
                        $hrObj->set("floor_num", "0$floor");
                        $nb_rec += $hrObj->update(false);
                }
                 
            }
            
            return array("","$nb_rec سجل تم تعديله");
        }
        
        public function showRoomsFloors($items_objs, $first_item, $objme, $structure)
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             
             $ids = array();
             
             $hotel_id = $this->getId();
             $hroomObject = $first_item;
             /*
             $hotel = $this->hetHotel();
             if(!$hotel)  return array("hotel not defined can't book rooms and room days. Contact admin of plateform", $ids);
              
             
             $travel = $this->hetTravel();
             if(!$travel)  return array("travel not defined can't book rooms and room days. Contact admin of plateform", $ids);
             */
             
             $floor_to_display = array();
             $min_floor = 0;
             $max_floor = 0;
             $data_to_display = "<div class='hotel${hotel_id}_booking hotel_booking_picture'>\n";
             foreach($items_objs as $hroom_id => $hroomObj)
             {
                  $nb_beds = $hroomObj->getVal("capacity_default");
                  $room_beds_picture = str_repeat("<i class=\"fa fa-bed\"></i>", $nb_beds);
                  
                  if($hroomObj)
                  {
                          //if(!$floor_to_display[$floor_num][$hroom_id]) $floor_to_display[$floor_num][$hroom_id] = "";
                          $room_title = $hroomObj->getShortDisplay($lang);
                          if(true)
                          {
                               if($this->desiredRoomsFilter)
                               {
                                   if($this->exactRoomSize)
                                   {
                                       if($this->desired_rooms[intval($hroomObj->getVal("capacity_default"))])
                                       {
                                            $booking_status = "not_booked";
                                            $booking_status_name = "متوفرة";
                                            $class_chkbx = "echeckbox";
                                       }
                                       else
                                       {
                                           $booking_status = "not_ok";
                                           $booking_status_name = "غير مناسبة";
                                           $class_chkbx = "rcheckbox";
                                       }
                                   }
                                   else
                                   {
                                       $rs_min = intval($hroomObj->getVal("capacity_default"));
                                       $rs_max = intval($hroomObj->getVal("capacity_max"));
                                       $booking_status = "not_ok";
                                       $booking_status_name = "غير مناسبة";
                                       $class_chkbx = "rcheckbox";
                                       for($rsz=$rs_min;$rsz<=$rs_max; $rsz++)
                                       {
                                               if($this->desired_rooms[$rsz])
                                               {
                                                    $booking_status = "not_booked";
                                                    $booking_status_name = "متوفرة";
                                                    $class_chkbx = "echeckbox";
                                                    break;
                                               }
                                       }
                                   }
                               }
                               else
                               {
                                    $booking_status = "not_booked";
                                    $booking_status_name = "متوفرة";
                                    $class_chkbx = "echeckbox";
                               }
                               $booking_checkbox = "";
                               $room_is_checked = "";
                               /*
                               if(!$this->bookingCheckboxes) $booking_checkbox = "";
                               else
                               {
                                     $trip = $this->bookingTrip;
                                     if(in_array($hroomObjId, $this->rooms_arr)) $room_is_checked = "checked";
                                     else $room_is_checked = ""; 
                                     $booking_checkbox = "<div class='checkbox_wide_container'><input type=\"checkbox\" value=\"$hroomObjId\"  id=\"select_room_$hroomObjId\" name=\"trip${trip}_room_mfk[]\" $room_is_checked class=\"$class_chkbx\"></div>";
                               }
                               */
                               
                               $room_booker_picture = "<div class='room_content room_$booking_status'>$booking_status_name $booking_checkbox</div>";
                          }
                          
                          $hroom_id = $hroomObj->getId();
                          $floor_num = $hroomObj->getVal("floor_num");
                          if($max_floor<$floor_num) $max_floor = $floor_num;
                          if($min_floor>$floor_num) $min_floor = $floor_num; 
                          $room_price = "?";
                          $floor_to_display[$floor_num][$hroom_id] = "<div class='pic_room$hroom_id room_booking_picture $booking_status room$room_is_checked'>
                                <div class='pic_header_room$hroom_id room_header_picture'>
                                        <div class='pic_title_room$hroom_id room_header_title'>
                                        <a href='main.php?Main_Page=afw_mode_edit.php&cl=Hroom&id=$hroom_id&currmod=btb&currstep=1'>$room_title</a>
                                        </div>
                                        <div class='pic_price_room$hroom_id room_header_price'>
                                        $room_price
                                        </div>
                                </div>
                                <div class='pic_beds_room$hroom_id room_beds_picture'>
                                  $room_beds_picture
                                </div>
                                <div class='pic_booker_room$hroom_id room_booker_picture'>
                                  $room_booker_picture
                                </div>
                          </div><!-- pic_room$hroom_id -->
                          ";
                  }
             }
             
             for($floor_num=$max_floor; $floor_num>=$min_floor;$floor_num--)
             {
                   $floor_rooms_list = $floor_to_display[$floor_num];
                   if(count($floor_rooms_list)>0)
                   {  
                           $data_to_display .= "<div class='floor$floor_num floor_booking_picture'>\n";
                           $floor_name = $hroomObject->translate("floor-$floor_num", $lang);
                           $data_to_display .= "<div class='floor_title_$floor_num floor_title'>$floor_name</div>\n";
                           foreach($floor_rooms_list as $rm_id => $floor_room_item_html)
                           {
                                   $data_to_display .= $floor_room_item_html;
                           }
                           $data_to_display .= "</div><!-- floor$floor_num -->\n";
                   }
             }
             
             $data_to_display .= "</div><!-- hotel_booking_picture -->\n"; // .var_export($this->rooms_arr,true);
             return array($data_to_display, $ids); 
        } 
        
        
        
        
        
        
        
        
             
}
?>