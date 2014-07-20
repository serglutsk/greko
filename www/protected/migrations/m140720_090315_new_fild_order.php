<?php

class m140720_090315_new_fild_order extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{order}}', 'rating', 'int(3) NOT NULL');
	}

	public function down()
	{
        $this->dropColumn('{{order}}', 'rating');
//		echo "m140720_090315_new_fild_order does not support migration down.\n";
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