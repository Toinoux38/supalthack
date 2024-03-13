<head>
    <title>Top 5 des clients</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Top 5 des clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <canvas id="myChart" width="400" height="200"></canvas>


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


