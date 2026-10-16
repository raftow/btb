<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_template : bus_template - هياكل الباصات 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class BusTemplate extends BtbObject{

        public static $MY_ATABLE_ID=13733; 
        // إجراء إحصائيات حول هياكل الباصات 
        public static $BF_STATS_BUS_TEMPLATE = 104005; 
        // إدارة هياكل الباصات 
        public static $BF_QEDIT_BUS_TEMPLATE = 104000; 
        // إنشاء هيكل باص 
        public static $BF_EDIT_BUS_TEMPLATE = 103999; 
        // الاستعلام عن هيكل باص 
        public static $BF_QSEARCH_BUS_TEMPLATE = 104004; 
        // البحث في هياكل الباصات 
        public static $BF_SEARCH_BUS_TEMPLATE = 104003; 
        // عرض تفاصيل هيكل باص 
        public static $BF_DISPLAY_BUS_TEMPLATE = 104002; 
        // مسح هيكل باص 
        public static $BF_DELETE_BUS_TEMPLATE = 104001; 

        
        public static $DATABASE		= ""; 
        public static $MODULE		    = "btb"; 
        public static $TABLE			= ""; 
        public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		tcompany_id => array(SHORTNAME => tcompany,  SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 40,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  ANSWER => work_branch,  ANSMODULE => btb,  AUTOCOMPLETE => false,  
                                // WHERE=>"id_domain = 15 and (id_sh_parent = §MY_COMPANY§ or id = §MY_COMPANY§)",
				RELATION => ManyToOne,  READONLY => false, ),

		bus_model_name => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 48,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		empty_columns => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  "MIN-SIZE" => 1,  CHAR_TEMPLATE => "",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

		rows_nb => array(SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "INT",  READONLY => false, ),

		
                nb_seats  => array('STEP' => 99, SHOW => true,  EDIT => true,  READONLY => true, MANDATORY => false,     
			                       CATEGORY => FORMULA,  TYPE => "INT", ),
                                               
                busTemplateRowList => array(SHORTNAME => busTemplateRows,  SHOW => true,  FORMAT => retrieve,  ICONS => true,  "DELETE-ICON" => true,  BUTTONS => true,  SEARCH => true,  QSEARCH => false,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  
				CATEGORY => ITEMS,  ANSWER => bus_template_row,  ANSMODULE => btb,  ITEM => "bus_template_id",  READONLY => true, ),

                busDiv => array("TYPE" => "TEXT", "CATEGORY" => "FORMULA", "SHOW"=>true, "RETRIEVE"=>false, SIZE=>255, "NO-LABEL"=>true,),
                
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
        
        public $category_arr = null;
	
	*/ 
    
    public $category_arr = null;
    public $all_categories = null;
    
    public function __construct(){
		parent::__construct("bus_template","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "id";
                $this->ORDER_BY_FIELDS = "tcompany_id, bus_model_name";
                 
                
                $this->UNIQUE_KEY = array('tcompany_id','bus_model_name');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->public_display = true;
	}
        
        public static function loadById($id)
        {
           $obj = new BusTemplate();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($tcompany_id, $bus_model_name,$create_obj_if_not_found=false)
        {
           $obj = new BusTemplate();
           if(!$tcompany_id) throw new AfwRuntimeException("loadByMainIndex : tcompany_id is mandatory field");
           if(!$bus_model_name) throw new AfwRuntimeException("loadByMainIndex : bus_model_name is mandatory field");


           $obj->select("tcompany_id",$tcompany_id);
           $obj->select("bus_model_name",$bus_model_name);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("tcompany_id",$tcompany_id);
                $obj->set("bus_model_name",$bus_model_name);

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
               

               list($data[0],$link[0]) = $this->displayAttribute("tcompany_id",false, $lang);
               if(!$data[0]) unset($data[0]);
               list($data[1],$link[1]) = $this->displayAttribute("bus_model_name",false, $lang);

               
               return implode(" - ",$data);
        }
        
        
        

        
        protected function getOtherLinksArray($mode, $genereLog = false, $step="all")      
        {
             $lang = AfwLanguageHelper::getGlobalLanguage();
             $otherLinksArray = array();
             $my_id = $this->getId();
             $displ = $this->getDisplay($lang);
             
             if($mode=="mode_busTemplateRowList")
             {
                   unset($link);
                   $my_id = $this->getId();
                   $link = array();
                   $title = "إدارة صفوف هيكل الباص ";
                   $title_detailed = $title ."لـ : ". $displ;
                   $link["URL"] = "main.php?Main_Page=afw_mode_qedit.php&cl=BusTemplateRow&currmod=btb&id_origin=$my_id&class_origin=BusTemplate&module_origin=btb&newo=-1&limit=30&ids=all&fixmtit=$title_detailed&fixmdisable=1&fixm=bus_template_id=$my_id&sel_bus_template_id=$my_id";
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
            $title_ar = "انشاء صفوف مقاعد الباص"; 
            $pbms["xc123B"] = array("METHOD"=>"genereBusTemplateRows","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN"=>true, "BF-ID"=>"");

            $color = "red";
            $title_ar = "إعادة صفوف مقاعد الباص من الصفر"; 
            $pbms["Yc1asD"] = array("METHOD"=>"resetBusTemplateRows","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN"=>true, "BF-ID"=>"");
            
            return $pbms;
        }
        
        public function resetBusTemplateRows($lang="ar")
        {
             return $this->genereBusTemplateRows($lang,true);
        }


        public function getCols()
        {
                list($empty_columns_txt, $all_cols_txt) = explode(";",strtoupper($this->getVal("empty_columns")));
                if(!$empty_columns_txt) $empty_columns_txt = "C";
                if(!$all_cols_txt) $all_cols_txt = "R,B,C,D,L";
  
                $empty_columns_arr = explode(",",strtoupper($empty_columns_txt));
                $all_cols = explode(",",strtoupper($all_cols_txt));

                return array($all_cols,  $empty_columns_arr);
    
        }
        
        public function genereBusTemplateRows($lang="ar", $update_seats = false)
        {
              $bus_template_id = $this->getId();
              if(!$bus_template_id) return array("Bus template object is empty","");
              $file_dir_name = dirname(__FILE__); 
              // require_once("$file_dir_name/../btb/bus_template_row.php");
              
              $rows_nb = intval($this->getVal("rows_nb"));
              list($all_cols,  $empty_columns_arr) = $this->getCols();
              
              $btr0 = new BusTemplateRow();
              $btr0->deleteWhere("bus_template_id=$bus_template_id and row_num>$rows_nb");
              
              $updated = 0;
              $created = 0;
              
              for($row = 1; $row <= $rows_nb; $row++)
              {
                   $btr = BusTemplateRow::loadByMainIndex($bus_template_id, $row, $create_obj_if_not_found=true);
                   if($btr->is_new or $update_seats)
                   {
                           foreach($all_cols as $col)
                           {
                               $lowerCol = strtolower($col);
                               if(in_array($col,$empty_columns_arr))
                               {
                                  $wd = 0;
                                  $ln = 0;
                               }
                               else
                               {
                                  $wd = 1;
                                  $ln = 1;
                               }
                               $btr->set("${lowerCol}_width",$wd);
                               $btr->set("${lowerCol}_length",$ln);
                           }
                   }
                   
                   if($btr->is_new) $created++;
                   elseif($update_seats) $updated++;
                   $btr->commit();
              }
              
              return array("","$created : created rows, $updated updated rows for bus template : ".$this->getDisplay($lang));
              
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
                       // btb.bus_template_row-هيكل الباص	bus_template_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("delete from ${server_db_prefix}btb.bus_template_row where bus_template_id = '$id' ");

                   
                   // FK not part of me - replaceable 
                       // btb.bus-هيكل الباص	bus_template_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus set bus_template_id='$id_replace' where bus_template_id='$id' ");
                       // btb.bus_model-هيكل الباص	bus_template_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus_model set bus_template_id='$id_replace' where bus_template_id='$id' ");

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 
                       // btb.bus_template_row-هيكل الباص	bus_template_id  أنا تفاصيل لها-OneToMany
                        $this->execQuery("update ${server_db_prefix}btb.bus_template_row set bus_template_id='$id_replace' where bus_template_id='$id' ");
                       // btb.bus-هيكل الباص	bus_template_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus set bus_template_id='$id_replace' where bus_template_id='$id' ");
                       // btb.bus_model-هيكل الباص	bus_template_id  حقل يفلتر به-ManyToOne
                        $this->execQuery("update ${server_db_prefix}btb.bus_model set bus_template_id='$id_replace' where bus_template_id='$id' ");

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
        
        public function columnEraseMe($col_num, $col, $row_num)
        {
            $bus_template_id = $this->getId();
            
            if(!$bus_template_id) return false;
            
            $erase_me = false;
            $lowerCol = strtolower($col);
            
            for($rowi=1;$rowi<$row_num;$rowi++)
            {
                  $rowObj = BusTemplateRow::loadByMainIndex($bus_template_id, $rowi);
                  $ln = $rowObj->getVal("${lowerCol}_length");
                  if($rowi+$ln>$row_num) $erase_me = true;
            }
            
            return $erase_me;
        }

        public static function getSeatCategHtml($seat_num, $type, $who, $price, $curr, $left, $top, $wd, $hg, $lhg, $is_booking, $booked_by_others, $confirmed=false, $can_edit=true, $display_seat_num=true, $bus_num=0, $rotate_transform="x", $wanted_type="family")
        {
                $seat_num_l = "b".$bus_num."_".strtolower($seat_num);
                $seat_val = 0;
                if((!$booked_by_others) and $is_booking) $seat_val = 1;
                if($display_seat_num or $is_booking) $seat_num_display = $seat_num; else $seat_num_display = "&nbsp;";
                
                //$seat_num_display .= $seat_val;

                $hzm_available_seat = "rafik";
                $seat_title_help = "الحمد لله وحده";

                
                $legend_seat_class_show = "legend_seat seat_$type";
                $legend_seat_class_show = str_replace(' ', '_', $legend_seat_class_show);
                $legend_seat_class_show = str_replace('hzm_', '', $legend_seat_class_show);
                
                return array($legend_seat_class_show, "<span id='$seat_num_l' alt='$bus_num' class='$hzm_available_seat bus_seat seat_$type seat_rotate_$rotate_transform' title='$seat_title_help' style='left: ${left}px; top: ${top}px; width: ${wd}px; height: ${hg}px; line-height: ${lhg}px;'>$seat_num_display
                                                        </span><input type='hidden' name='seat_val_$seat_num_l'  id='seat_val_$seat_num_l' value='$seat_val' />");
        }
        
        public static function getSeatHtml($seat_num, $type, $who, $price, $curr, $left, $top, $wd, $hg, $lhg, $is_booking, $booked_by_others, $confirmed=false, $can_edit=true, $display_seat_num=true, $bus_num=0, $rotate_transform="x", $wanted_type="family")
        {
                $seat_num_l = "b".$bus_num."_".strtolower($seat_num);
                $seat_val = 0;
                if((!$booked_by_others) and $is_booking) $seat_val = 1;
                if($display_seat_num or $is_booking) $seat_num_display = $seat_num; else $seat_num_display = "&nbsp;";
                
                //$seat_num_display .= $seat_val;
                if(true)
                {
                        if($can_edit) 
                        {
                                $basic_class = "hzm_available_seat";
                                $seat_title_help_basic = "$who ($price $curr)" ;               
                        }   
                        else
                        { 
                                $basic_class = "hzm_ro_available_seat";
                                $seat_title_help_basic = "الحجز غير مسموح به الآن";
                        }
                        
                        if(!$booked_by_others)
                        {
                                if($confirmed) 
                                {
                                        $hzm_available_seat = "seat_confirmed_for_me";
                                        $seat_title_help = "$who ($price $curr)";
                                }
                                elseif($is_booking) 
                                {
                                        $hzm_available_seat = "$basic_class seat_booking";
                                        $seat_title_help = "$who ($price $curr)";
                                }       
                                elseif(($wanted_type != $type) and ($type != "all"))
                                {
                                        $hzm_available_seat = "seat_policy_block";
                                        $seat_title_help = "$who ($price $curr)";
                                }
                                else 
                                {
                                        $hzm_available_seat = "$basic_class";
                                        $seat_title_help = $seat_title_help_basic;
                                }       
                        } 
                        elseif($confirmed) 
                        {
                                $hzm_available_seat = "seat_confirmed";
                                // @todo : if user = employee of travel company
                                if(true) $seat_title_help = "$who ($price $curr)";
                                else $seat_title_help = $seat_title_help_basic;
                        }
                        else
                        {
                                $hzm_available_seat = "seat_booked";
                                // @todo : if user = employee of travel company
                                if(true) $seat_title_help = "$who ($price $curr)";
                                else $seat_title_help = $seat_title_help_basic;
                        }
                }
                else
                {

                }
                
                $legend_seat_class_show = "legend_seat $hzm_available_seat seat_$type";
                $legend_seat_class_show = str_replace(' ', '_', $legend_seat_class_show);
                $legend_seat_class_show = str_replace('hzm_', '', $legend_seat_class_show);
                
                return array($legend_seat_class_show, "<span id='$seat_num_l' alt='$bus_num' class='$hzm_available_seat bus_seat seat_$type seat_rotate_$rotate_transform' title='$seat_title_help' style='left: ${left}px; top: ${top}px; width: ${wd}px; height: ${hg}px; line-height: ${lhg}px;'>$seat_num_display
                                                        </span><input type='hidden' name='seat_val_$seat_num_l'  id='seat_val_$seat_num_l' value='$seat_val' />");
        }           
        
        public function getBusSeatsHtml($status_random=true, $vertical_turn=null, $categ_only=false)
        {
             $rows_nb = intval($this->getVal("rows_nb"));

             $sw = 33;
             $sh = 33; 
             $iw = 3;
             $ih = 3;
             
             $seat_bloc_length = ($sw+$iw) * $rows_nb;
             $driver_seat_width = 60;
             
             $bus_length = $driver_seat_width + $seat_bloc_length;
             $stop = 30;
             $sleft = $seat_bloc_length;

             $price = "110";
             $curr = "ريال";
             $type_arr[] = "women";
             $type_arr[] = "women";
             $type_arr[] = "family";
             $type_arr[] = "family";
             $type_arr[] = "men";
             $type_arr[] = "men";
             $type_arr[] = "men";
             $type_arr[] = "men";
             $type_arr[] = "men";
             $type_arr[] = "men";
             $type_arr[] = "men";
             $type_arr[] = "men";
             $type_arr[] = "men";
             $type_arr[] = "men";
             
              $bus_template_id = $this->getId();
              if(!$bus_template_id) return null;
              
              $file_dir_name = dirname(__FILE__); 
              // require_once("$file_dir_name/../btb/bus_template_row.php");

              list($all_cols,  $empty_columns_arr) = $this->getCols();


              $seats_html_arr = array();

              for($row = 0; $row <= $rows_nb; $row++)
              {
                   if($row>0) $btr = BusTemplateRow::loadByMainIndex($bus_template_id, $row);
                   else $btr = null;
                   
                   
                   if(true)
                   {
                           foreach($all_cols as $icol => $col)
                           {
                               if(($col=="R") or ($row>0))
                               {
                                       $lowerCol = strtolower($col);
                                       $attribute_length = "${lowerCol}_length"; 
                                       $attribute_width  = "${lowerCol}_width"; 
                                       
                                       if(($row==0) or ($btr and $btr->attributeIsApplicable($attribute_length)))
                                       {
                                               $attribute_width_val = ($row>0) ? $btr->getVal($attribute_width) : 1;
                                               $attribute_length_val = ($row>0) ? $btr->getVal($attribute_length) : 1;
                                               if($attribute_width_val)
                                               {
                                                       $top = $stop + (4-$icol)*($sh+$ih);
                                                       $left = $sleft - ($row-1+$attribute_length_val)*($sw+$iw);
                                                       $wd = intval($attribute_length_val)*($sw+$iw)-$iw;
                                                       $hg = intval($attribute_width_val)*($sh+$ih)-$ih;
                                                       $lhg = $sh;
                                                       $seat_num = $col.$row;
                                                       
                                                       if($this->category_arr)
                                                       {
                                                               $type = $this->category_arr[$seat_num];
                                                               if(!$type) $type = "normal";
                                                           
                                                       }
                                                       else
                                                       {
                                                               if($row>0) $type = $type_arr[$row-1];
                                                               else $type = "men";
                                                       }
                                                       
                                                       if($status_random) 
                                                            $bkd = (rand(0,7)<3);
                                                       else
                                                            $bkd = false;
                                                       
                                                       if($status_random)
                                                            $conf = ($bkd and (rand(0,7)>3));
                                                       else
                                                            $conf = false;

                                                       if ($vertical_turn)     
                                                       {
                                                                $vertical_turn_sens = $vertical_turn["sens"];
                                                                if($vertical_turn_sens == "inv-watch")
                                                                {
                                                                        $left2 = $top + $vertical_turn["translate_x"];
                                                                        $top2 =  $vertical_turn["translate_y"] - $left;
                                                                        $wd2 = $hg;
                                                                        $hg2 = $wd;
                                                                        $lhg2 = $lhg; // ??
                                                                }
                                                                else throw new RuntimeException("turn sens not implemented");

                                                                if($categ_only) list($legend_seat_class_show, $seats_html_arr[$row][$col]) = self::getSeatCategHtml($seat_num, $type, "", $price, $curr, $left2, $top2, $wd2, $hg2, $lhg2, false, $bkd, $conf, true, (!$bkd));    
                                                                else list($legend_seat_class_show, $seats_html_arr[$row][$col]) = self::getSeatHtml($seat_num, $type, "", $price, $curr, $left2, $top2, $wd2, $hg2, $lhg2, false, $bkd, $conf, true, (!$bkd));    
                                                       }
                                                       else 
                                                       {
                                                                if($categ_only) list($legend_seat_class_show, $seats_html_arr[$row][$col]) = self::getSeatCategHtml($seat_num, $type, "", $price, $curr, $left, $top, $wd, $hg, $lhg, false, $bkd, $conf, true, (!$bkd));
                                                                else list($legend_seat_class_show, $seats_html_arr[$row][$col]) = self::getSeatHtml($seat_num, $type, "", $price, $curr, $left, $top, $wd, $hg, $lhg, false, $bkd, $conf, true, (!$bkd));
                                                       }
                                               }
                                               else
                                               {
                                                       $seats_html_arr[$row][$col] = "";
                                               }
                                       }
                                       else
                                       {
                                               $seats_html_arr[$row][$col] = "";
                                       }
                               }
                           }
                           
                   }
                   
                   unset($btr);
              }
              
              return array($bus_length, $seats_html_arr);
        }
        
        public function calcBusDiv($status_random=false, $bus_pic = "<div class='bus_picture'></div>", $message_user="الرجاء التظليل على كل المقاعد التي توافق على الجلوس عليها أنت ومن معك", $vertical_turn=null) 
        {
             //die("all_categories = ".var_export($this->all_categories,true)." category_arr = ".var_export($this->category_arr,true));
             if(isset($this->category_arr))
             {
                $legend = "<div class='the_legend_vertical'>
                                              <ul class='seatType makeGrid hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>";
                foreach($this->all_categories as $categ_row)
                {
                    $code = $categ_row["code"];
                    $title = $categ_row["title"];
                    
                    $legend .= "         <li class='makeFlex hrtlCenter' data-radium='true'>
                                                                <span class='legend_seat available_seat seat_$code'>
                                                                </span> $title
                                                        </li>";
                }                              

                $legend .= "                   </ul>
                                        </div>";
                // debugg:
                // return $legend;                        
             }
             else
             {
                $legend = "<div class='the_legend_vertical'>
                                              <ul class='seatType makeGrid hrtlCenter appendTop20 latoRegular darkGreyText' data-radium='true'>
                                                        <li class='makeFlex hrtlCenter' data-radium='true'>
                                                                <span class='legend_seat available_seat seat_family'>
                                                                </span> متوفر عوائل
                                                        </li>
                                                        <li class='makeFlex hrtlCenter' data-radium='true'>
                                                                <span class='legend_seat available_seat seat_men' >
                                                                </span> متوفر عزاب
                                                        </li>
                                                        <li class='makeFlex hrtlCenter' data-radium='true'>
                                                                <span class='legend_seat available_seat seat_women' >
                                                                </span> متوفر نساء
                                                        </li>
                                                        <li class='makeFlex hrtlCenter' data-radium='true'>
                                                                <span class='legend_seat available_seat seat_all' >
                                                                </span> متوفر للجميع
                                                        </li>  
                                                        <li class='makeFlex hrtlCenter' data-radium='true'>
                                                                <span class='legend_seat seat_booked seat_all' >
                                                                </span> محجوز
                                                        </li>
                                                        <li class='makeFlex hrtlCenter' data-radium='true'>
                                                                <span class='legend_seat seat_confirmed seat_all' >
                                                                </span> مؤكد
                                                        </li>
                                                </ul>
                                        </div>";
             }
             list($bus_length, $seats_html_arr) = $this->getBusSeatsHtml($status_random, $vertical_turn=null, isset($this->category_arr));
             
             if(!$seats_html_arr) return "<div>Empty Bus Template Object</div>";
             
             $seats_html = "";
             
             foreach($seats_html_arr as $row => $seats_html_row)
             {
                  foreach($seats_html_row as $col => $seat_item_html)
                  {
                     $seats_html .= $seat_item_html ."\n";
                  }
             }
             
             $all_colors = array(/*"green","red",*/"blue","black","white","yellow");
             
             $col_index = rand(0,count($all_colors)-1);
            
             $buscolor = "white"; //$all_colors[$col_index];
             
             $bus_div_length = $bus_length + 20;
              
             return "<div class='hzm_abc bus_div' style='width:${bus_div_length}px'>
                        <div class='the_bus'>
                                <p class='hzm_def btb_label'>$message_user</p>
                                <span class='hidden hzm_x btb_error'>You cannot select more than  seats.
                                </span>
                                <span class='hidden hzm_x btb_error'>Please select boarding and drop point before proceeding.
                                </span>
                                <div class='bus_complete'>
                                        <div class='hzm_x bus_body bus_$buscolor'>
                                                <div class='driverSeat'>
                                                        <span class='hzm_a driver_volan' style=''>
                                                        </span>
                                                </div>
                                                <div class='hzm_b bus_seats_bloc' style='width: ${bus_length}px; height: 226.542px;'>
                                                        <div id='show_seats' class='hzm_c bus_body_header'>-</div>
                                                        <!--
                                                        <span class='bus_roue_r_f' style=''>&nbsp;</span>
                                                        <span class='bus_roue_r_b' style=''>&nbsp;</span>
                                                        <span class='bus_roue_l_f' style=''>&nbsp;</span>
                                                        <span class='bus_roue_l_b' style=''>&nbsp;</span>
                                                        <span class='feu_rouge_l' style=''>&nbsp;</span>
                                                        <span class='feu_rouge_r' style=''>&nbsp;</span>
                                                        <span class='retrov_l bb_$buscolor' style=''>&nbsp;</span>
                                                        <span class='retrov_bras_l' style=''>&nbsp;</span>
                                                        <span class='retrov_r bb_$buscolor' style=''>&nbsp;</span>
                                                        <span class='retrov_bras_r' style=''>&nbsp;</span>-->
                                                        
                                                        $seats_html 
                                                </div>
                                        </div>
                                        $legend
                                        $bus_pic
                                        
                                </div>
                                
                        </div>
                                        
                </div>"; 
        }
        
        public function getSeatCodes()
        {
             $rows_nb = intval($this->getVal("rows_nb"));

             $bus_template_id = $this->getId();
             if(!$bus_template_id) return array();
              
             $file_dir_name = dirname(__FILE__); 
             // require_once("$file_dir_name/../btb/bus_template_row.php");

             list($all_cols,  $empty_columns_arr) = $this->getCols();


             $seats_codes_arr = array();

             for($row = 1; $row <= $rows_nb; $row++)
             {
                   $btr = BusTemplateRow::loadByMainIndex($bus_template_id, $row);
                   if($btr)
                   {
                           foreach($all_cols as $icol => $col)
                           {
                               $lowerCol = strtolower($col);
                               $attribute_length = "${lowerCol}_length"; 
                               $attribute_width  = "${lowerCol}_width"; 
                               
                               if($btr->attributeIsApplicable($attribute_length))
                               {
                                       $attribute_width_val = $btr->getVal($attribute_width);
                                       $attribute_length_val = $btr->getVal($attribute_length);
                                       if($attribute_width_val)
                                       {
                                               $seat_num = $col.$row;
                                               $seats_codes_arr[] = $seat_num;
                                       }
                               }
                           }
                   }
                   unset($btr);
              }
              $seats_codes_arr[] = "R0";
              return $seats_codes_arr;
        }
        
        
        public function calcNb_seats()
        {
                if($this->nb_seats_design) return $this->nb_seats_design;
                
                $bus_template_id = $this->getId();
                if(!$bus_template_id) return 0;
                $file_dir_name = dirname(__FILE__); 
                // require_once("$file_dir_name/../btb/bus_template_row.php");

                list($all_cols,  $empty_columns_arr) = $this->getCols();
                $rows_nb = intval($this->getVal("rows_nb"));
                
                $nb_seats = 0;
                
                for($row = 1; $row <= $rows_nb; $row++)
                {
                        $btr = BusTemplateRow::loadByMainIndex($bus_template_id, $row, $create_obj_if_not_found=false);
                        if($btr)
                        {
                                foreach($all_cols as $i_col_sel => $col_sel)
                                {
                                        $lowerCol = strtolower($col_sel);
                                        if($btr->isAvaialableSeat($i_col_sel, $col_sel))
                                        {
                                                $nb_seats++;
                                        }
                                
                                }
                        }
                }
                $this->nb_seats_design = $nb_seats;
                return $nb_seats;
              
        }
             
}
?>
