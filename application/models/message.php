<?php

	class Message extends Eloquent{

		public function user()
		{
			return $this->belongs_to('User');
		}
	}