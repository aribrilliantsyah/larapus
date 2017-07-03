<?php

namespace App;

use App\Book;
use App\BorrowLog;
use App\Exceptions\BookException;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $cast =[
        'is_verified'=>'boolean',
    ];
    public function borrow(Book $book)
    {
        //cek apakah masih ada stock buku
        if($book->stock < 1){
            throw new BookException("Buku $book->title Sedang Tidak Tersedia.");            
        }
        //cek apakah buku ini sedang dipinjam oleh user
        if($this->borrowLogs()->where('book_id',$book->id)->where('is_returned',0)->count() > 0 ){
            throw new BookException("Buku $book->title Sedang Anda Pinjam.");
            
        }

        $borrowLog = BorrowLog::create(['user_id'=>$this->id,'book_id'=>$book->id]);
        return $borrowLog;
    }
    public function BorrowLogs()
    {
        return $this->hasMany('App\BorrowLog');
    }

}
