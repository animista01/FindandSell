<?php

	class User extends Eloquent{

		public function messages()
		{
			return $this->has_many('message');	
		}
	}