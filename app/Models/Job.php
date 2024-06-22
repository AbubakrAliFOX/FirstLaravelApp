<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Empolyer;
use App\Models\Tag;

class Job extends Model
{
    use HasFactory, Notifiable;
    protected $table = "jobs_listings";

    protected $fillable = ['title', 'salary'];

    public function empolyer()
    {
        return $this->belongsTo(Empolyer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "jobs_listings_id");
    }
}
