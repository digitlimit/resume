<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should not be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Summary belongs to a Profile
     *
     * @return BelongsTo
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Scope a query to only read messages.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeRead(Builder $query): Builder
    {
        return $query->where('read', true);
    }

    /**
     * Scope a query to only unread messages.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeUnread(Builder $query): Builder
    {
        return $query->where('read', false);
    }

    public function markAsRead(): void
    {
        if ($this->id) {
            return;
        }

        $this->update(['read' => true]);
    }

    public function markAsUnread(): void
    {
        if ($this->id) {
            return;
        }

        $this->update(['read' => false]);
    }
}
