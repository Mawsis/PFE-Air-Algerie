import React, { useState } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { Link, useForm, usePage } from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel";
import { PlusCircle } from "lucide-react";
import InputError from "@/Components/InputError";

const Employees = ({ auth, employees }) => {
    const [employeesS, setEmployeesS] = useState(employees);

    const changeStatus = (id, e) => {
        const updatedEmployees = employeesS.map((employee) => {
            if (employee.id === id) {
                return {
                    ...employee,
                    status: e,
                };
            }
        });
        setEmployees(updatedEmployees);
    };
    const changeType = (id, e) => {
        const updatedEmployees = employeesS.map((employee) => {
            if (employee.id === id) {
                return {
                    ...employee,
                    type: e,
                };
            }
        });
        setEmployees(updatedEmployees);
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Employés
                </h2>
            }
        >
            <Head title="Employés" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 gap-3 flex flex-col">
                        Tout les employé
                        <div className="mt-6">
                            <table className="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th className="border px-4 py-2">
                                            Nom
                                        </th>
                                        <th className="border px-4 py-2">
                                            Email
                                        </th>
                                        <th className="border px-4 py-2">
                                            Téléphone
                                        </th>
                                        <th className="border px-4 py-2">
                                            Status
                                        </th>
                                        <th className="border px-4 py-2">
                                            Type
                                        </th>
                                        <th className="border px-4 py-2">
                                            Direction
                                        </th>
                                    </tr>
                                </thead>
                                <tbody className="text-center">
                                    {employeesS.map((employee) => (
                                        <tr key={employee.id}>
                                            <td className="border px-4 py-2">
                                                {employee.nom +
                                                    " " +
                                                    employee.prenom}
                                            </td>
                                            <td className="border px-4 py-2">
                                                {employee.email}
                                            </td>
                                            <td className="border px-4 py-2">
                                                {employee.telephone}
                                            </td>
                                            <td className="border px-4 py-2">
                                                <select
                                                    class={`${
                                                        employee.status ===
                                                        "admin"
                                                            ? "bg-green-500 text-white"
                                                            : employee.status ===
                                                              "chef"
                                                            ? "bg-orange-500 text-white"
                                                            : employee.status ===
                                                              "employee"
                                                            ? "bg-main text-white"
                                                            : ""
                                                    } border font-bold border-gray-300 text-gray-700 text-base rounded-lg block w-full p-2.5`}
                                                    required
                                                    onChange={(e) => {
                                                        changeStatus(
                                                            employee.id,
                                                            e.target.value
                                                        );
                                                    }}
                                                >
                                                    <option value="admin">
                                                        admin
                                                    </option>
                                                    <option value="employee">
                                                        employé
                                                    </option>
                                                    <option value="chef">
                                                        chef
                                                    </option>
                                                    <option value="">
                                                        None
                                                    </option>
                                                </select>
                                            </td>
                                            <td className="border px-4 py-2">
                                                <select
                                                    class="bg-gray-50 border border-gray-300 text-gray-700 font-bold rounded-lg block w-full p-2.5"
                                                    required
                                                    onChange={(e) => {
                                                        changeType(
                                                            employee.id,
                                                            e.target.value
                                                        );
                                                    }}
                                                >
                                                    <option value="Fixe">
                                                        Fixe
                                                    </option>
                                                    <option value="Tournant2">
                                                        Tournant 2
                                                    </option>
                                                    <option value="Tournant2">
                                                        Tournant 3
                                                    </option>
                                                    <option value="Tournant2">
                                                        Tournant 4
                                                    </option>
                                                </select>
                                            </td>
                                            <td className="border px-4 py-2">
                                                {employee.direction
                                                    ? employee.direction.nom
                                                    : "Aucune direction"}
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

export default Employees;
