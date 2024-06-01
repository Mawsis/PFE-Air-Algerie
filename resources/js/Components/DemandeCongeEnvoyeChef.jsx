import { router, usePage } from "@inertiajs/react";
import React, { useState } from "react";

const getStatusColor = (status) => {
    switch (status) {
        case "en attente":
            return "text-yellow-500";
        case "approuvée":
            return "text-green-500";
        case "refuse":
            return "text-red-500";
        default:
            return "text-gray-500";
    }
};

const DemandeCongeEnvoyeChef = ({ demandes }) => {
    const auth = usePage().props.auth;
    const [demandesS, setDemandesS] = useState(demandes);
    const changerStatus = (id, status) => {
        router.patch(
            route(
                "demande-conge-chef.patch",
                {
                    demande: id,
                    status: status,
                },
                { preserveScroll: true }
            )
        );
        // Set the state with the new array
        setDemandesS(updatedDemandes);
    };
    return (
        <table className="w-full text-center">
            <thead>
                <tr>
                    <th className="py-2">Nom</th>
                    <th className="py-2">Date d'envoi</th>
                    <th className="py-2">Date début</th>
                    <th className="py-2">Date fin</th>
                    <th className="py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                {/* Map over the demandes de conges and render a table row for each demande */}
                {demandes.map((demande) => (
                    <tr key={demande.id} className="border-t text-lg">
                        <td className="py-2">{demande.employee.nom}</td>
                        <td className="py-2">
                            {demande.created_at.split("T")[0]}
                        </td>
                        <td className="py-2">{demande.date_debut}</td>
                        <td className="py-2">{demande.date_fin}</td>
                        <td className="py-2 flex justify-center items-center">
                            <select
                                defaultValue={demande.status}
                                className={`${
                                    demande.status === "approuvée" ||
                                    demande.status === "approuvéeChef"
                                        ? "bg-green-500 text-white"
                                        : demande.status === "en attente"
                                        ? "bg-orange-500 text-white"
                                        : demande.status === "refuse"
                                        ? "bg-main text-white"
                                        : ""
                                } border font-bol border-gray-300 text-gray-700 text-base rounded-lg block`}
                                required
                                onChange={(e) => {
                                    changerStatus(demande.id, e.target.value);
                                }}
                            >
                                <option value="approuvéeChef">
                                    {auth.user.status === "admin"
                                        ? "approuvéeChef"
                                        : "approuvée"}
                                </option>
                                {auth.user.status === "chef" && (
                                    <option value="en attente">
                                        en attente
                                    </option>
                                )}
                                {auth.user.status === "admin" && (
                                    <option value="approuvée">approuvée</option>
                                )}
                                <option value="refuse">refuse</option>
                            </select>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
};

export default DemandeCongeEnvoyeChef;
