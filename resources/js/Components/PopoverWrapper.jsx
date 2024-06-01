import React from "react";
import { Popover, PopoverContent, PopoverTrigger } from "./ui/popover";
import { Link, useForm, usePage } from "@inertiajs/react";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/Components/ui/select";
import { useState } from "react";
import { formatMonth } from "@/Utils/time";
const mois = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];
const annee = ["2021", "2022", "2023", "2024"];

function ValueDropDown({ format, setDate, date }) {
    return (
        <Select value={date} onValueChange={setDate}>
            <SelectTrigger className="w-full">
                <SelectValue
                    placeholder={
                        format === "mois"
                            ? "Choisi un mois"
                            : "Choisi une annee"
                    }
                />
            </SelectTrigger>
            <SelectContent className="h-52">
                {format === "mois"
                    ? mois.map((m, i) => (
                          <SelectItem value={m} key={i}>
                              {formatMonth(parseInt(m))}
                          </SelectItem>
                      ))
                    : annee.map((a, i) => (
                          <SelectItem value={a} key={i}>
                              {a}
                          </SelectItem>
                      ))}
            </SelectContent>
        </Select>
    );
}

export default function PopoverWrapper({ children, employee }) {
    const [format, setFormat] = useState("");
    const [date, setDate] = useState("");
    return (
        <Popover>
            <PopoverTrigger>{children}</PopoverTrigger>
            <PopoverContent>
                <div className=" h-48 flex flex-col justify-between">
                    <div className="flex flex-col gap-4">
                        <Select value={format} onValueChange={setFormat}>
                            <SelectTrigger className="w-full">
                                <SelectValue placeholder="Choisi un format" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectItem value="mois">Mois</SelectItem>
                                <SelectItem value="annee">Annee</SelectItem>
                            </SelectContent>
                        </Select>
                        {format && (
                            <ValueDropDown
                                format={format}
                                setDate={setDate}
                                date={date}
                            />
                        )}
                    </div>
                    {format && (
                        <a
                            className="bg-main w-full flex justify-center items-center gap-2 px-3 py-1 rounded-md text-white font-semibold border border-main hover:bg-white hover:text-main "
                            href={route("absences.rapport", {
                                employeeid: employee.id,
                                format: format,
                                date: date,
                            })}
                        >
                            Générer le rapport
                        </a>
                    )}
                </div>
            </PopoverContent>
        </Popover>
    );
}
