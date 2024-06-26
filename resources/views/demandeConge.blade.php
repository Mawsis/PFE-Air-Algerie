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
            <h1 class=" font-semibold text-2xl text-[#19213D]">Demande Conge</h1>
            <div class="text-[#5D6481] text-sm">
                <h4 class="text-[#19213D] font-semibold text-base">Details de la demande:</h4>
                <p>Numero du rapport: {{ str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT) }}</p>
                <p>Cree le: {{ \Carbon\Carbon::now()->format('Y-n-j') }} </p>
            </div>
        </div>
        <div class="flex flex-col justify-between">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 269.82 47.97">
                <defs>
                    <style>
                        .cls-1,
                        .cls-2 {
                            fill: #e2231a;
                        }

                        .cls-2 {
                            fill-rule: evenodd;
                        }
                    </style>
                </defs>
                <g id="Layer_2" data-name="Layer 2">
                    <g id="Calque_1" data-name="Calque 1">
                        <path class="cls-1" d="M31.93,3.2h2.9L32.75,13.68a2.21,2.21,0,0,1-2.08,1.73H29.5"></path>
                        <path class="cls-1" d="M179.87,3.2H177l-2.43,12.21h1.18a2.22,2.22,0,0,0,2.07-1.73"></path>
                        <path class="cls-1" d="M113.14,3.2h-2.91L107.8,15.41H109a2.21,2.21,0,0,0,2.07-1.73"></path>
                        <path class="cls-1" d="M60.77,3.2h-2.9L55.44,15.41h1.17a2.21,2.21,0,0,0,2.07-1.73"></path>
                        <path class="cls-1" d="M96.11,16.22l-.57,2.85h1.17a2.21,2.21,0,0,0,2.08-1.73L99,16.22"></path>
                        <path class="cls-1" d="M160.75,3.2l-.57,2.85h1.18a2.22,2.22,0,0,0,2.07-1.73l.22-1.12"></path>
                        <path class="cls-1" d="M71.63,16.22l-.57,2.85h1.18a2.21,2.21,0,0,0,2.07-1.73l.23-1.12"></path>
                        <path class="cls-1" d="M71.33,3.2l-.57,2.85h1.17A2.22,2.22,0,0,0,74,4.32l.22-1.12"></path>
                        <path class="cls-1" d="M67.61,3.2,67,6.05h1.18a2.22,2.22,0,0,0,2.07-1.73l.23-1.12"></path>
                        <path class="cls-1" d="M43.74,16.22l-.57,2.85h1.17a2.21,2.21,0,0,0,2.08-1.73l.22-1.12"></path>
                        <path class="cls-1"
                            d="M25.86,6.86l-1.13,5.7H21l1.13-5.7h-2.9L16.83,19.07H18a2.21,2.21,0,0,0,2.07-1.73l.38-1.93h4.88a2.21,2.21,0,0,0,2.07-1.73l1.36-6.82">
                        </path>
                        <path class="cls-1"
                            d="M35.28,19.07a2.21,2.21,0,0,0,2.07-1.73l.38-1.93H51.28a2.21,2.21,0,0,0,2.07-1.73L55.44,3.2H52.53l-1.86,9.36L46,7.88a3.47,3.47,0,0,0-2.46-1H40.94l5.7,5.7H38.3l1.14-5.7H36.53L34.1,19.07">
                        </path>
                        <path class="cls-1" d="M8.34,16.22l-.56,2.85H9A2.21,2.21,0,0,0,11,17.34l.22-1.12"></path>
                        <path class="cls-1" d="M8,3.2,7.48,6.05H8.65a2.23,2.23,0,0,0,2.08-1.73L11,3.2"></path>
                        <path class="cls-1" d="M37.26,3.2l-.57,2.85h1.18a2.22,2.22,0,0,0,2.07-1.73l.23-1.12"></path>
                        <path class="cls-1" d="M4.32,3.2,3.76,6.05H4.93A2.22,2.22,0,0,0,7,4.32L7.23,3.2"></path>
                        <path class="cls-1"
                            d="M16.83,6.86l-1.36,6.82a2.21,2.21,0,0,1-2.07,1.73H8.51l.34-1.73a2.22,2.22,0,0,1-2.07,1.73H3.51A3.42,3.42,0,0,1,.08,11.13,5.48,5.48,0,0,1,5.21,6.86h5s-.87,4.4-1.13,5.7h3.7l1.13-5.7M4.64,9.71a1.84,1.84,0,0,0-1.71,1.43,1.14,1.14,0,0,0,1.15,1.42H6.19l.56-2.85Z">
                        </path>
                        <path class="cls-1" d="M12.06,16.22l-.56,2.85h1.17a2.19,2.19,0,0,0,2.07-1.73L15,16.23"></path>
                        <path class="cls-1"
                            d="M80.11,6.86l-1.35,6.82a2.22,2.22,0,0,1-2.08,1.73H71.79l.35-1.73a2.23,2.23,0,0,1-2.08,1.73H66.79a3.41,3.41,0,0,1-3.42-4.28,5.47,5.47,0,0,1,5.12-4.27h5l-1.14,5.7h3.71l1.13-5.7M67.93,9.71a1.83,1.83,0,0,0-1.71,1.43,1.13,1.13,0,0,0,1.14,1.42h2.11L70,9.71Z">
                        </path>
                        <path class="cls-1" d="M75.35,16.22l-.57,2.85H76A2.21,2.21,0,0,0,78,17.34l.22-1.11"></path>
                        <path class="cls-1"
                            d="M88.33,9.71l-.57,2.85h-2.1a1.14,1.14,0,0,1-1.15-1.42,1.84,1.84,0,0,1,1.71-1.43M104.9,3.2,103,12.56,98.36,7.88a3.47,3.47,0,0,0-2.46-1H93.31l5.7,5.7H90.67l1.13-5.7h-5a5.48,5.48,0,0,0-5.13,4.28,3.41,3.41,0,0,0,3.43,4.27H87.2l-.73,3.66h1.17a2.21,2.21,0,0,0,2.08-1.73l.38-1.93h13.55a2.21,2.21,0,0,0,2.07-1.73L107.8,3.2Z">
                        </path>
                        <path class="cls-1"
                            d="M171.64,3.2l-1.86,9.36-4.69-4.68a3.43,3.43,0,0,0-2.45-1h-2.59l5.7,5.7h-8.32l1.14-5.7h-4.24a3.51,3.51,0,0,0-2.47,1l-4.67,4.68,1.86-9.36h-2.91l-1.86,9.36h-2.43L143,6.86h-5a5.47,5.47,0,0,0-5.12,4.27,3.4,3.4,0,0,0,3.42,4.28h2.11l-.73,3.66h1.18a2.22,2.22,0,0,0,2.07-1.73l.39-1.93h13.86a2.22,2.22,0,0,0,2.06-1.73l-.35,1.73h13.52a2.23,2.23,0,0,0,2.08-1.73L174.54,3.2M139,12.56h-2.11a1.14,1.14,0,0,1-1.14-1.42,1.83,1.83,0,0,1,1.71-1.43h2.11Zm15.58,0h-3.31l4.13-4.13Z">
                        </path>
                        <path class="cls-1"
                            d="M29.5,3.2h-.86a1.13,1.13,0,0,0-.82.34L26.26,5.1h-.93l.61.61a1.16,1.16,0,0,0,.82.34h1.58a.75.75,0,0,0,.71-.57l.07-.38H27.6">
                        </path>
                        <path class="cls-1"
                            d="M117.9,15.41a2.2,2.2,0,0,1-2.1-1.7l-.23-1.15H117l1.86-9.36h2.91l-1.87,9.36,4.68-4.68a3.47,3.47,0,0,1,2.46-1h4.24l-1.35,6.82a2.22,2.22,0,0,1-2.06,1.73m-3.94-2.85h3.32l.82-4.13Z">
                        </path>
                        <path class="cls-1"
                            d="M85.23,40.42l2.84-14.27H83.64L79.93,44.77H92.46a3.38,3.38,0,0,0,3.21-2.59L96,40.42">
                        </path>
                        <path class="cls-1"
                            d="M164.65,26.15l-3.71,18.62h12.54a3.38,3.38,0,0,0,3.2-2.59l.35-1.76H166.24l.56-2.79h8.1A3.4,3.4,0,0,0,178.11,35l.34-1.76H167.66l.56-2.79h8.1a3.39,3.39,0,0,0,3.21-2.59l.35-1.75">
                        </path>
                        <path class="cls-1" d="M160.94,26.15h-4.42l-3.71,18.62h1.8a3.38,3.38,0,0,0,3.16-2.64"></path>
                        <path class="cls-1"
                            d="M73.47,26.15a5.33,5.33,0,0,0-3.76,1.55L52.65,44.77H57.7A2.62,2.62,0,0,0,59.56,44l3.58-3.58H70a3.4,3.4,0,0,0,3.21-2.57L71.8,44.77h1.79a3.38,3.38,0,0,0,3.17-2.64l3.17-16m-6.4,9.93h-6L75,28.53Z">
                        </path>
                        <path class="cls-1"
                            d="M20.82,26.15a5.29,5.29,0,0,0-3.75,1.55L0,44.77H5.05A2.66,2.66,0,0,0,6.92,44l3.57-3.58h6.84a3.39,3.39,0,0,0,3.2-2.57l-1.38,6.92h1.79a3.38,3.38,0,0,0,3.17-2.64l3.18-16m-6.41,9.93h-6l7.54-7.55Z">
                        </path>
                        <path class="cls-1"
                            d="M147.26,39.27l5.5,5.5h-5a2.66,2.66,0,0,1-1.87-.77l-4.73-4.73-.57,2.86a3.38,3.38,0,0,1-3.16,2.64h-1.79l3.7-18.62h7.92A5.43,5.43,0,0,1,152.68,33a8.9,8.9,0,0,1-5.42,6.3m-1.91-3.81a3.17,3.17,0,0,0,3-2.49,2,2,0,0,0-2-2.48h-3.48l-1,5Z">
                        </path>
                        <path class="cls-1"
                            d="M47.09,39.27l5.51,5.5H47.54A2.64,2.64,0,0,1,45.68,44L41,39.27l-.57,2.86a3.38,3.38,0,0,1-3.17,2.64H35.42l3.71-18.62H47A5.43,5.43,0,0,1,52.51,33a8.86,8.86,0,0,1-5.42,6.3m-1.9-3.81a3.18,3.18,0,0,0,3-2.49,2,2,0,0,0-2-2.48H42.69l-1,5Z">
                        </path>
                        <path class="cls-1" d="M35.42,26.15H31l-3.7,18.62h1.79a3.37,3.37,0,0,0,3.16-2.64"></path>
                        <path class="cls-1"
                            d="M107.37,26.15A11.94,11.94,0,0,0,96.2,35.46c-1,5.14,2.32,9.31,7.46,9.31H113l1.86-9.34H113a3.37,3.37,0,0,0-3.16,2.64l-.47,2.35h-4.92a4,4,0,0,1-4-5,6.35,6.35,0,0,1,5.95-5h6.64a3.38,3.38,0,0,0,3.21-2.58l.35-1.76">
                        </path>
                        <path class="cls-1"
                            d="M116.66,44.77h12.53a3.39,3.39,0,0,0,3.21-2.59l.34-1.75H122l.56-2.8h8.1A3.4,3.4,0,0,0,133.82,35l.35-1.76h-10.8l.56-2.79H132a3.39,3.39,0,0,0,3.21-2.58l.35-1.76H120.37">
                        </path>
                        <path class="cls-1"
                            d="M127,20.56a.77.77,0,0,0-.73.62l-.75,3.73H127a1.25,1.25,0,0,0,.88-.37l4-4"></path>
                        <path class="cls-2"
                            d="M269.82,24c0,13.25-16.11,24-36,24s-36-10.74-36-24S214,0,233.84,0s36,10.74,36,24M240.42,7.75a24.88,24.88,0,0,0-14.1-5.61,52.61,52.61,0,0,1,7.52-.54c17.78,0,32.4,8.78,34.19,20a20.12,20.12,0,0,1-15.84-4.35Zm11.77,22.92A20.08,20.08,0,0,1,268,26.32c-1.79,11.26-16.41,20-34.19,20a52.61,52.61,0,0,1-7.52-.54,24.94,24.94,0,0,0,14.1-5.6Zm16-7.49H209.9c.46-4.78,5-8.92,11.71-11.23l6.6,5.35A20.05,20.05,0,0,0,240,21.85a20,20,0,0,1-3.78-2.45L224.43,9.84a25,25,0,0,0-9.06-4.74c-9.57,4-15.9,11-15.9,18.88s6.34,14.91,15.9,18.88a24.81,24.81,0,0,0,9.06-4.73l11.77-9.56A20,20,0,0,1,240,26.12a20,20,0,0,0-11.77,4.55L221.61,36c-6.67-2.31-11.25-6.45-11.71-11.24h58.29a14.23,14.23,0,0,0,0-1.6">
                        </path>
                    </g>
                </g>
            </svg>

            <div class="text-[#5D6481] text-sm">
                <h4 class="text-[#19213D] font-semibold text-base">Air Algerie</h4>
                <p>021 98 63 63</p>
                <p>Dar El Beida, Alger, 16000 <br>Algerie</p>
            </div>
        </div>
    </div>
    <div class="w-full h-full">
        <h1 class=" font-semibold text-xl">Employé:</h1>
        <div class=" ml-5 text-black` text-opacity-80">
            <p>Nom:{{ $employee->nom }}</p>
            <p>Prenom: {{ $employee->prenom }} </p>
            <p>Email: {{ $employee->email }} </p>
            <p>Téléphone: {{ $employee->telephone }} </p>
            <p>Direction: {{ $employee->direction->nom }}</p>
            <p>Date debut: {{ Carbon\Carbon::parse($demande->date_debut)->format('Y-n-j') }}</p>
            <p>Date debut: {{ Carbon\Carbon::parse($demande->date_fin)->format('Y-n-j') }}</p>
            <p>Approuvé par le chef: {{ $demande?->chef?->nom }}</p>
            <p>Approuvé par RH: {{ $demande->admin->nom }}</p>
        </div>
        <div class="w-full h-1/2 flex justify-end items-end">
            <h1 class="text-3xl text-green-500 font-bold">
                Approuvée
            </h1>
        </div>
    </div>
    <div class=" fixed left-0 bottom-0 bg-[#F6F8FC] h-[15%] w-full p-10 flex justify-between items-center">
        <div class="text-[#5d6481] text-sm">
            <h4 class="text-[#19213d] text-base">Air Algerie</h4>
            <p>www.airalgerie.com</p>
            <p>contact@airalgerie.com / 021 98 63 63 </p>
        </div>
        <?xml version="1.0" encoding="UTF-8"?>
        <svg class="w-1/3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 269.82 47.97">
            <defs>
                <style>
                    .cls-1,
                    .cls-2 {
                        fill: #e2231a;
                    }

                    .cls-2 {
                        fill-rule: evenodd;
                    }
                </style>
            </defs>
            <g id="Layer_2" data-name="Layer 2">
                <g id="Calque_1" data-name="Calque 1">
                    <path class="cls-1" d="M31.93,3.2h2.9L32.75,13.68a2.21,2.21,0,0,1-2.08,1.73H29.5"></path>
                    <path class="cls-1" d="M179.87,3.2H177l-2.43,12.21h1.18a2.22,2.22,0,0,0,2.07-1.73"></path>
                    <path class="cls-1" d="M113.14,3.2h-2.91L107.8,15.41H109a2.21,2.21,0,0,0,2.07-1.73"></path>
                    <path class="cls-1" d="M60.77,3.2h-2.9L55.44,15.41h1.17a2.21,2.21,0,0,0,2.07-1.73"></path>
                    <path class="cls-1" d="M96.11,16.22l-.57,2.85h1.17a2.21,2.21,0,0,0,2.08-1.73L99,16.22"></path>
                    <path class="cls-1" d="M160.75,3.2l-.57,2.85h1.18a2.22,2.22,0,0,0,2.07-1.73l.22-1.12"></path>
                    <path class="cls-1" d="M71.63,16.22l-.57,2.85h1.18a2.21,2.21,0,0,0,2.07-1.73l.23-1.12"></path>
                    <path class="cls-1" d="M71.33,3.2l-.57,2.85h1.17A2.22,2.22,0,0,0,74,4.32l.22-1.12"></path>
                    <path class="cls-1" d="M67.61,3.2,67,6.05h1.18a2.22,2.22,0,0,0,2.07-1.73l.23-1.12"></path>
                    <path class="cls-1" d="M43.74,16.22l-.57,2.85h1.17a2.21,2.21,0,0,0,2.08-1.73l.22-1.12"></path>
                    <path class="cls-1"
                        d="M25.86,6.86l-1.13,5.7H21l1.13-5.7h-2.9L16.83,19.07H18a2.21,2.21,0,0,0,2.07-1.73l.38-1.93h4.88a2.21,2.21,0,0,0,2.07-1.73l1.36-6.82">
                    </path>
                    <path class="cls-1"
                        d="M35.28,19.07a2.21,2.21,0,0,0,2.07-1.73l.38-1.93H51.28a2.21,2.21,0,0,0,2.07-1.73L55.44,3.2H52.53l-1.86,9.36L46,7.88a3.47,3.47,0,0,0-2.46-1H40.94l5.7,5.7H38.3l1.14-5.7H36.53L34.1,19.07">
                    </path>
                    <path class="cls-1" d="M8.34,16.22l-.56,2.85H9A2.21,2.21,0,0,0,11,17.34l.22-1.12"></path>
                    <path class="cls-1" d="M8,3.2,7.48,6.05H8.65a2.23,2.23,0,0,0,2.08-1.73L11,3.2"></path>
                    <path class="cls-1" d="M37.26,3.2l-.57,2.85h1.18a2.22,2.22,0,0,0,2.07-1.73l.23-1.12"></path>
                    <path class="cls-1" d="M4.32,3.2,3.76,6.05H4.93A2.22,2.22,0,0,0,7,4.32L7.23,3.2"></path>
                    <path class="cls-1"
                        d="M16.83,6.86l-1.36,6.82a2.21,2.21,0,0,1-2.07,1.73H8.51l.34-1.73a2.22,2.22,0,0,1-2.07,1.73H3.51A3.42,3.42,0,0,1,.08,11.13,5.48,5.48,0,0,1,5.21,6.86h5s-.87,4.4-1.13,5.7h3.7l1.13-5.7M4.64,9.71a1.84,1.84,0,0,0-1.71,1.43,1.14,1.14,0,0,0,1.15,1.42H6.19l.56-2.85Z">
                    </path>
                    <path class="cls-1" d="M12.06,16.22l-.56,2.85h1.17a2.19,2.19,0,0,0,2.07-1.73L15,16.23"></path>
                    <path class="cls-1"
                        d="M80.11,6.86l-1.35,6.82a2.22,2.22,0,0,1-2.08,1.73H71.79l.35-1.73a2.23,2.23,0,0,1-2.08,1.73H66.79a3.41,3.41,0,0,1-3.42-4.28,5.47,5.47,0,0,1,5.12-4.27h5l-1.14,5.7h3.71l1.13-5.7M67.93,9.71a1.83,1.83,0,0,0-1.71,1.43,1.13,1.13,0,0,0,1.14,1.42h2.11L70,9.71Z">
                    </path>
                    <path class="cls-1" d="M75.35,16.22l-.57,2.85H76A2.21,2.21,0,0,0,78,17.34l.22-1.11"></path>
                    <path class="cls-1"
                        d="M88.33,9.71l-.57,2.85h-2.1a1.14,1.14,0,0,1-1.15-1.42,1.84,1.84,0,0,1,1.71-1.43M104.9,3.2,103,12.56,98.36,7.88a3.47,3.47,0,0,0-2.46-1H93.31l5.7,5.7H90.67l1.13-5.7h-5a5.48,5.48,0,0,0-5.13,4.28,3.41,3.41,0,0,0,3.43,4.27H87.2l-.73,3.66h1.17a2.21,2.21,0,0,0,2.08-1.73l.38-1.93h13.55a2.21,2.21,0,0,0,2.07-1.73L107.8,3.2Z">
                    </path>
                    <path class="cls-1"
                        d="M171.64,3.2l-1.86,9.36-4.69-4.68a3.43,3.43,0,0,0-2.45-1h-2.59l5.7,5.7h-8.32l1.14-5.7h-4.24a3.51,3.51,0,0,0-2.47,1l-4.67,4.68,1.86-9.36h-2.91l-1.86,9.36h-2.43L143,6.86h-5a5.47,5.47,0,0,0-5.12,4.27,3.4,3.4,0,0,0,3.42,4.28h2.11l-.73,3.66h1.18a2.22,2.22,0,0,0,2.07-1.73l.39-1.93h13.86a2.22,2.22,0,0,0,2.06-1.73l-.35,1.73h13.52a2.23,2.23,0,0,0,2.08-1.73L174.54,3.2M139,12.56h-2.11a1.14,1.14,0,0,1-1.14-1.42,1.83,1.83,0,0,1,1.71-1.43h2.11Zm15.58,0h-3.31l4.13-4.13Z">
                    </path>
                    <path class="cls-1"
                        d="M29.5,3.2h-.86a1.13,1.13,0,0,0-.82.34L26.26,5.1h-.93l.61.61a1.16,1.16,0,0,0,.82.34h1.58a.75.75,0,0,0,.71-.57l.07-.38H27.6">
                    </path>
                    <path class="cls-1"
                        d="M117.9,15.41a2.2,2.2,0,0,1-2.1-1.7l-.23-1.15H117l1.86-9.36h2.91l-1.87,9.36,4.68-4.68a3.47,3.47,0,0,1,2.46-1h4.24l-1.35,6.82a2.22,2.22,0,0,1-2.06,1.73m-3.94-2.85h3.32l.82-4.13Z">
                    </path>
                    <path class="cls-1"
                        d="M85.23,40.42l2.84-14.27H83.64L79.93,44.77H92.46a3.38,3.38,0,0,0,3.21-2.59L96,40.42"></path>
                    <path class="cls-1"
                        d="M164.65,26.15l-3.71,18.62h12.54a3.38,3.38,0,0,0,3.2-2.59l.35-1.76H166.24l.56-2.79h8.1A3.4,3.4,0,0,0,178.11,35l.34-1.76H167.66l.56-2.79h8.1a3.39,3.39,0,0,0,3.21-2.59l.35-1.75">
                    </path>
                    <path class="cls-1" d="M160.94,26.15h-4.42l-3.71,18.62h1.8a3.38,3.38,0,0,0,3.16-2.64"></path>
                    <path class="cls-1"
                        d="M73.47,26.15a5.33,5.33,0,0,0-3.76,1.55L52.65,44.77H57.7A2.62,2.62,0,0,0,59.56,44l3.58-3.58H70a3.4,3.4,0,0,0,3.21-2.57L71.8,44.77h1.79a3.38,3.38,0,0,0,3.17-2.64l3.17-16m-6.4,9.93h-6L75,28.53Z">
                    </path>
                    <path class="cls-1"
                        d="M20.82,26.15a5.29,5.29,0,0,0-3.75,1.55L0,44.77H5.05A2.66,2.66,0,0,0,6.92,44l3.57-3.58h6.84a3.39,3.39,0,0,0,3.2-2.57l-1.38,6.92h1.79a3.38,3.38,0,0,0,3.17-2.64l3.18-16m-6.41,9.93h-6l7.54-7.55Z">
                    </path>
                    <path class="cls-1"
                        d="M147.26,39.27l5.5,5.5h-5a2.66,2.66,0,0,1-1.87-.77l-4.73-4.73-.57,2.86a3.38,3.38,0,0,1-3.16,2.64h-1.79l3.7-18.62h7.92A5.43,5.43,0,0,1,152.68,33a8.9,8.9,0,0,1-5.42,6.3m-1.91-3.81a3.17,3.17,0,0,0,3-2.49,2,2,0,0,0-2-2.48h-3.48l-1,5Z">
                    </path>
                    <path class="cls-1"
                        d="M47.09,39.27l5.51,5.5H47.54A2.64,2.64,0,0,1,45.68,44L41,39.27l-.57,2.86a3.38,3.38,0,0,1-3.17,2.64H35.42l3.71-18.62H47A5.43,5.43,0,0,1,52.51,33a8.86,8.86,0,0,1-5.42,6.3m-1.9-3.81a3.18,3.18,0,0,0,3-2.49,2,2,0,0,0-2-2.48H42.69l-1,5Z">
                    </path>
                    <path class="cls-1" d="M35.42,26.15H31l-3.7,18.62h1.79a3.37,3.37,0,0,0,3.16-2.64"></path>
                    <path class="cls-1"
                        d="M107.37,26.15A11.94,11.94,0,0,0,96.2,35.46c-1,5.14,2.32,9.31,7.46,9.31H113l1.86-9.34H113a3.37,3.37,0,0,0-3.16,2.64l-.47,2.35h-4.92a4,4,0,0,1-4-5,6.35,6.35,0,0,1,5.95-5h6.64a3.38,3.38,0,0,0,3.21-2.58l.35-1.76">
                    </path>
                    <path class="cls-1"
                        d="M116.66,44.77h12.53a3.39,3.39,0,0,0,3.21-2.59l.34-1.75H122l.56-2.8h8.1A3.4,3.4,0,0,0,133.82,35l.35-1.76h-10.8l.56-2.79H132a3.39,3.39,0,0,0,3.21-2.58l.35-1.76H120.37">
                    </path>
                    <path class="cls-1" d="M127,20.56a.77.77,0,0,0-.73.62l-.75,3.73H127a1.25,1.25,0,0,0,.88-.37l4-4">
                    </path>
                    <path class="cls-2"
                        d="M269.82,24c0,13.25-16.11,24-36,24s-36-10.74-36-24S214,0,233.84,0s36,10.74,36,24M240.42,7.75a24.88,24.88,0,0,0-14.1-5.61,52.61,52.61,0,0,1,7.52-.54c17.78,0,32.4,8.78,34.19,20a20.12,20.12,0,0,1-15.84-4.35Zm11.77,22.92A20.08,20.08,0,0,1,268,26.32c-1.79,11.26-16.41,20-34.19,20a52.61,52.61,0,0,1-7.52-.54,24.94,24.94,0,0,0,14.1-5.6Zm16-7.49H209.9c.46-4.78,5-8.92,11.71-11.23l6.6,5.35A20.05,20.05,0,0,0,240,21.85a20,20,0,0,1-3.78-2.45L224.43,9.84a25,25,0,0,0-9.06-4.74c-9.57,4-15.9,11-15.9,18.88s6.34,14.91,15.9,18.88a24.81,24.81,0,0,0,9.06-4.73l11.77-9.56A20,20,0,0,1,240,26.12a20,20,0,0,0-11.77,4.55L221.61,36c-6.67-2.31-11.25-6.45-11.71-11.24h58.29a14.23,14.23,0,0,0,0-1.6">
                    </path>
                </g>
            </g>
        </svg>


    </div>
</body>

</html>
