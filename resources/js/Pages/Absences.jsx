import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, router } from "@inertiajs/react";
import { Link, useForm, usePage } from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel";
import { PlusCircle } from "lucide-react";
import InputError from "@/Components/InputError";
import PopoverWrapper from "@/Components/PopoverWrapper";
const Absences = ({ auth, direction, absences, employee }) => {
    const excuse = (id) => {
        router.patch(route("absences.patch", { absence: id }));
    };
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Absences
                </h2>
            }
        >
            <Head title="Absences" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 gap-3 flex flex-col">
                        {!employee && (
                            <h2 className="text-lg font-medium">
                                Absence des employés de la direction:{" "}
                                <b>{direction}</b>
                            </h2>
                        )}
                        {employee && (
                            <div className="flex justify-between items-center">
                                <h3 className=" text-lg font-medium">
                                    L'employé: {employee.nom + employee.prenom}
                                </h3>
                                <PopoverWrapper employee={employee}>
                                    <input
                                        type="button"
                                        className="bg-main cursor-pointer flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold border border-main hover:bg-white hover:text-main "
                                        value="Générer un rapport"
                                    />
                                </PopoverWrapper>
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
                                            Type
                                        </th>
                                        <th className="border px-4 py-2">
                                            Justifié
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
                                                {absence.type === "absence"
                                                    ? "Absence"
                                                    : "Retard"}
                                            </td>
                                            <td className="border px-4 py-2">
                                                <input
                                                    onChange={(e) => {
                                                        excuse(absence.id);
                                                    }}
                                                    type="checkbox"
                                                    defaultChecked={
                                                        absence.valide
                                                    }
                                                    className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
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
