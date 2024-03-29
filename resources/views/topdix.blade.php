<head>
    <title>Top 10 Apps</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Top 10 des applications par client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
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


