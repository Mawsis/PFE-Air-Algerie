import { useRef, useState } from "react";
import { Head, router } from "@inertiajs/react";
import { ChevronLeft, ChevronRight } from "lucide-react";
import { getDayNumber, formatMonth, daysInMonth } from "@/Utils/time";
import { cn } from "@/Utils/cn";

export default function CalendarComponent({
    className,
    workingDays,
    year,
    month,
    employeeId,
    routeName,
    handleDayClicked,
}) {
    const days = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"];
    const [daysShift, setDaysShift] = useState(getDayNumber(month, year));
    function verifyWorkingDate(day) {
        if (
            day === new Date().getDate() - 1 &&
            parseInt(month) === new Date().getMonth() + 1
        ) {
            return 4;
        } else {
            // Verify if the date is a working day
            const workingDay = workingDays.filter((d) => {
                return new Date(d.heure_debut).getDate() - 1 === day;
            });
            if (!workingDay[0]) {
                return 0;
            } else {
                if (day > new Date().getDate() - 1) {
                    return 5;
                }
                if (workingDay[0].present === 1) {
                    return 1;
                } else {
                    if (workingDay[0].absence?.type === "retard") {
                        return 3;
                    } else {
                        return 2;
                    }
                }
            }
        }
    }
    if (!workingDays || !employeeId)
        return <div className="text-sm md:text-base">Pas de calendrier</div>;
    return (
        <div className={cn("p-5 shadow-2xl rounded-md", className)}>
            <div className="w-full flex justify-between mb-2">
                <p className="font-bold text-xl">
                    {formatMonth(parseInt(month))} {year}
                </p>
                <div>
                    <button className="bg-transparent">
                        <ChevronLeft
                            onClick={() => {
                                if (parseInt(month) === 1) {
                                    router.get(
                                        route(
                                            routeName,
                                            {
                                                input: "",
                                                employee: employeeId,
                                                year: parseInt(year) - 1,
                                                month: 12,
                                            },
                                            {
                                                preserveScroll: true,
                                            }
                                        )
                                    );
                                } else {
                                    router.get(
                                        route(
                                            routeName,
                                            {
                                                input: "",
                                                employee: employeeId,
                                                year: parseInt(year),
                                                month: parseInt(month) - 1,
                                            },
                                            {
                                                preserveScroll: true,
                                            }
                                        )
                                    );
                                }
                            }}
                        />
                    </button>
                    <button className="bg-transparent">
                        <ChevronRight
                            onClick={() => {
                                if (parseInt(month) === 12) {
                                    router.get(
                                        route(
                                            routeName,
                                            {
                                                input: "",
                                                employee: employeeId,
                                                year: parseInt(year) + 1,
                                                month: 1,
                                            },
                                            {
                                                preserveScroll: true,
                                            }
                                        )
                                    );
                                } else {
                                    router.get(
                                        route(
                                            routeName,
                                            {
                                                input: "",
                                                employee: employeeId,
                                                year: parseInt(year),
                                                month: parseInt(month) + 1,
                                            },
                                            {
                                                preserveScroll: true,
                                            }
                                        )
                                    );
                                }
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
                {Array(daysInMonth(year, month))
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
                                : "bg-gray-500 ";
                        return (
                            <div
                                key={index}
                                onClick={() => {
                                    let a = index + 1;
                                    workingDays.map((day) => {
                                        if (
                                            new Date(
                                                day.heure_debut
                                            ).getDate() ===
                                            index + 1
                                        ) {
                                            a = day;
                                        }
                                    });
                                    handleDayClicked(a);
                                }}
                                className={`w-full h-10 ${bgColor} rounded-xs hover:text-base hover:font-semibold text-white text-xs border border-gray-200 flex justify-center items-center`}
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
