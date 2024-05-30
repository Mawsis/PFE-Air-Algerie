import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { Link, useForm, usePage } from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel";
import { ArrowRight, PlusCircle } from "lucide-react";
import InputError from "@/Components/InputError";
import TextInput from "@/Components/TextInput";

const GererHoraires = ({ auth, demandes, soldes }) => {
    const user = usePage().props.auth.user;
    const { data, setData, post, errors, processing, recentlySuccessful } =
        useForm({
            date_debut: "",
            date_fin: "",
            status: "en attente",
            user_id: user.id,
        });
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
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 gap-3 flex justify-between items-center">
                        <h2 className=" text-xl font-semibold w-full">
                            Chercher employe:
                        </h2>
                        <TextInput
                            id="employee"
                            type="text"
                            name="employee"
                            className="mt-1 block w-full"
                            isFocused={true}
                            onChange={(e) =>
                                setData("password", e.target.value)
                            }
                        />
                    </div>
                    <div className="bg-white mt-6 overflow-hidden shadow-sm sm:rounded-lg p-6 gap-3 flex justify-between items-center divide-x">
                        <div className="w-full flex flex-col h-[500px] justify-around text-2xl gap-9">
                            <p>
                                Employe:{" "}
                                <span className="font-semibold">
                                    Mohamed Kadouri
                                </span>
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
                                    <InputError
                                        className="mt-2"
                                        message={errors.date_debut}
                                    />
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
                                    <InputError
                                        className="mt-2"
                                        message={errors.date_fin}
                                    />
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
                            <div className=" h-[500px]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default GererHoraires;
