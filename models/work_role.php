<?php
class WorkRole extends BtbObject
{

        public static $DATABASE                = "";
        public static $MODULE                    = "btb";
        public static $TABLE                        = "work_role";
        private static $roleIsForAssignArr = [];
        public static $DB_STRUCTURE = null;
        // public static $copypast = true;

        public function __construct()
        {
                parent::__construct("work_role", "id", "btb");
                BtbWorkRoleAfwStructure::initInstance($this);
        }

        public static function loadById($id)
        {
                $obj = new WorkRole();

                if ($obj->load($id)) {
                        return $obj;
                } else return null;
        }

        /**
         * @param int $id
         */
        /*
        public static function roleIsForAssign($id)
        {
                if (!isset($roleIsForAssignArr[$id])) {
                        $obj = new WorkTransition();
                        $obj->select("active", "Y");
                        $obj->mfkContain("work_role_mfk", $id);
                        $roleIsForAssignArr[$id] = ($obj->count() > 0);
                }

                return $roleIsForAssignArr[$id];
        }*/

        public function getDisplay($lang = 'ar')
        {
                return $this->getDefaultDisplay($lang);
        }

        public function stepsAreOrdered()
        {
                return false;
        }

        public function shouldBeCalculatedField($attribute)
        {
                
                return false;
        }

        public function afterMaj($id, $fields_updated)
        {
                if ($fields_updated["jobrole_mfk"]) {
                        UfwQueryAnalyzer::startProcessLourdMode();
                        $arr_roles = [$this->id];
                        $wEmplList = WbranchEmployee::getEmployeeList($orgunit_id = 0, $except_employee_id = 0, $arr_roles, $hrm = false);

                        $count = 0;
                        $counterr = 0;
                        foreach ($wEmplList as $wEmplItem) {
                                /**
                                 * @var WbranchEmployee $wEmplItem
                                 */
                                list($err,) = $wEmplItem->resetPrevileges();
                                if ($err) $counterr++;
                                else $count++;
                        }
                        AfwSession::console("afterMaj of jobrole_mfk of work role [employees previlege resetted : $count | errors : $counterr]", "information");
                        UfwQueryAnalyzer::stopProcessLourdMode();
                }
        }
}
