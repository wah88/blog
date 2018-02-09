<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }


    public function user(){ //$post->user
        return $this->belongsTo(User::class);
    }


    public function addComment($body){
       $user_id = auth()->id();
       $this->comments()->create(compact('body','user_id'));

     /*  Comment::create([
            'body' =>$body,
            'post_id' =>$this->id,
            'user_id' => auth()->id()
        ]);*/

    }

    public function scopeFilter($query, $filters)
    {

        if(isset($filters['month'])){
            $query->whereMonth('created_at',Carbon::parse($filters['month'])->month);
        }

        if(isset($filters['year'])){
            $query->whereYear('created_at',$filters['year']);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }


    public function tags()
    {

        // Any post my have many tags
        // Any tag may be applied to many posts
        //

       return $this->belongsToMany(Tag::class);

    }


}
