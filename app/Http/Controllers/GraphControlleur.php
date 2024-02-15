<?php

namespace App\Http\Controllers;

use App\Models\ligne_facturation;
use Illuminate\Http\Request;

class GraphControlleur extends Controller
{
    public static function displayTop10ApplicationsParClient()
    {
        $top10ApplicationsParGrandClient = ligne_facturation::selectRaw('grandclients.GrandClientID, grandclients.NomGrandClient, application.nomAppli AS NomApplication, SUM(ligne_facturation.prix) AS MontantTotal')
            ->join('clients', 'clients.CentreActiviteID', '=', 'ligne_facturation.CentreActiviteID')
            ->join('grandclients', 'grandclients.GrandClientID', '=', 'clients.GrandClientID')
            ->join('application', 'application.IRT', '=', 'ligne_facturation.IRT')
            ->groupBy('grandclients.GrandClientID', 'grandclients.NomGrandClient', 'application.nomAppli')
            ->orderByDesc('MontantTotal')
            ->take(10)
            ->get();

        return $top10ApplicationsParGrandClient;
    }


    public static function evolutionMontantsTop5Clients()
    {
        $resultats = ligne_facturation::selectRaw('grandclients.NomGrandClient, SUM(ligne_facturation.prix) AS MontantTotal')
            ->join('clients', 'clients.CentreActiviteID', '=', 'ligne_facturation.CentreActiviteID')
            ->join('grandclients', 'grandclients.GrandClientID', '=', 'clients.GrandClientID')
            ->whereBetween('ligne_facturation.mois', ['2021-01-01', '2022-04-30'])
            ->groupBy('grandclients.GrandClientID', 'grandclients.NomGrandClient')
            ->orderByDesc('MontantTotal')
            ->take(5)
            ->get();

        return $resultats;
    }

    public static function evolutionVolumesProduits()
    {
        $resultats = ligne_facturation::selectRaw('MONTH(ligne_facturation.mois) AS Mois, produit.NOM_PRODUIT AS NomProduit, SUM(ligne_facturation.volume) AS VolumeTotal')
            ->join('produit', 'ligne_facturation.produitID', '=', 'produit.produitID')
            ->whereIn('produit.NOM_PRODUIT', ['PRODUIT1_1', 'PRODUIT1_2', 'PRODUIT1_3', 'PRODUIT1_4', 'PRODUIT1_5', 'PRODUIT1_6', 'PRODUIT1_7', 'PRODUIT1_9'])
            ->whereBetween('ligne_facturation.mois', ['2021-01-01', '2022-04-30'])
            ->groupBy('Mois', 'produit.produitID', 'produit.NOM_PRODUIT')
            ->orderBy('Mois')
            ->get();

        return $resultats;
    }






}
