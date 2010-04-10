<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Temporary passwords model.
 *
 * @package     MMI Auth
 * @author      Me Make It
 * @copyright   (c) 2009 Me Make It
 * @license     http://www.memakeit.com/license
 */
class Model_MMI_Temp_Passwords extends Jelly_Model
{
    protected static $_table_name = 'mmi_temp_passwords';
    public static function initialize(Jelly_Meta $meta)
    {
        $meta
            ->table(self::$_table_name)
            ->primary_key('id')
            ->foreign_key('id')
            ->fields(array
            (
    			'id' => new Field_Primary,
                'user_id' => new Field_Integer(array
                (
                    'rules' => array
                    (
                        'not_empty' => NULL,
                        'range' => array(0, 4294967295),
                    ),
                    'unique' => TRUE,
                )),
                'email' => new Field_Email(array
                (
                    'rules' => array
                    (
                        'max_length' => array(255),
                        'not_empty' => NULL,
                    ),
                    'unique' => TRUE,
                )),
                'password' => new Field_Password(array
                (
                    'rules' => array
                    (
                        'max_length' => array(40),
                        'not_empty' => NULL,
                    ),
                )),
                'date_expires' => new Field_Timestamp(array
                (
                    'pretty_format' => 'Y-m-d G:i:s',
                    'rules' => array
                    (
                        'not_empty' => NULL,
                        'range' => array(0, 4294967295),
                    ),
                )),
                'date_created' => new Field_Timestamp(array
                (
                    'auto_now_create' => TRUE,
                    'pretty_format' => 'Y-m-d G:i:s',
                )),
            )
    	);

        if (mt_rand(1, 100) === 1)
        {
            // Do garbage collection
            Jelly::delete(self::$_table_name)->where('date_expires', '<', time())->execute();
        }
	}

    public static function select_by_id($ids, $as_array = TRUE, $array_key = NULL, $limit = NULL)
    {
        $where_parms = array();
        if (MMI_Util::is_set($ids))
        {
            $where_parms['id'] = $ids;
        }
        $query_parms = array('limit' => $limit, 'where_parms' => $where_parms);
        if ($as_array)
        {
            return MMI_DB::select(self::$_table_name, $as_array, $array_key, $query_parms);
        }
        else
        {
            return MMI_Jelly::select(self::$_table_name, $as_array, $array_key, $query_parms);
        }
    }
} // End Model_MMI_Temp_Passwords