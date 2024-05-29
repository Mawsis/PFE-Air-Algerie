import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { Link, useForm, usePage } from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel";
import { PlusCircle } from "lucide-react";
import InputError from "@/Components/InputError";

const Absences = ({ auth, direction, absences, employee }) => {
    console.log(absences);
    const excuse = (e) => {};
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Absences
                </h2>
            }
        >
            <Head title="Demande Conge" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 gap-3 flex flex-col">
                        <h2 className="text-lg font-medium">
                            Absence des employes de la direction {direction.nom}{" "}
                            :
                        </h2>
                        {employee && (
                            <div className="flex justify-between items-center">
                                <h3 className=" text-base font-medium">
                                    L'employe: {employee.nom + employee.prenom}
                                </h3>
                                <Link
                                    className="bg-main flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold border border-main hover:bg-white hover:text-main "
                                    href={route("absences.rapport", {
                                        employee: employee.id,
                                    })}
                                >
                                    Generer un rapport
                                </Link>
                            </div>
                        )}
                        <div className="mt-6">
                            <table className="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th className="border px-4 py-2">
                                            Nom
                                        </th>
                                        <th className="border px-4 py-2">
                                            Horaire
                                        </th>
                                        <th className="border px-4 py-2">
                                            Excuser
                                        </th>
                                    </tr>
                                </thead>
                                <tbody className="text-center">
                                    {absences.map((absence) => (
                                        <tr key={absence.id}>
                                            <td className="border px-4 py-2">
                                                <Link
                                                    href={route(
                                                        "absences.employee",
                                                        {
                                                            employee:
                                                                absence.employee
                                                                    .id,
                                                        }
                                                    )}
                                                >
                                                    {absence.employee.nom}{" "}
                                                    {absence.employee.prenom}
                                                </Link>
                                            </td>
                                            <td className="border px-4 py-2">
                                                {absence.horaire.heure_debut} -{" "}
                                                {absence.horaire.heure_fin}
                                            </td>
                                            <td className="border px-4 py-2">
                                                <input
                                                    onChange={excuse}
                                                    type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                />
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
