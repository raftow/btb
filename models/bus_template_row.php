<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_template_row : bus_template_row - صفوف نموذج الباص 
// ------------------------------------------------------------------------------------


$file_dir_name = dirname(__FILE__);

// old include of afw.php

class BusTemplateRow extends BtbObject
{

        public static $MY_ATABLE_ID = 13734;
        // إجراء إحصائيات حول صفوف نموذج الباص 
        public static $BF_STATS_BUS_TEMPLATE_ROW = 104012;
        // إدارة صفوف نموذج الباص 
        public static $BF_QEDIT_BUS_TEMPLATE_ROW = 104007;
        // إنشاء صف بنموذج الباص 
        public static $BF_EDIT_BUS_TEMPLATE_ROW = 104006;
        // الاستعلام عن صف بنموذج الباص 
        public static $BF_QSEARCH_BUS_TEMPLATE_ROW = 104011;
        // البحث في صفوف نموذج الباص 
        public static $BF_SEARCH_BUS_TEMPLATE_ROW = 104010;
        // عرض تفاصيل صف بنموذج الباص 
        public static $BF_DISPLAY_BUS_TEMPLATE_ROW = 104009;
        // مسح صف بنموذج الباص 
        public static $BF_DELETE_BUS_TEMPLATE_ROW = 104008;


        public static $DATABASE                = "";
        public static $MODULE                    = "btb";
        public static $TABLE                        = "";
        public static $DB_STRUCTURE = null;

        public function __construct()
        {
                parent::__construct("bus_template_row", "id", "btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "id";
                $this->ORDER_BY_FIELDS = "bus_template_id, row_num";


                $this->UNIQUE_KEY = array('bus_template_id', 'row_num');

                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
        }

        public static function loadById($id)
        {
                $obj = new BusTemplateRow();
                $obj->select_visibilite_horizontale();
                if ($obj->load($id)) {
                        return $obj;
                } else return null;
        }



        public static function loadByMainIndex($bus_template_id, $row_num, $create_obj_if_not_found = false)
        {
                global $arrBusTemplateRowCache;
                if ($arrBusTemplateRowCache["$bus_template_id-$row_num"]) return $arrBusTemplateRowCache["$bus_template_id-$row_num"];
                $obj = new BusTemplateRow();
                if (!$bus_template_id) $obj->throwError("loadByMainIndex : bus_template_id is mandatory field");
                if (!(is_numeric($row_num) and ($row_num >= 0))) $obj->throwError("loadByMainIndex : row_num is mandatory field");


                $obj->select("bus_template_id", $bus_template_id);
                $obj->select("row_num", $row_num);

                if ($obj->load()) {
                        if ($create_obj_if_not_found) $obj->activate();
                        $arrBusTemplateRowCache["$bus_template_id-$row_num"] = $obj;
                        return $obj;
                } elseif ($create_obj_if_not_found) {
                        $obj->set("bus_template_id", $bus_template_id);
                        $obj->set("row_num", $row_num);

                        $obj->insert();
                        $arrBusTemplateRowCache["$bus_template_id-$row_num"] = $obj;
                        $obj->is_new = true;
                        return $obj;
                } else return null;
        }


        public function getDisplay($lang = "ar")
        {
                if ($this->getVal("id")) return $this->getVal("id");
                $data = array();
                $link = array();


                list($data[0], $link[0]) = $this->displayAttribute("bus_template_id", false, $lang);
                list($data[1], $link[1]) = $this->displayAttribute("row_num", false, $lang);


                return implode(" - ", $data);
        }




        protected function getPublicMethods()
        {

                $pbms = array();

                $color = "green";
                $title_ar = "xxxxxxxxxxxxxxxxxxxx";
                //$pbms["xc123B"] = array("METHOD"=>"methodName","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"");



                return $pbms;
        }




        public function beforeDelete($id, $id_replace)
        {
                global $server_db_prefix;

                if ($id) {
                        if ($id_replace == 0) {
                                // FK part of me - not deletable 


                                // FK part of me - deletable 


                                // FK not part of me - replaceable 



                                // MFK

                        } else {
                                // FK on me 


                                // MFK


                        }
                        return true;
                }
        }

        public function seatEraseMe($colnum, $col)
        {
                /**
                 * @var BusTemplate $bt
                 */
                $bt = $this->het("bus_template_id");
                list($all_cols,  $empty_columns_arr) = $bt->getCols();
                $lowerCol = strtolower($col);
                $erase_me = false;
                foreach ($all_cols as $i => $coli) {
                        $lowerColi = strtolower($coli);
                        $wdi = $this->getVal("${lowerColi}_width");
                        if (!$wdi) $wdi = 0;
                        if (($i < $colnum) and (($wdi + $i) > $colnum)) $erase_me = $coli;
                }

                return $erase_me;
        }

        public function isAvaialableSeat($i_col_sel, $col_sel)
        {
                $bt = $this->het("bus_template_id");
                list($all_cols,  $empty_columns_arr) = $bt->getCols();
                $row_num = $this->getVal("row_num");



                foreach ($all_cols as $i => $col) {
                        $lowerCol = strtolower($col_sel);
                        if (!(($this->getVal("${lowerCol}_width") > 0) and ($this->getVal("${lowerCol}_length") > 0) and ((!$this->seatEraseMe($i_col_sel, $col)) and $bt and (!$bt->columnEraseMe($i_col_sel, $col, $row_num))))) return false;
                }

                return true;
        }

        public function attributeIsApplicable($attribute)
        {
                $bt = $this->het("bus_template_id");
                list($all_cols,  $empty_columns_arr) = $bt->getCols();
                $row_num = $this->getVal("row_num");

                foreach ($all_cols as $i => $col) {
                        $lowerCol = strtolower($col);

                        if (($attribute == "${lowerCol}_width") or ($attribute == "${lowerCol}_length")) {
                                return ((!$this->seatEraseMe($i, $col)) and $bt and (!$bt->columnEraseMe($i, $col, $row_num)));
                        }
                }

                return true;
        }

        public function whyAttributeIsNotApplicable($attribute, $lang = "ar")
        {
                $bt = $this->het("bus_template_id");
                list($all_cols,  $empty_columns_arr) = $bt->getCols();
                $row_num = $this->getVal("row_num");

                foreach ($all_cols as $i => $col) {
                        $lowerCol = strtolower($col);
                        $columnEraseMe = "";
                        $seatEraseMe = "";
                        $info = "";
                        if (($attribute == "${lowerCol}_width") or ($attribute == "${lowerCol}_length")) {
                                if ($this->seatEraseMe($i, $col) or ($bt and $bt->columnEraseMe($i, $col, $row_num))) {
                                        $seatEraseMe = $this->seatEraseMe($i, $col);
                                        if ($bt) $columnEraseMe = $bt->columnEraseMe($i, $col, $row_num);

                                        if ($seatEraseMe) $info .= " SeatEraseMe($i, $col) = $seatEraseMe";
                                        if ($columnEraseMe) $info .= " ColumnEraseMe($i, $col, $row_num) = $columnEraseMe";
                                        break;
                                }
                        }
                }

                $icon = "na20.png";
                $textReason = "$attribute : $info";
                return array($icon, $textReason);
        }
}
