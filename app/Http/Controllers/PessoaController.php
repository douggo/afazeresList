<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Model\Pessoa;

class PessoaController extends Controller {
    protected $pessoa = null;

    public function __construct(Pessoa $pessoa) {
        $this->pessoa = $pessoa;
    }

    public function lista() {
        $pessoas = $this->pessoa->getAll();
        return view('pessoa/listagem')->with('pessoas', $pessoas);
    }

    public function novo() {
        return view('pessoa/novo');
    }

    public function adiciona(Request $request) {
        $data = $request->all();
        $add = new Pessoa($data);
        $add->save();

        if ($add) {
            return redirect('/pessoas')->with('adicionou', true)->with('pessoa', $data['nome']);
        }
    }

    public function altera($id) {
        $resposta = $this->pessoa->getOne($id);
        return view('pessoa/altera')->with("p", $resposta);
    }

    public function update(Request $request) {
        $pessoa = $this->pessoa->getOne($request->id);
        $pessoa->fill($request->all());
        $pessoa->save();

        if ($pessoa) {
            return redirect('/pessoas')->with('alterado', true)->with('pessoa', $pessoa->nome);
        }
    }

    public function remove($id) {
        $pessoa = $this->pessoa->getOne($id);
        $pessoaNome = $pessoa->nome;
        $pessoa->delete();

        if ($pessoa) {
            return redirect('/pessoas')->with('removido', true)->with('pessoa', $pessoaNome);
        }
    }
}
?>