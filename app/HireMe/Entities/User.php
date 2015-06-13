<?php namespace HireMe\Entities;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

  /**
    * En UserController@registerUser vamos a ingresar al usuario,
    * pero aquí especificamos que campos se van a llenar del modelo.
   */
  protected $fillable = array(
    'full_name',
    'email',
    'password'
  );

  /**
   * Encriptamos la contraseña.
   */
  public function setPasswordAttribute($value) {

    if (!empty($value))
    {
      $this->attributes['password'] = \Hash::make($value);
    }
  }

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
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

  public function getRememberToken()
  {
    return $this->remember_token;
  }

  public function setRememberToken($value)
  {
    $this->remember_token = $value;
  }

  public function getRememberTokenName()
  {
    return 'remember_token';
  }

  // Un usuario esta asociado con un candidato
  public function candidate() {
    return $this->hasOne('HireMe\Entities\Candidate', 'id', 'id');
  }

  public function getCandidate() {
    $candidate = $this->candidate;

    if (is_null ($candidate)) {
      $candidate = new Candidate();
      $candidate->id = $this->id;
    }

    return $candidate;
  }

}
