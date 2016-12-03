<?php

use yii\db\Migration;

class m161202_230629_projects_field_adding extends Migration
{
    public function up()
    {
        $this->addColumn('projects','has_image',$this->boolean()->defaultValue(false));
    }

    public function down()
    {
        $this->dropColumn('projects','has_image');
        return true;
    }
}
