<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model {

	protected $table = 'attendees';
	
	protected $fillable = ['id', 'event_id', 'user_id'];
}