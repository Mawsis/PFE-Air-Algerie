import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { Link, useForm, usePage } from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel";
import { PlusCircle } from "lucide-react";
import InputError from "@/Components/InputError";

const DemandeConge = ({ auth, demandes, soldes }) => {
    const user = usePage().props.auth.user;
    const { data, setData, post, errors, processing, recentlySuccessful } =
        useForm({
            date_debut: "",
            date_fin: "",
            status: "en attente",
            user_id: user.id,
        });
    const submit = (e) => {
        e.preventDefault();

        post(route("demander-conge.store"));
    };
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Demande de conge
                </h2>
            }
        >
            <Head title="Demande Congé" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 gap-3 flex flex-col">
                        <h2>Demander un conge</h2>
                        <form onSubmit={submit} className="mt-6 space-y-6">
                            <div className="flex flex-col sm:flex-row gap-10 sm:gap-0 px-20 justify-between items-center w-full">
                                <div>
                                    <div className="flex justify-center items-center gap-10">
                                        <InputLabel
                                            htmlFor="date_debut"
                                            value="Date debut:"
                                        />
                                        <input
                                            type="date"
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
                                <div>
                                    <div className="flex justify-center items-center gap-10">
                                        <InputLabel
                                            htmlFor="date_fin"
                                            value="Date fin:"
                                        />
                                        <input
                                            type="date"
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
                            <div className="w-full flex justify-end">
                                <button className="bg-main flex justify-center items-center gap-2 px-3 py-2 rounded-md text-white font-semibold text-lg border border-main hover:bg-white hover:text-main ">
                                    <PlusCircle /> Demander un conge
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default DemandeConge;
