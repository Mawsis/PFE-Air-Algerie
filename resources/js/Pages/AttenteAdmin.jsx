import React from "react";

const AttenteAdmin = () => {
    //style the div and content more
    return (
        <div className="bg-custom w-screen h-screen flex justify-center items-center">
            <div className=" bg-white h-1/3 w-1/3 border border-gray-100 shadow rounded-md flex gap-10 items-center flex-col py-10 px-5">
                <h1 className="text-center text-3xl text-main font-bold pt-5">
                    Veuillez attendre l'approbation de l'administrateur
                </h1>
                <p className="text-center text-lg text-gray-700 pt-5">
                    Votre compte est en attente d'approbation de
                    l'administrateur, Il sera activé une fois approuvé.
                </p>
            </div>
        </div>
    );
};

export default AttenteAdmin;
