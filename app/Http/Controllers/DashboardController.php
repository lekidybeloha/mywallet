<?php

namespace App\Http\Controllers;

use App\Handlers\RedirectHandler;
use App\Helpers\ModelHelper;
use App\Helpers\RelationPaginator;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    private $relationPaginator;
    private $modelHelper;
    private $redirector;

    public function __construct()
    {
        $this->relationPaginator    = new RelationPaginator();
        $this->modelHelper          = new ModelHelper();
        $this->redirector           = new RedirectHandler();
    }

    public function main()
    {
        return view('dashboard.main');
    }

    public function revenus()
    {
        $revenus = $this->relationPaginator->getUserRelationWithPagination('revenus');
        $sources = $this->relationPaginator->getUserRelationWithPagination('sources');
        return view('dashboard.revenus', compact('revenus', 'sources'));
    }

    public function revenusSave(Request $verb)
    {
        $data = $verb->except('_token');
        $save = $this->modelHelper->modelSave('Revenu', $data);
        return $this->redirector->redirect($save);
    }

    public function depenses()
    {
        $depenses = $this->relationPaginator->getUserRelationWithPagination('depenses');
        return view('dashboard.depenses', compact('depenses'));
    }

    public function approvisionnements()
    {
        $approvisionnements = $this->relationPaginator->getUserRelationWithPagination('approvisionnements');;
        return view('dashboard.approvisionnements', compact('approvisionnements'));
    }

    public function sources()
    {
        $sources = $this->relationPaginator->getUserRelationWithPagination('sources');
        return view('dashboard.sources', compact('sources'));
    }

    public function sourcesSave(Request $verb)
    {
        $data = $verb->except('_token');
        $save = $this->modelHelper->modelSave('Source', $data);
        return $this->redirector->redirect($save);
    }

    public function projets()
    {
        $projets = $this->relationPaginator->getUserRelationWithPagination('projets');
        return view('dashboard.projets', compact('projets'));
    }
}
