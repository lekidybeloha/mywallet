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

    /**
     * Show main dashboard
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function main()
    {
        return view('dashboard.main');
    }

    /**
     * Show revenu section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function revenus()
    {
        $revenus = $this->relationPaginator->getUserRelationWithPagination('revenus');
        $sources = $this->relationPaginator->getUserRelationWithPagination('sources');
        return view('dashboard.revenus', compact('revenus', 'sources'));
    }

    /**
     * Save user revenu
     * @param Request $verb
     * @return \Illuminate\Http\RedirectResponse
     */
    public function revenusSave(Request $verb)
    {
        $data = $verb->except('_token');
        $save = $this->modelHelper->modelSave('Revenu', $data);
        return $this->redirector->redirect($save);
    }

    /**
     * Show depense section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function depenses()
    {
        $depenses = $this->relationPaginator->getUserRelationWithPagination('depenses');
        return view('dashboard.depenses', compact('depenses'));
    }

    /**
     * Show approvisionnement section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function approvisionnements()
    {
        $approvisionnements = $this->relationPaginator->getUserRelationWithPagination('approvisionnements');;
        return view('dashboard.approvisionnements', compact('approvisionnements'));
    }

    /**
     * Show 'source de revenu' section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sources()
    {
        $sources = $this->relationPaginator->getUserRelationWithPagination('sources');
        return view('dashboard.sources', compact('sources'));
    }

    /**
     * Save "source de revenu
     * @param Request $verb
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sourcesSave(Request $verb)
    {
        $data = $verb->except('_token');
        $save = $this->modelHelper->modelSave('Source', $data);
        return $this->redirector->redirect($save);
    }

    /**
     * Show projets section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function projets()
    {
        $projets = $this->relationPaginator->getUserRelationWithPagination('projets');
        return view('dashboard.projets', compact('projets'));
    }
}
