<?php
namespace DejwCake\ApiBakeTheme\Shell\Task;

use Bake\Shell\Task\ModelTask;

/**
 * ApiModel shell task.
 */
class ApiModelTask extends ModelTask
{

    /**
     * Get behaviors
     *
     * @param \Cake\ORM\Table $model The model to generate behaviors for.
     * @return array Behaviors
     */
    public function getBehaviors($model)
    {
        $behaviors = parent::getBehaviors($model);

        $schema = $model->getSchema();
        $fields = $schema->columns();
        if (in_array('deleted', $fields)) {
            $behaviors['Muffin/Trash.Trash'] = [];
        }

        return $behaviors;
    }

    /**
     * Does individual field validation handling.
     *
     * @param \Cake\Database\Schema\Table $schema The table schema for the current field.
     * @param string $fieldName Name of field to be validated.
     * @param array $metaData metadata for field
     * @param string $primaryKey The primary key field
     * @return array Array of validation for the field.
     */
    public function fieldValidation($schema, $fieldName, array $metaData, $primaryKey)
    {
        $ignoreFields = ['deleted', 'sort', 'enabled'];
        if (in_array($fieldName, $ignoreFields)) {
            return false;
        }

        return parent::fieldValidation($schema, $fieldName, $metaData, $primaryKey);
    }
}
