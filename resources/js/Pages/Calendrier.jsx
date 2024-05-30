import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import illustration from "@/Assets/illsutration.jpg";
import { formatTime } from "@/Utils/time";
import useTime from "@/Hooks/useTime";
import Calendar from "@/Components/Calendar";
const getCurrentDate = () => {
    const date = new Date();
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, "0"); // Months are zero-based
    const day = String(date.getDate()).padStart(2, "0");

    return `${year}-${month}-${day}`;
};

export default function Calendrier({ auth }) {
    const currentTime = useTime();
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Calendrier
                </h2>
            }
        >
            <Head title="Calendrier" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="h-1/2 p-3">
                            <h2 className="text-3xl">
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
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                        <div className="p-3 space-y-3">
                            <h2 className="text-3xl">
                                Bienvenu {auth.user.nom}!
                            </h2>
                            <div className="text-xl">
                                Vous avez une horaire de travail maintenant ente{" "}
                                <span className="text-main">8:00</span> et{" "}
                                <span className="text-main">16:00</span>
                            </div>
                            <img
                                src={illustration}
                                alt=""
                                className=" h-96 w-full object-cover"
                            />
                            <div className="w-full flex justify-center items-center">
                                <button className="bg-main flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold text-lg border border-main hover:bg-white hover:text-main ">
                                    Se Pointer
                                </button>
                            </div>
                            <Calendar />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
