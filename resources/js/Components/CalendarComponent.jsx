import { useRef, useState } from "react";
import { ChevronLeft, ChevronRight } from "lucide-react";
import { getDayNumber, formatMonth, daysInMonth } from "@/Utils/time";
import { cn } from "@/Utils/cn";
function getCurrentDate(optionalDate = undefined) {
    const date = optionalDate ? new Date(...optionalDate) : new Date();
    return {
        month: String(date.getMonth() + 1).padStart(2, "0"),
        year: String(date.getFullYear()),
        days: daysInMonth(date.getFullYear(), date.getMonth() + 1),
        day: String(date.getDate()).padStart(2, "0"),
    };
}

export default function CalendarComponent({
    className,
    setWorkingDays,
    workingDays,
}) {
    const currentDate = useRef(getCurrentDate());
    const days = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"];
    const [daysShift, setDaysShift] = useState(
        getDayNumber(currentDate.current.month, currentDate.current.year)
    );
    function verifyWorkingDate(day) {
        if (day === new Date().getDate() - 1) {
            return 4;
        } else if (day > new Date().getDate() - 1) {
            return 5;
        } else {
            // Verify if the date is a working day
            const workingDay = workingDays.filter((d) => {
                return new Date(d.heure_debut).getDate() - 1 === day;
            });
            if (!workingDay[0]) {
                return 0;
            } else {
                if (workingDay[0].present === 1) {
                    return 1;
                } else {
                    if (workingDay[0].absence.type === "absence") {
                        return 2;
                    } else {
                        return 3;
                    }
                }
            }
        }
    }
    return (
        <div className={cn("p-5 shadow-2xl rounded-md", className)}>
            <div className="w-full flex justify-between mb-2">
                <p className="font-bold text-xl">
                    {formatMonth(parseInt(currentDate.current.month))}{" "}
                    {currentDate.current.year}
                </p>
                <div>
                    <button className="bg-transparent">
                        <ChevronLeft
                            onClick={() => {
                                currentDate.current = getCurrentDate([
                                    parseInt(currentDate.current.year),
                                    parseInt(currentDate.current.month) - 2,
                                    currentDate.current.day,
                                ]);
                                setDaysShift(
                                    getDayNumber(
                                        currentDate.current.month,
                                        currentDate.current.year
                                    )
                                );
                            }}
                        />
                    </button>
                    <button className="bg-transparent">
                        <ChevronRight
                            onClick={() => {
                                currentDate.current = getCurrentDate([
                                    parseInt(currentDate.current.year),
                                    parseInt(currentDate.current.month),
                                    currentDate.current.day,
                                ]);
                                setDaysShift(
                                    getDayNumber(
                                        currentDate.current.month,
                                        currentDate.current.year
                                    )
                                );
                            }}
                        />
                    </button>
                </div>
            </div>
            <div className="w-full grid grid-cols-7 place-items-center gap-4">
                {days.map((day, index) => {
                    return <p key={index}>{day}</p>;
                })}
            </div>
            <div className="w-full grid grid-cols-7 place-items-center">
                {Array(currentDate.current.days)
                    .fill(0)
                    .map((_, index) => {
                        const isCheckedIn = verifyWorkingDate(index);
                        const bgColor =
                            isCheckedIn === 0
                                ? "bg-white !text-black"
                                : isCheckedIn === 1
                                ? "bg-green-500"
                                : isCheckedIn === 2
                                ? "bg-red-500"
                                : isCheckedIn === 3
                                ? "bg-yellow-500"
                                : isCheckedIn === 4
                                ? "bg-blue-800"
                                : "bg-gray-500 !text-black";
                        return (
                            <div
                                key={index}
                                className={`w-full h-10 ${bgColor} rounded-xs text-white text-xs border border-gray-200 flex justify-center items-center`}
                                style={{
                                    gridColumnStart:
                                        index === 0 ? daysShift : 0,
                                }}
                            >
                                {index + 1}
                            </div>
                        );
                    })}
            </div>
        </div>
    );
}
