import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CalendarComponent from "@/Components/CalendarComponent";
import { Head, router } from "@inertiajs/react";
import { Link, useForm, usePage } from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel";
import { ArrowRight, PlusCircle } from "lucide-react";
import InputError from "@/Components/InputError";
import TextInput from "@/Components/TextInput";
import { useEffect, useState } from "react";

const GererHoraires = ({
    auth,
    employees,
    search,
    employee,
    horaires,
    year,
    month,
}) => {
    const newTime = (datee, newTimeString) => {
        if (datee === undefined)
            datee =
                year +
                "-" +
                (parseInt(month) - 1) +
                "-" +
                currentDay +
                " " +
                "00:00:00";
        const dateParts = datee.split(" ");
        const date = dateParts[0]; // Extract date portion (2024-05-31)
        const [newHours, newMinutes] = newTimeString.split(":"); // Extract hours and minutes from the newTimeString

        // Validation for hours and minutes (optional)
        if (
            isNaN(newHours) ||
            parseInt(newHours) < 0 ||
            parseInt(newHours) > 23
        ) {
            console.error(
                "Invalid hours. Please enter a value between 0 and 23."
            );
            return;
        }
        if (
            isNaN(newMinutes) ||
            parseInt(newMinutes) < 0 ||
            parseInt(newMinutes) > 59
        ) {
            console.error(
                "Invalid minutes. Please enter a value between 0 and 59."
            );
            return;
        }

        const formattedTime = `${date} ${newHours
            .toString()
            .padStart(2, "0")}:${newMinutes.toString().padStart(2, "0")}:00`;
        return formattedTime;
    };
    const [data, setData] = useState({
        horaireId: "",
        heure_debut: "",
        heure_fin: "",
    });
    const [input, setInput] = useState(search);
    const [currentDay, setCurrentDay] = useState(0);
    const [debutTime, setDebutTime] = useState("");
    const [finTime, setFinTime] = useState("");
    const setHoraire = (day) => {
        if (typeof day === "number") {
            setData({
                horaireId: "",
                heure_debut: "",
                heure_fin: "",
            });
            setDebutTime("");
            setFinTime("");
            setCurrentDay(day);
        } else {
            setData({
                horaireId: day.id,
                heure_debut: day.heure_debut,
                heure_fin: day.heure_fin,
            });
            setCurrentDay(0);
            setDebutTime(
                new Date(day.heure_debut)
                    .getHours()
                    .toString()
                    .padStart(2, "0") +
                    ":" +
                    new Date(day.heure_debut)
                        .getMinutes()
                        .toString()
                        .padStart(2, "0")
            );
            setFinTime(
                new Date(day.heure_fin).getHours().toString().padStart(2, "0") +
                    ":" +
                    new Date(day.heure_fin)
                        .getMinutes()
                        .toString()
                        .padStart(2, "0")
            );
        }
    };
    const updateData = (debut, fin) => {
        console.log(debut, fin);
        if (debut === 0) {
            setData({
                heure_fin: newTime(data.heure_fin, fin),
                heure_debut: data.heure_debut,
                horaireId: data.horaireId,
            });
        } else if (fin === 0) {
            setData({
                heure_debut: newTime(data.heure_debut, debut),
                heure_fin: data.heure_fin,
                horaireId: data.horaireId,
            });
        }
    };
    useEffect(() => {
        console.log(data);
    }, [data]);
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

                            {data.horaireId && (
                                <>
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
                                                    value={debutTime}
                                                    onChange={(e) => {
                                                        setDebutTime(
                                                            e.target.value
                                                        );
                                                        updateData(
                                                            e.target.value,
                                                            0
                                                        );
                                                    }}
                                                    id="date_debut"
                                                    className="rounded-md text-center flex justify-center items-center"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <ArrowRight className="text-4xl" />
                                        <div>
                                            <div className="flex justify-center items-center gap-4">
                                                <InputLabel
                                                    htmlFor="date_fin"
                                                    value="Heure fin:"
                                                />
                                                <input
                                                    type="time"
                                                    name="date_fin"
                                                    value={finTime}
                                                    onChange={(e) => {
                                                        setFinTime(
                                                            e.target.value
                                                        );
                                                        updateData(
                                                            0,
                                                            e.target.value
                                                        );
                                                    }}
                                                    id="date_fin"
                                                    className="rounded-md text-center flex justify-center items-center"
                                                    required
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="flex justify-center items-center gap-10">
                                        {data.horaireId && (
                                            <>
                                                <button
                                                    onClick={() => {
                                                        router.delete(
                                                            route(
                                                                "horaires.delete",
                                                                {
                                                                    horaireId:
                                                                        data.horaireId,
                                                                }
                                                            )
                                                        );
                                                    }}
                                                    className="bg-main flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold text-lg border border-main hover:bg-white hover:text-main"
                                                >
                                                    Supprimer
                                                </button>
                                                <button
                                                    onClick={() => {
                                                        router.patch(
                                                            route(
                                                                "horaires.update",
                                                                {
                                                                    horaireId:
                                                                        data.horaireId,
                                                                    heure_debut:
                                                                        data.heure_debut,
                                                                    heure_fin:
                                                                        data.heure_fin,
                                                                }
                                                            )
                                                        );
                                                    }}
                                                    className="bg-orange-400 flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold text-lg border border-orange-400 hover:bg-white hover:text-orange-400"
                                                >
                                                    Modifier
                                                </button>
                                            </>
                                        )}
                                    </div>
                                </>
                            )}
                            {currentDay !== 0 && (
                                <>
                                    <div>
                                        Ajouter une horaire le{" "}
                                        {year + "-" + month + "-" + currentDay}
                                    </div>
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
                                                    value={debutTime}
                                                    onChange={(e) => {
                                                        setDebutTime(
                                                            e.target.value
                                                        );
                                                        updateData(
                                                            e.target.value,
                                                            0
                                                        );
                                                    }}
                                                    id="date_debut"
                                                    className="rounded-md text-center flex justify-center items-center"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <ArrowRight className="text-4xl" />
                                        <div>
                                            <div className="flex justify-center items-center gap-4">
                                                <InputLabel
                                                    htmlFor="date_fin"
                                                    value="Heure fin:"
                                                />
                                                <input
                                                    type="time"
                                                    name="date_fin"
                                                    value={finTime}
                                                    onChange={(e) => {
                                                        setFinTime(
                                                            e.target.value
                                                        );
                                                        updateData(
                                                            0,
                                                            e.target.value
                                                        );
                                                    }}
                                                    id="date_fin"
                                                    className="rounded-md text-center flex justify-center items-center"
                                                    required
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        onClick={() => {
                                            router.post(
                                                route("horaires.store", {
                                                    user_id: employee.id,
                                                    heure_fin: data.heure_fin,
                                                    heure_debut:
                                                        data.heure_debut,
                                                })
                                            );
                                        }}
                                        className="bg-green-400 flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold text-lg border border-green-400 hover:bg-white hover:text-green-400"
                                    >
                                        Ajouter
                                    </button>
                                </>
                            )}
                        </div>
                        <div className="w-full flex justify-end">
                            <div className=" h-[500px] flex justify-center items-center w-full">
                                <CalendarComponent
                                    workingDays={horaires}
                                    className="w-2/3 h-2/3"
                                    year={year}
                                    month={month}
                                    employeeId={employee ? employee.id : ""}
                                    routeName="horaires"
                                    handleDayClicked={setHoraire}
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
