<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
protected $table = 'students';
// column sa table
protected $fillable = [
'student_first_name', 'student_last_name','student_phone_num'
];
}