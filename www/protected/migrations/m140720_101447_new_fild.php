<?php

class m140720_101447_new_fild extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{order}}', 'rating', 'int(3) NOT NULL');
	}

	public function down()
	{
        $this->dropColumn('{{order}}', 'rating');
//		echo "m140720_101447_new_fild does not support migration down.\n";
//		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
