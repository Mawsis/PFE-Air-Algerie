import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { Link, useForm, usePage } from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel";
import { PlusCircle } from "lucide-react";
import InputError from "@/Components/InputError";

const Absences = ({ auth, direction, absences }) => {
    console.log(absences);
    absences = absences[0];
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Demande de conge
                </h2>
            }
        >
            <Head title="Demande Conge" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 gap-3 flex flex-col">
                        <h2 className="text-lg">
                            Absence des employes de la direction {direction.nom}{" "}
                            :
                        </h2>
                        <div>
                            <table className="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th className="border px-4 py-2">
                                            Nom
                                        </th>
                                        <th className="border px-4 py-2">
                                            Prenom
                                        </th>
                                        <th className="border px-4 py-2">
                                            Horaire
                                        </th>
                                        <th className="border px-4 py-2">
                                            Excuser
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {absences.map((absence) => (
                                        <tr key={absence.id}>
                                            <td className="border px-4 py-2">
                                                {absence.employee.nom}
                                            </td>
                                            <td className="border px-4 py-2">
                                                {absence.employee.prenom}
                                            </td>
                                            <td className="border px-4 py-2">
                                                {absence.horaire.date_debut} -{" "}
                                                {absence.horaire.date_fin}
                                            </td>
                                            <td className="border px-4 py-2">
                                                {absence.valide}
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default Absences;
