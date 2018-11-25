<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AfazerLista extends Model {
    protected $table = 'afazeres_lista';
    protected $fillable = array('id_lista', 'acao');
    public $timestamps = false;

    public function getAll($id) {
        return self::all();
    }

    public function getOne($id) {
        $afazeresLista = self::find($id);
        if (is_null($afazeresLista)) {
            return false;
        }
        return $afazeresLista;
    }

    public function getAllComLista($idLista) {
        $listas = DB::table('afazeres_lista')->where('id_lista', $idLista)->get();
        return $listas;
    }
}
