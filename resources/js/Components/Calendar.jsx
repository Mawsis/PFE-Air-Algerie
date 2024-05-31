import { usePage } from "@inertiajs/react";
import { useState } from "react";
import CalendarComponent from "./CalendarComponent";
import data from "../data.json";
export default function CalendarWrapper() {
    const [workingDays, setWorkingDays] = useState(data);
    const horaires = null;
    const user = usePage().props.auth.user;
    return (
        <div className="flex flex-col gap-8">
            <div className="text-xl md:text-3xl">
                <p>Voici votre calendrier :</p>
            </div>
            <div className="flex items-center justify-center">
                <CalendarComponent
                    className=" w-1/3"
                    workingDays={horaires}
                    setWorkingDays={setWorkingDays}
                    employeeId={user.id}
                />
            </div>
        </div>
    );
}
