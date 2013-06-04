<?php

class Create_Users_Table {    

	public function up()
    {
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('lastname');
			$table->string('email');
			$table->integer('telphone');
			$table->string('type');
			$table->float('lat');
			$table->float('lng');
			$table->string('password');
			$table->string('company');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('users');

    }

}