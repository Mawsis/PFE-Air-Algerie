import { useState } from "react";
import CalendarComponent from "./CalendarComponent";
import data from "../data.json";
export default function CalendarWrapper() {
    const [workingDays, setWorkingDays] = useState(data);
    return (
        <div className="flex flex-col gap-8">
            <div className="text-3xl">
                <p>Voici votre calendrier :</p>
            </div>
            <div className="flex items-center justify-center">
                <CalendarComponent
                    className=" w-1/3 "
                    workingDays={workingDays}
                    setWorkingDays={setWorkingDays}
                />
            </div>
        </div>
    );
}
