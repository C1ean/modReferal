<?php
$xpdo_meta_map['modReferalUsers']= array (
  'package' => 'modreferal',
  'version' => '1.1',
  'table' => 'modreferal_users',
  'extends' => 'xPDOObject',
  'fields' =>
        array(
            'id' => NULL,
            'createdon' => 'CURRENT_TIMESTAMP',
            'referrer_id' => 0,
            'referrer_code' => '',
        ),
    'fieldMeta' =>
        array(
            'id' =>
                array(
                    'dbtype' => 'int',
                    'precision' => '10',
                    'phptype' => 'integer',
                    'attributes' => 'unsigned',
                    'null' => false,
                    'index' => 'pk',
                ),

            'createdon' =>
                array(
                    'dbtype' => 'timestamp',
                    'phptype' => 'datetime',
                    'null' => true,
                    'default' => 'CURRENT_TIMESTAMP',
                ),
            'referrer_id' =>
                array(
                    'dbtype' => 'int',
                    'precision' => '10',
                    'phptype' => 'integer',
                    'attributes' => 'unsigned',
                    'null' => true,
                    'default' => 0,
                    'index' => 'index',
                ),
            'referrer_code' =>
                array(
                    'dbtype' => 'varchar',
                    'precision' => '50',
                    'phptype' => 'string',
                    'null' => true,
                    'default' => '',
                    'index' => 'index',
                ),
        ),
    'indexes' =>
        array(
            'id' =>
                array(
                    'alias' => 'id',
                    'primary' => true,
                    'unique' => true,
                    'type' => 'BTREE',
                    'columns' =>
                        array(
                            'id' =>
                                array(
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ),
                        ),
                ),
            'referrer_id' =>
                array(
                    'alias' => 'referrer_id',
                    'primary' => false,
                    'unique' => false,
                    'type' => 'BTREE',
                    'columns' =>
                        array(
                            'referrer_id' =>
                                array(
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ),
                        ),
                ),
            'referrer_code' =>
                array(
                    'alias' => 'referrer_code',
                    'primary' => false,
                    'unique' => true,
                    'type' => 'BTREE',
                    'columns' =>
                        array(
                            'referrer_code' =>
                                array(
                                    'length' => '',
                                    'collation' => 'A',
                                    'null' => false,
                                ),
                        ),
                ),

        ),
    'aggregates' =>
        array(
            'User' =>
                array(
                    'class' => 'modUser',
                    'local' => 'internalKey',
                    'foreign' => 'id',
                    'owner' => 'foreign',
                    'cardinality' => 'one',
                ),
        ),
);