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

                    <canvas id="myChart" width="800" height="400"></canvas>

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
    let rows = <?php echo json_encode($evolutionVolumesProduits2); ?>;
    let produits = {};

    // Création d'une couleur pour chaque produit
    const colors = ['#FF5733', '#33FF57', '#3357FF', '#57FF33', '#5733FF', '#FF33E1', '#33E1FF', '#E1FF33'];

    // Parcourir les résultats pour préparer les données
    rows.forEach(row => {
        // Vérifier si le produit existe déjà dans produits, sinon ajouter un nouvel objet pour ce produit
        if (!produits[row.NomProduit]) {
            produits[row.NomProduit] = {
                label: row.NomProduit,
                data: [],
                backgroundColor: colors[Object.keys(produits).length % colors.length] // Utiliser une couleur différente pour chaque produit
            };
        }

        // Ajouter la valeur du volume au tableau de données du produit correspondant
        produits[row.NomProduit].data.push({
            monthYear: row.Mois,
            volume: row.VolumeTotal
        });
        // Ajouter le mois à l'axe des x s'il n'a pas déjà été ajouté
        if (!data.labels.includes(row.Mois)) {
            data.labels.push(row.Mois);
        }
    });

    // Trier les labels (mois et années) en ordre chronologique
    data.labels.sort((a, b) => new Date(a) - new Date(b));

    // Réorganiser les données des produits pour correspondre à l'ordre des labels
    Object.values(produits).forEach(produit => {
        produit.data.sort((a, b) => new Date(a.monthYear) - new Date(b.monthYear));
        produit.data = produit.data.map(entry => entry.volume);
        data.datasets.push(produit);
    });

    // Créer le graphique
    let ctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: true
                }]
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
