import React from "react";

const NotFound = () => {
    //style the div and content more
    return (
        <div className="bg-custom w-screen h-screen flex justify-center items-center">
            <div className=" bg-white h-1/3 w-1/3 border border-gray-100 shadow rounded-md flex gap-10 items-center flex-col py-10 px-5">
                <h1 className="text-center text-4xl text-main font-bold pt-5">
                    Erreur 404
                </h1>
                <p className="text-center text-xl text-gray-700 pt-5">
                    La page que vous cherchez n'existe pas.
                </p>
            </div>
        </div>
    );
};

export default NotFound;
