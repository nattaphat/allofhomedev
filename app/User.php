<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

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
	protected $hidden = ['password', 'remember_token'];

    public function shop()
    {
        return $this->hasOne("App\Models\Shop");
    }

    public function project()
    {
        return $this->hasOne("App\Models\Project");
    }

    public function catHome()
    {
        return $this->hasOne("App\Models\CatHome");
    }

    public function catReview()
    {
        return $this->hasOne("App\Models\CatReview");
    }

    public function catIdea()
    {
        return $this->hasOne("App\Models\CatIdea");
    }

    public function comment()
    {
        return $this->hasOne("App\Models\Comment");
    }

    public function banner()
    {
        return $this->hasOne("App\Models\Banner");
    }
}
