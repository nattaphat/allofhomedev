<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tambon;
use App\Models\Amphoe;
use App\Models\Provinces;
use App\User;

class Project extends Model {

    protected $table = 'project';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected  $fillable = [
        'user_id','project_name','project_company_owner','attachment_id',
        'lat','long','add_street','tambid','amphid','provid','region_id','area_id',
        'subarea_id','map_url','facebook','nearby_str','facility_str'
    ];

    public static function getPrjAddress($project_id)
    {
        $project = Project::find($project_id);
        $tambon = Tambon::where('tambid','=',$project->tambid)
            ->where('amphid','=', $project->amphid)
            ->where('provid','=', $project->provid)->get();
        $amphoe = Amphoe::where('amphid','=', $project->amphid)
            ->where('provid','=', $project->provid)->get();
        $province = Provinces::where('provid','=', $project->provid)->get();

        return $tambon[0]->name." ".$amphoe[0]->name." ".$province[0]->name;
    }

    public static function getFullPrjAddress($project_id)
    {
        $project = Project::find($project_id);
        $tambon = Tambon::where('tambid','=',$project->tambid)
            ->where('amphid','=', $project->amphid)
            ->where('provid','=', $project->provid)->get();
        $amphoe = Amphoe::where('amphid','=', $project->amphid)
            ->where('provid','=', $project->provid)->get();
        $province = Provinces::where('provid','=', $project->provid)->get();

        return "ถนน".$project->add_street." "
            .($project->provid == 10? "แขวง" : "ตำบล").$tambon[0]->name." "
            .($project->provid == 10? "เขต" : "อำเภอ").$amphoe[0]->name." "
            ."จังหวัด".$province[0]->name;
    }

    public static function getCreatedBy($user_id)
    {
        $user = User::find($user_id);
        return $user->firstname . " " . $user->lastname;
    }

    // belongsTo
    public function user()  // create_by
    {
        return $this->belongsTo("App\User");
    }

    public function attachment()
    {
        return $this->belongsTo("App\Models\Attachment");
    }

    public function tambon()
    {
        return $this->belongsTo("App\Models\Tambon");
    }

    public function region()
    {
        return $this->belongsTo("App\Models\GeoRegion");
    }

    public function area()
    {
        return $this->belongsTo("App\Models\Area");
    }

    public function subarea()
    {
        return $this->belongsTo("App\Models\SubArea");
    }

    // Morph
    public function projectBts()
    {
        return $this->morphMany('App\Models\ProjectBts', 'project_btsable');
    }

    public function projectMrt()
    {
        return $this->morphMany('App\Models\ProjectMrt', 'project_mrtable');
    }

    public function projectAplink()
    {
        return $this->morphMany('App\Models\ProjectAirportLink', 'project_aplinkable');
    }

    public function projectFacility()
    {
        return $this->morphMany('App\Models\ProjectFacility', 'project_facilityable');
    }

    // Has
    public function projectRating()
    {
        return $this->hasMany('App\Models\ProjectRating');
    }

    public function catHome()
    {
        return $this->hasMany('App\Models\CatHome');
    }

    public function catReview()
    {
        return $this->hasMany('App\Models\CatReview');
    }
}
