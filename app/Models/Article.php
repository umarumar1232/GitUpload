<?php

namespace App\Models;

use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model implements CanVisit
{
    use HasFactory, HasVisits;

    protected $guarded = ['id'];

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'article_categories', 'article_id', 'category_id');
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
