<?php

$file_dir_name = dirname(__FILE__);

// old include of afw.php

class BusSeat extends BtbObject
{
    public static $MY_ATABLE_ID = 13745;

    public static $DATABASE = '';
    public static $MODULE = 'btb';
    public static $TABLE = 'bus_seat';
    public static $DB_STRUCTURE = null;
    public function __construct()
    {
        parent::__construct('bus_seat', 'id', 'btb');
        $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
        $this->DISPLAY_FIELD = '';
        $this->ORDER_BY_FIELDS = 'bus_id, seat_code';
        $this->horizontalTabs = true;

        $this->UNIQUE_KEY = ['bus_id', 'seat_code'];

        $this->showQeditErrors = true;
        $this->showRetrieveErrors = true;
        // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
    }

    public static function loadById($id)
    {
        $obj = new BusSeat();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else {
            return null;
        }
    }

    public static function loadByMainIndex(
        $bus_id,
        $seat_code,
        $create_obj_if_not_found = false
    ) {
        $obj = new BusSeat();
        if (!$bus_id) {
            throw new AfwRuntimeException('loadByMainIndex : bus_id is mandatory field');
        }
        if (!$seat_code) {
            throw new AfwRuntimeException('loadByMainIndex : seat_code is mandatory field');
        }

        $obj->select('bus_id', $bus_id);
        $obj->select('seat_code', $seat_code);

        if ($obj->load()) {
            if ($create_obj_if_not_found) {
                $obj->activate();
            }
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set('bus_id', $bus_id);
            $obj->set('seat_code', $seat_code);

            $obj->insertNew();
            $obj->is_new = true;
            return $obj;
        } else {
            return null;
        }
    }

    public function getDisplay($lang = 'ar')
    {
        $data = [];
        $link = [];

        list($data[0], $link[0]) = $this->displayAttribute(
            'travel_bus_id',
            false,
            $lang
        );
        list($data[1], $link[1]) = $this->displayAttribute(
            'seat_code',
            false,
            $lang
        );

        return implode(' - ', $data);
    }

    

    public function fld_CREATION_USER_ID()
    {
        return 'created_by';
    }

    public function fld_CREATION_DATE()
    {
        return 'created_at';
    }

    public function fld_UPDATE_USER_ID()
    {
        return 'updated_by';
    }

    public function fld_UPDATE_DATE()
    {
        return 'updated_at';
    }

    public function fld_VALIDATION_USER_ID()
    {
        return 'validated_by';
    }

    public function fld_VALIDATION_DATE()
    {
        return 'validated_at';
    }

    public function fld_VERSION()
    {
        return 'version';
    }

    public function fld_ACTIVE()
    {
        return 'active';
    }

    public function isTechField($attribute)
    {
        return $attribute == 'created_by' or
            $attribute == 'created_at' or
            $attribute == 'updated_by' or
            $attribute == 'updated_at' or
            $attribute == 'validated_by' or
            $attribute == 'validated_at' or
            $attribute == 'version';
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

    

    public function getFieldGroupInfos($fgroup)
    {
        if ($fgroup == 'seat') {
            return ['name' => $fgroup, 'css' => 'pct_50'];
        }
        if ($fgroup == 'booking') {
            return ['name' => $fgroup, 'css' => 'pct_50'];
        }

        return ['name' => $fgroup, 'css' => 'none'];
    }

    public function list_of_seat_category()
    {
        $list_of_items = [];
        $list_of_items[5] = 'مقعد سرير'; //     code : BED
        $list_of_items[7] = 'بجانب الباب'; //     code : DOOR
        $list_of_items[2] = 'مقعد أمامي'; //     code : FRONT
        $list_of_items[4] = 'الدرجة الذهبية'; //     code : GOLDEN
        $list_of_items[1] = 'عادي'; //     code : NORMAL
        $list_of_items[3] = 'الدرجة الفضية'; //     code : SILVER
        $list_of_items[6] = 'بجانب النافذة'; //     code : WINDOW
        return $list_of_items;
    }

    public static function code_of_seat_category($seat_category)
    {
        $code = 'unknown';
        if ($seat_category == 1) {
            $code = 'normal';
        }
        if ($seat_category == 2) {
            $code = 'front';
        }
        if ($seat_category == 3) {
            $code = 'silver';
        }
        if ($seat_category == 4) {
            $code = 'golden';
        }
        if ($seat_category == 5) {
            $code = 'bed';
        }
        if ($seat_category == 6) {
            $code = 'window';
        }
        if ($seat_category == 7) {
            $code = 'door';
        }

        return $code;
    }

    public function getSeatCategoryCode()
    {
        $seat_category = intval($this->getVal('seat_category'));
        return self::code_of_seat_category($seat_category);
    }

    public function getMyRow()
    {
        return intval(substr($this->seat_code, 1));
    }
}
