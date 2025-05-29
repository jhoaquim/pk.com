<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Pessoas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'remember_token'
        ,'nivel'
        ,'status'
        ,'nome'
        ,'email'
        ,'rg_ie'
        ,'cpf_cnpj'
        ,'pis'
        ,'endereco_id'
        ,'dt_nascimento'
        ,'avatar'
        ,'pessoa_tp'
        ,'associado'
        ,'associado_id'
        ,'last_used_at'
        ,'obs'
        ,
    ];
/*
    public $rules = [
        'name'      => 'required | min:3 | max:70',
        'email'    => 'required | email | min:7 | max:70',
        //,'rg_ie',
        'cpf_cnpj' => 'required | regex:/^\d{11}|\d{14}$/',
        'endereco_id'      => 'required|integer',
        'dt_nasciment o'   => 'required | date_format:Y-m-d',
        //,'avatar',
        'pessoa_tp'        => 'required|in:F,J',
        'associado'        => 'required|in:true,false',
        'associado_id'     => 'required|integer',
        'last_used_at'     => Carbon::now()->toDateTimeString()

    ];
*/
    //protected $guardede = ['id'];

    public function getAvatarImageAttribute($value)
    {
        //return trim($value);
        return $this->avatar == null ? asset("images/null.png") : asset($this->avatar);
    }

    public function getAvatarFilenameAttribute($value)
    {
        return trim(substr($value, 30, strlen($this->$value)));
    }

    public function getDataNacimentoAttribute($value)
    {
        return dateFormatDatabaseScreen($value, 'screen');
    }

    //-------------------------------------mutator---------------------------------------->
    public function setDataNacimentoAttribute($value)
    {
        return $value;
        //$this->attributes['dt_nascimento'] = dateFormatDatabaseScreen($value);
    }

    public function setAvatarAttribute($value)
    {
        $filename = substr(md5(rand(1000000, 9999999)), 0, 7) . '_' . $value;
        $filepath = 'avatars/' . date('Y') . date('m') . date('d');
        $value = str_replace('public', 'storage', $filepath) . $filename;

        return trim(substr($value, 0, strlen($value)));
    }

}
