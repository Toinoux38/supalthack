<head>
    <title>Top 10 des applications par client</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}


                    <h2>Top 10 des applications par client</h2>

                    <table>
                        <thead>
                        <tr>
                            <th>Client</th>
                            <th>Application</th>
                            <th>Montant Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($top10 as $item)
                            <tr>
                                <td>{{ $item->NomGrandClient }}</td>
                                <td>{{$item->NomApplication}}</td>
                                <td>{{ $item->MontantTotal }} €</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>




                    <canvas id="myChart" width="400" height="200"></canvas>


                    <canvas id="evolutionVolumeProduitsChart" width="800" height="400"></canvas>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    // Récupérer les données depuis le contrôleur
    var montantsParClient = <?php echo json_encode($evolutiontop5); ?>;

    // Extraire les noms des clients et les montants totaux
    var nomsClients = [];
    var montantsTotals = [];
    montantsParClient.forEach(function(client) {
        nomsClients.push(client.NomGrandClient);
        montantsTotals.push(client.MontantTotal);
    });

    // Créer un graphique
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nomsClients,
            datasets: [{
                label: 'Montant Total',
                data: montantsTotals,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<script>
    // Récupération des données
    let data = {
        labels: [],
        datasets: []
    };

    // Ajout des données récupérées à l'objet data
    let rows = <?php echo json_encode($evolutionVolumesProduits); ?>;
    let produits = {};
    let colors = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)']; // Ajoutez plus de couleurs si nécessaire

    let num = 0;
    rows.forEach(row => {
        if (!produits.hasOwnProperty(row.NomProduit)) {
            produits[row.NomProduit] = {
                label: row.NomProduit,
                data: [],
                backgroundColor: colors[num],
                borderColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 1
            };
        }
        num++;

        produits[row.NomProduit].data.push(row.VolumeTotal);
        if (!data.labels.includes(row.Mois)) {
            data.labels.push(row.Mois);
        }
    });

    // Ajout des produits à l'objet data
    for (let produit in produits) {
        data.datasets.push(produits[produit]);
    }

    // Configuration du graphique
    let config = {
        type: 'line',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Création du graphique
    var myChart = new Chart(
        document.getElementById('evolutionVolumeProduitsChart'),
        config
    );
</script>
