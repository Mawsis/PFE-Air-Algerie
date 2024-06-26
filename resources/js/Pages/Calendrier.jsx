import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, router } from "@inertiajs/react";
import illustration from "@/Assets/illsutration.jpg";
import { formatTime } from "@/Utils/time";
import useTime from "@/Hooks/useTime";
import Calendar from "@/Components/Calendar";
import CalendarComponent from "@/Components/CalendarComponent";
import { useState } from "react";
const getCurrentDate = () => {
    const date = new Date();
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, "0"); // Months are zero-based
    const day = String(date.getDate()).padStart(2, "0");

    return `${year}-${month}-${day}`;
};

export default function Calendrier({
    auth,
    horaires,
    actualHoraire,
    year,
    month,
}) {
    const currentTime = useTime();
    const [horaire, setHoraire] = useState(null);
    console.log(actualHoraire);
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-[1.10rem] md:text-xl text-gray-800 leading-tight">
                    Calendrier
                </h2>
            }
        >
            <Head title="Calendrier" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center items-center flex-col">
                    <div className="bg-white overflow-hidden shadow-sm rounded-lg w-[95%] md:w-full">
                        <div className="h-1/2 p-3 ">
                            <h2 className="text-xl md:text-3xl">
                                On est le :{" "}
                                <span className="text-main">
                                    {getCurrentDate()}
                                </span>{" "}
                                a{" "}
                                <span className="text-main">
                                    {formatTime(currentTime)}
                                </span>
                            </h2>
                        </div>
                    </div>
                    <div className="bg-white overflow-hidden shadow-sm rounded-lg mt-6 py-5 w-[95%] md:w-full">
                        <div className="space-y-3">
                            <div className="px-3 space-y-3">
                                <h2 className="text-xl md:text-3xl">
                                    Bienvenu {auth.user.nom}!
                                </h2>
                                {actualHoraire && (
                                    <div className="text-base md:text-xl">
                                        Vous avez une horaire de travail
                                        maintenant ente{" "}
                                        <span className="text-main">
                                            {
                                                actualHoraire.heure_debut.split(
                                                    " "
                                                )[0]
                                            }
                                        </span>{" "}
                                        et{" "}
                                        <span className="text-main">
                                            {
                                                actualHoraire.heure_fin.split(
                                                    " "
                                                )[1]
                                            }
                                        </span>
                                    </div>
                                )}
                            </div>
                            <img
                                src={illustration}
                                alt=""
                                className="md:m-3 h-96 w-full object-cover"
                            />
                            <div className="w-full flex justify-center items-center">
                                {actualHoraire ? (
                                    actualHoraire.present ? (
                                        <div className="bg-green-400 flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold text-lg border border-green-400 hover:bg-white hover:text-green-400">
                                            Vous êtes présent
                                        </div>
                                    ) : (
                                        <button
                                            onClick={() => {
                                                router.put(
                                                    route("horaires.put")
                                                );
                                            }}
                                            className="bg-main flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold text-lg border border-main hover:bg-white hover:text-main"
                                        >
                                            Se pointer
                                        </button>
                                    )
                                ) : (
                                    <div className="bg-main flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold text-lg border border-main">
                                        Vous n'avez pas de session de travail
                                    </div>
                                )}
                            </div>
                            <div className="w-full flex justify-center items-center flex-col">
                                {horaire && (
                                    <div className="flex justify-center items-center py-2 text-base md:text-xl">
                                        {typeof horaire === "number" ? (
                                            <p>
                                                Vous n'avez pas de session de
                                                travail
                                            </p>
                                        ) : (
                                            <p>
                                                Vous avez une session de{" "}
                                                {
                                                    horaire.heure_debut.split(
                                                        " "
                                                    )[1]
                                                }{" "}
                                                à{" "}
                                                {
                                                    horaire.heure_fin.split(
                                                        " "
                                                    )[1]
                                                }
                                            </p>
                                        )}
                                    </div>
                                )}
                                <CalendarComponent
                                    workingDays={horaires}
                                    className="w-[95%] sm:w-1/2 h-3/4"
                                    year={year}
                                    month={month}
                                    employeeId={auth.user.id}
                                    routeName="/"
                                    handleDayClicked={setHoraire}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
