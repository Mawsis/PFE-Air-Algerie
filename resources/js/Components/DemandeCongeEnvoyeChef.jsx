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
let statuses = ["en attente", "approuvée", "refuse"];

const DemandeCongeEnvoyeChef = ({ demandes }) => {
    const [demandesS, setDemandesS] = useState(demandes);
    const changerStatus = (demande) => {
        demande.status = "sads";
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
                        <td
                            className={`py-2 cursor-pointer ${getStatusColor(
                                demande.status
                            )}`}
                            onClick={(e) => changerStatus(demande)}
                        >
                            {demande.status}
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
};

export default DemandeCongeEnvoyeChef;
