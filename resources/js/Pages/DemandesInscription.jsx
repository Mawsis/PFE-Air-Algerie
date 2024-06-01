import DemandeCongeEnvoyeChef from "@/Components/DemandeCongeEnvoyeChef";
import DemandesInscriptionEnvoye from "@/Components/DemandesInscriptionEnvoye";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Link } from "@inertiajs/inertia-react";
import { Head } from "@inertiajs/react";
import { PlusCircle } from "lucide-react";
import React from "react";

const DemandesInscription = ({ auth, demandes }) => {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Demandes d'inscription
                </h2>
            }
        >
            <Head title="Demandes d'inscriptions" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 gap-3 flex flex-col">
                        <div className="text-gray-700 flex justify-between items-center">
                            <h2 className=" font-semibold text-lg">
                                Les demandes d'inscriptions:
                            </h2>
                        </div>
                        <div className="px-4">
                            <DemandesInscriptionEnvoye demandes={demandes} />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default DemandesInscription;
