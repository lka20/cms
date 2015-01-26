<?php
/**
 * Licensed under The GPL-3.0 License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @since    2.0.0
 * @author   Christopher Castro <chris@quickapps.es>
 * @link     http://www.quickappscms.org
 * @license  http://opensource.org/licenses/gpl-3.0.html GPL-3.0 License
 */
namespace Field\Model\Table;

use Cake\Database\Schema\Table as Schema;
use Cake\ORM\Table;

/**
 * Represents "field_values" database table.
 *
 * In this table is where `Field Handlers` stores their information.
 * Every row of this table represents a cell-value (for attached field in tables).
 */
class FieldValuesTable extends Table
{

    /**
     * Alter the schema used by this table.
     *
     * @param \Cake\Database\Schema\Table $table The table definition fetched from database
     * @return \Cake\Database\Schema\Table the altered schema
     */
    protected function _initializeSchema(Schema $table)
    {
        $table->columnType('raw', 'serialized');
        return $table;
    }

    /**
     * Initialize a table instance. Called after the constructor.
     *
     * @param array $config Configuration options passed to the constructor
     * @return void
     */
    public function initialize(array $config)
    {
        $this->belongsTo('FieldInstances', [
            'className' => 'Field.FieldInstances',
            'foreignKey' => 'field_instance_id'
        ]);
    }
}
