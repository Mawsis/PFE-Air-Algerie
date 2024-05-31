import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CalendarComponent from "@/Components/CalendarComponent";
import { Head, router } from "@inertiajs/react";
import { Link, useForm, usePage } from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel";
import { ArrowRight, PlusCircle } from "lucide-react";
import InputError from "@/Components/InputError";
import TextInput from "@/Components/TextInput";
import { useState } from "react";

const GererHoraires = ({
    auth,
    employees,
    search,
    employee,
    horaires,
    year,
    month,
}) => {
    const [input, setInput] = useState(search);
    console.log(horaires);
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Gerer les Horaires des employes
                </h2>
            }
        >
            <Head title="Demande Conge" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 gap-3 flex justify-between items-center">
                        <h2 className=" text-xl font-semibold w-full">
                            Chercher employe:
                        </h2>
                        <div className="flex flex-col w-full ml-auto">
                            <TextInput
                                id="employee"
                                type="text"
                                name="employee"
                                value={input}
                                className="mt-1 block w-96"
                                isFocused={true}
                                onChange={(e) => {
                                    setInput(e.target.value);
                                    router.get(
                                        route("horaires", {
                                            input: e.target.value,
                                            employee: employee
                                                ? employee.id
                                                : "",
                                        })
                                    );
                                }}
                            />
                            <div className="absolute top-[69px] w-96">
                                {employees &&
                                    employees.slice(0, 5).map((employee) => (
                                        <div
                                            key={employee.id}
                                            className="block w-full bg-white border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border hover:bg-gray-300"
                                            onClick={() => {
                                                router.get(
                                                    route("horaires", {
                                                        input: "",
                                                        employee: employee.id,
                                                    })
                                                );
                                            }}
                                        >
                                            {employee.nom +
                                                " " +
                                                employee.prenom}
                                        </div>
                                    ))}
                            </div>
                        </div>
                    </div>
                    <div className="bg-white mt-6 z-0 overflow-hidden shadow-sm sm:rounded-lg p-6 gap-3 flex justify-between items-center divide-x">
                        <div className="w-full flex flex-col h-[500px] justify-around text-2xl gap-9">
                            <p className="text-xl font-semibold">
                                {employee
                                    ? employee.nom + " " + employee.prenom
                                    : "Selectionner un employe"}
                            </p>
                            <div className="flex justify-between items-center">
                                <div>
                                    <div className="flex justify-center items-center gap-4">
                                        <InputLabel
                                            htmlFor="date_debut"
                                            value="Heure debut:"
                                        />
                                        <input
                                            type="time"
                                            name="date_debut"
                                            onChange={(e) =>
                                                setData(
                                                    "date_debut",
                                                    e.target.value
                                                )
                                            }
                                            id="date_debut"
                                            className="rounded-md text-center flex justify-center items-center"
                                            required
                                        />
                                    </div>
                                </div>
                                <ArrowRight className="text-48l" />
                                <div>
                                    <div className="flex justify-center items-center gap-4">
                                        <InputLabel
                                            htmlFor="date_fin"
                                            value="Heure fin:"
                                        />
                                        <input
                                            type="time"
                                            name="date_fin"
                                            onChange={(e) =>
                                                setData(
                                                    "date_fin",
                                                    e.target.value
                                                )
                                            }
                                            id="date_fin"
                                            className="rounded-md text-center flex justify-center items-center"
                                            required
                                        />
                                    </div>
                                </div>
                            </div>
                            <div className="flex justify-center items-center gap-10">
                                <button className="bg-main flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold text-lg border border-main hover:bg-white hover:text-main ">
                                    Supprimer
                                </button>
                                <button className="bg-orange-400 flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold text-lg border border-orange-400 hover:bg-white hover:text-orange-400 ">
                                    Modifier
                                </button>
                            </div>
                        </div>
                        <div className="w-full flex justify-end">
                            <div className=" h-[500px] flex justify-center items-center w-full">
                                <CalendarComponent
                                    workingDays={horaires}
                                    className="w-2/3 h-2/3"
                                    year={year}
                                    month={month}
                                    employeeId={employee ? employee.id : ""}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default GererHoraires;
