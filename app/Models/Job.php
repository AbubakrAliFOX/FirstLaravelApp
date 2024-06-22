<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Empolyer;

class Job extends Model
{
    use HasFactory, Notifiable;
    protected $table = "jobs_listings";

    protected $fillable = ['title', 'salary'];

    public function empolyer()
    {
        return $this->belongsTo(Empolyer::class);
    }
}
