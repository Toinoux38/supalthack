<head>
    <title>Evolution des volumes</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evolution des volumes (2021-2022)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

                        <canvas id="evolutionVolumeProduitsChart" width="800" height="400"></canvas>

                    </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>


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
