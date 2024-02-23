<?php

// model file ka use  database intraction aur logic laganeka hota hai
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormData extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="_form_data_";
    protected $primaryKey="student_id";



// mutator ka use hum data db me set karte time kuchh modification karna ho to karte hai.

//mutator ka use me jo function banate hai vo same column name hona chahiye db me aur jo atributes['type of table name hona chaiye'], ucword() ka use words ke stratinng letter ko capital karne ke liye hota hai. -


    public function setStudentNameAttribute($value){
    $this->attributes['student_name'] = ucwords($value);
}




// accessor ka use hum data db se data get karte time kuchh modification karna ho to karte hai.

public function getDobAttribute($value){
    
    return date("d-M-Y",strtotime($value));
}


}
