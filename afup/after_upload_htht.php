<?php

/**
 * @var integer $after_upload_obj_id
 * @var integer $doc_type_id
 * @var integer $doc_attach_id
 * @var WorkflowFile $af
 */
$file_dir_name = dirname(__FILE__);

$hotelObj = Hotel::loadById($after_upload_obj_id);
if ($hotelObj) $hotelObj->attach_file($af);
else throw new AfwRuntimeException("to attach file for hotel id=[$after_upload_obj_id], hotel not found");
