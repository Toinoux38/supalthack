<head>
    <title>Top 10 des applications par client</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

                    <h2>Top 10 des applications par client</h2>

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3 px-6">Client</th>
                                <th scope="col" class="py-3 px-6">Application</th>
                                <th scope="col" class="py-3 px-6">Montant Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($top10 as $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="py-4 px-6">{{ $item->NomGrandClient }}</td>
                                    <td class="py-4 px-6">{{$item->NomApplication}}</td>
                                    <td class="py-4 px-6">{{ $item->MontantTotal }} €</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>





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
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/65ec44838d261e1b5f6af5c3/1hohen8dm';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
