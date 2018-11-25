<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Model\AfazerLista;

class AfazerListaController extends Controller {
    protected $afazerLista = null;

    public function __construct(AfazerLista $afazerLista) {
        $this->afazerLista = $afazerLista;
    }

    public function lista($id) {
        $afazeres = $this->afazerLista->getAllComLista($id);
        $idLista = $id;
        return view('afazeresLista/listagem')->with('afazeres', $afazeres)->with('idLista', $idLista);
    }

    public function adiciona(Request $request) {
        $data = $request->all();
        $id_lista = $request->id_lista;
        $add = new AfazerLista($data);
        $add->save();

        if ($add) {
            return redirect('/afazeresLista/'. $id_lista)->with('adicionou', true);
        }
    }

    public function remove($id) {
        $afazerLista = $this->afazerLista->getOne($id);
        $idLista = $afazerLista->id_lista;
        $afazerLista->delete();

        if ($afazerLista) {
            return redirect('/afazeresLista/' . $idLista)->with('removido', true);
        }
    }
}
?>
