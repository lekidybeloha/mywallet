<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Helpers\RelationPaginator;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    private $relationPaginator;
    private $modelHelper;

    public function __construct()
    {
        $this->relationPaginator    = new RelationPaginator();
        $this->modelHelper          = new ModelHelper();
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
        if($save)
        {
            return redirect()->back()->with('success', 'Le revenu à bien été enregistré');
        }
        else
        {
            return redirect()->back()->with('error', 'Une erreur est survenu, veuillez reéssayer plus tard');
        }
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
        if($save)
        {
            return redirect()->back()->with('success', 'La source de revenu à bien été enregistrée');
        }
        else
        {
            return redirect()->back()->with('error', 'Une erreur est survenu, veuillez reéssayer plus tard');
        }
    }

    public function projets()
    {
        $projets = $this->relationPaginator->getUserRelationWithPagination('projets');
        return view('dashboard.projets', compact('projets'));
    }




}
