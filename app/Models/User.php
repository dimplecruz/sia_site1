<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
public $timestamps=false; 

protected $primaryKey = 'id';  //<-- primary key
// name sa table
protected $table = 'students';
// column sa table
protected $fillable = [
'id','firstname', 'lastname'
];
}