<?php

class Create_Messages_Table {    

	public function up()
    {
		Schema::create('messages', function($table) {
			$table->increments('id');
			$table->string('body');
			$table->integer('user_id');
			$table->integer('destination_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('messages');

    }

}