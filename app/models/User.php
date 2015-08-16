<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	use UserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
   protected $fillable = array('username', 'email', 'phone',
   			'password', 'name', 'street', 'city', 'state', 'zip',
   			'cc_number', 'cc_type' );

	public function orders() {
		return $this->hasMany('Order');
	}
		
	public function carts() {
		return $this->hasMany('Cart');
	}
	
	public static function storeUser($input) {
		$errors = [];
		$user = new User;
	    $user->username = $input['username'];
	    $user->password = Hash::make($input['password']);
	    $user->email = $input['email'];
	    $user->phone = $input['phone'];
	    $user->name = $input['name'];
	    $user->street = $input['street'];
	    $user->city = $input['city'];
	    $user->state = $input['state'];
	    $user->zip = $input['zip'];
	    $user->cc_number = $input['cc_number'];
	    $user->cc_type = $input['cc_type'];
	    $user->save();
	    return $user->with($errors);
	}
	
	public static function updateUser($id, $input) {
		$errors = [];
		$user = User::find($id);
	    $user->email = $input['email'];
	    $user->phone = $input['phone'];
	    $user->name = $input['name'];
	    $user->street = $input['street'];
	    $user->city = $input['city'];
	    $user->state = $input['state'];
	    $user->zip = $input['zip'];
	    $user->cc_number = $input['cc_number'];
	    $user->cc_type = $input['cc_type'];
	    $user->save();
	    return $user->with($errors);;	}

	public function isAdmin() {
		return $this->admin;
	}
	
	public function allowAccess($id) {
		if (!Auth::check()) {
			return false;
		}
		$auth = Auth::user();
		$user = User::find($id);
		if (($auth->isAdmin() || $auth->id == $id) &&  isset($user)) {
	        return true;
        }
        return false;

	}
}
?>

