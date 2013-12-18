<?php
class Upload extends BaseModel {
    protected $fillabe = array(
        'created_by', 'name', 'type' ,'size', 'parent_type', 'parent_id'
    );

    public static $rules = array(
        'created_by' => 'integer',
        'parent_id' => 'integer',
    );
}
