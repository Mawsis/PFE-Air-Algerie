<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white flex flex-col gap-4 p-10 items-center h-screen w-screen">
    <div class="flex justify-between bg-[#F6F8FC] h-1/4 w-full p-10 mt-8">
        <div class="flex flex-col justify-between">
            <h1 class=" font-semibold text-2xl text-[#19213D]">Rapport d'absences</h1>
            <div class="text-[#5D6481] text-sm">
                <h4 class="text-[#19213D] font-semibold text-base">Details du rapport:</h4>
                <p>Numero du rapport: </p>
                <p>Cree le: </p>
            </div>
        </div>
        <div class="flex flex-col justify-between">
            <img src="" alt="">
            <div class="text-[#5D6481] text-sm">
                <h4 class="text-[#19213D] font-semibold text-base">Air Algerie</h4>
                <p>021 98 63 63</p>
                <p>Dar El Beida, Alger, 16000 <br>Algerie</p>
            </div>
        </div>
    </div>
    <div class="w-full">
        <h1 class=" font-semibold text-xl">Employé:</h1>
        <div class=" ml-5 text-black text-opacity-80">
            <p>Nom:</p>
            <p>Prenom:</p>
            <p>Email:</p>
            <p>Téléphone:</p>
            <p>Direction:</p>
        </div>
    </div>
    <div class="w-full">
        <table class="table-auto text-center w-full">
            <thead>
                <tr>
                    <th class="text-[#5D6481] border-b px-4 py-2 text-sm text-left pl-28">Horarires</th>
                    <th class="text-[#5D6481] border-b px-4 py-2 text-sm">Type</th>
                    <th class="text-[#5D6481] border-b px-4 py-2 text-sm">Justifié</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absences as $absence)
                    <tr class="text-[#19213d]">
                        <td class="border-b px-4 py-2 text-sm text-left">
                            {{ $absence->horaire->heure_debut }} -
                            {{ $absence->horaire->heure_fin }}</td>
                        <td class=" border-b px-4 py-2 text-sm">{{ $absence->type }}</td>
                        <td class=" border-b px-4 py-2 text-sm">
                            {{ $absence->valide ? 'Justifié' : 'Non justifié' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class=" fixed left-0 bottom-0 bg-[#F6F8FC] h-[15%] w-full p-10 flex justify-between items-center">
        <div class="text-[#5d6481] text-sm">
            <h4 class="text-[#19213d] text-base">Air Algerie</h4>
            <p>www.airalgerie.com</p>
            <p>contact@airalgerie.com / 021 98 63 63 </p>
        </div>
        <img src="" alt="">
    </div>
</body>

</html>
