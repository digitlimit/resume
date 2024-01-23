<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'job_title',
        'first_name',
        'last_name',
        'other_names'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];


    /**
     * Profile belongs to a User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * Summary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function summary()
    {
        return $this->hasOne(Summary::class);
    }

    /**
     * Education
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    /**
     * Interest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function interests()
    {
        return $this->hasMany(Interest::class);
    }

    /**
     * Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * Social
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    /**
     * Portfolio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    /**
     * Work Experience
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function work_experiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    /**
     * Core Value
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function core_values()
    {
        return $this->hasMany(CoreValue::class);
    }

    /**
     * Get all of the profile images.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
