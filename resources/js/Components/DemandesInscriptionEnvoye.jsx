import { router } from "@inertiajs/react";
import React, { useState } from "react";

const DemandesInscriptionEnvoye = ({ demandes }) => {
    const [employees, setEmployees] = useState(demandes);
    const accepter = (id, s) => {
        router.patch(
            route("demandes-inscription.patch", {
                employee: id,
                status: s,
            })
        );
        setEmployees((prevEmployees) =>
            prevEmployees.filter((employee) => employee.id !== id)
        );
    };
    return (
        <table className="w-full text-center">
            <thead>
                <tr>
                    <th className="py-2">Nom</th>
                    <th className="py-2">Prenom</th>
                    <th className="py-2">Email</th>
                    <th className="py-2">Telephone</th>
                    <th className="py-2">Direction</th>
                    <th className="py-2">Accepter</th>
                </tr>
            </thead>
            <tbody>
                {/* Map over the demandes de conges and render a table row for each demande */}
                {employees.map((employee) => (
                    <tr key={employee.id} className="border-t text-lg">
                        <td className="py-2">{employee.nom}</td>
                        <td className="py-2">{employee.prenom}</td>
                        <td className="py-2">{employee.email}</td>
                        <td className="py-2">{employee.telephone}</td>
                        <td className="py-2">{employee.direction?.nom}</td>
                        <td className="py-2 flex justify-center items-center gap-2">
                            <button
                                onClick={() =>
                                    accepter(employee.id, "employee")
                                }
                                className=" bg-green-500 text-white py-1 shadow rounded-md px-2"
                            >
                                Employe
                            </button>
                            <button
                                onClick={() => accepter(employee.id, "chef")}
                                className=" bg-orange-500 text-white py-1 shadow rounded-md px-2"
                            >
                                Chef
                            </button>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
};

export default DemandesInscriptionEnvoye;
