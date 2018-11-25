<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Lista extends Model {
    protected $table = 'listas';
    protected $fillable = array('descricao', 'prazo', 'id_pessoa');
    public $timestamps = false;

    public function getAll() {
        return self::all();
    }

    public function getOne($id) {
        $lista = self::find($id);
        if (is_null($lista)) {
            return false;
        }
        return $lista;
    }

    public function getAllComPessoa() {
        $listas = DB::table('listas')
                    ->join('pessoas', 'listas.id_pessoa', '=', 'pessoas.id')
                    ->select('listas.*', 'pessoas.nome')
                    ->get();
        return $listas;
    }
}
