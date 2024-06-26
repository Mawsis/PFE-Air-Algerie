import DemandeCongeEnvoye from "@/Components/DemandeCongeEnvoye";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Link } from "@inertiajs/inertia-react";
import { Head } from "@inertiajs/react";
import { PlusCircle } from "lucide-react";
import React from "react";

const DemandeConge = ({ auth, demandes, soldes }) => {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-base md:text-xl text-gray-800 leading-tight">
                    Demandes de congés
                </h2>
            }
        >
            <Head title="Demandes Congés" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 md:p-6 gap-3 flex flex-col">
                        <div className="flex flex-col gap-3">
                            <h2 className="font-semibold text-base md:text-lg text-gray-700">
                                Solde de congé:
                            </h2>
                            <div className="flex flex-col gap-1 px-5">
                                {soldes.map((solde) => (
                                    <div
                                        key={solde.annee}
                                        className="flex w-full justify-between items-center gap-4 bg-gray-100 p-4 rounded-md"
                                    >
                                        <p>Année: {solde.annee}</p>
                                        <p>Jours totaux: {solde.jours_total}</p>
                                        <p>
                                            Jours consommés:{" "}
                                            {solde.jours_consommes}
                                        </p>
                                    </div>
                                ))}
                            </div>
                        </div>
                        <div className="text-gray-700 flex justify-between items-center">
                            <h2 className=" font-semibold text-sm sm:text-base md:text-lg w-32 sm:w-full">
                                Les demandes de congés envoyées:
                            </h2>
                            <Link
                                href={route("demander-conge.create")}
                                className="bg-main flex justify-center items-center gap-2 px-1 md:px-3 py-2 rounded-md text-white font-semibold sm:text-base md:text-lg border border-main hover:bg-white hover:text-main h-8 text-xs sm:h-full sm:w-72 md:w-80 lg:w-96"
                            >
                                <PlusCircle /> Demander un conge
                            </Link>
                        </div>
                        <div className="px-0 md:px-4">
                            <DemandeCongeEnvoye demandes={demandes} />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default DemandeConge;
