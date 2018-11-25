<?php

namespace App\Model;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Pessoa extends Model {
    protected $table = 'pessoas';
    protected $fillable = array('nome');
    public $timestamps = false;

    public function getAll() {
        return self::all();
    }

    public function getOne($id) {
        $pessoa = self::find($id);
        if (is_null($pessoa)) {
            return false;
        }
        return $pessoa;
    }
}
