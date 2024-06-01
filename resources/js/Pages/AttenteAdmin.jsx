import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
const AttenteAdmin = ({ auth }) => {
    //style the div and content more
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Acceuil
                </h2>
            }
        >
            <div className="bg-custom w-screen h-screen flex justify-center items-center">
                <div className=" bg-white w-[90%] md:h-1/3 md:w-1/3 border border-gray-100 shadow rounded-md flex gap-10 items-center flex-col py-10 px-5">
                    <h1 className="text-center text-lg sm:text-xl md:text-2xl lg:text-3xl text-main font-bold pt-5">
                        Veuillez attendre l'approbation de l'administrateur
                    </h1>
                    <p className="text-center text-sm md:text-lg text-gray-700 pt-5">
                        Votre compte est en attente d'approbation de
                        l'administrateur, Il sera activé une fois approuvé.
                    </p>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default AttenteAdmin;
