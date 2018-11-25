<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Model\Lista;
use App\Model\Pessoa;

class ListaController extends Controller {
    protected $lista = null;
    protected $pessoa = null;

    public function __construct(Lista $lista, Pessoa $pessoa) {
        $this->lista = $lista;
        $this->pessoa = $pessoa;
    }

    public function lista() {
        $listas = $this->lista->getAllComPessoa();
        return view('lista/listagem')->with('listas', $listas);
    }

    public function novo() {
        $pessoas = $this->pessoa->getAll();
        return view('lista/novo')->with('pessoas', $pessoas);
    }

    public function adiciona(Request $request) {
        $data = $request->all();
        $add = new Lista($data);
        $add->save();

        if ($add) {
            return redirect('/listas')->with('adicionou', true)->with('lista', $data['descricao']);
        }
    }

    public function altera($id) {
        $resposta = $this->lista->getOne($id);
        $pessoas = $this->pessoa->getAll();
        return view('lista/altera')->with("l", $resposta)->with('pessoas', $pessoas);
    }

    public function update(Request $request) {
        $lista = $this->lista->getOne($request->id);
        $lista->fill($request->all());
        $lista->save();

        if ($lista) {
            return redirect('/listas')->with('alterada', true)->with('lista', $lista->descricao);
        }
    }

    public function remove($id) {
        $lista = $this->lista->getOne($id);
        $listaDescricao = $lista->descricao;
        $lista->delete();

        if ($lista) {
            return redirect('/listas')->with('removida', true)->with('lista', $listaDescricao);
        }
    }


}
?>
