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
// href={route("absences.rapport", {
//     employee: employee.id,
// })}
const mois = [
    "janvier",
    "fevrier",
    "mars",
    "avril",
    "mai",
    "juin",
    "juillet",
    "aout",
    "septembre",
    "octobre",
    "novembre",
    "decembre",
];
const annee = [2021, 2022, 2023, 2024];
export default function PopoverWrapper({ children }) {
    const [format, setFormat] = useState("");
    console.log(format);
    return (
        <Popover>
            <PopoverTrigger>{children}</PopoverTrigger>
            <PopoverContent>
                <div className=" h-48 flex flex-col justify-between">
                    <div className="flex flex-col gap-4">
                        <Select defaultValue="" onValueChange={setFormat}>
                            <SelectTrigger className="w-full">
                                <SelectValue placeholder="Format" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectItem value="mois">Mois</SelectItem>
                                <SelectItem value="annee">Annee</SelectItem>
                            </SelectContent>
                        </Select>
                        {format && (
                            <Select>
                                <SelectTrigger className="w-full">
                                    <SelectValue
                                        placeholder={
                                            format === "mois"
                                                ? "Choisi un mois"
                                                : "Choisi une annee"
                                        }
                                    />
                                </SelectTrigger>
                                <SelectContent>
                                    {format === "mois"
                                        ? mois.map((m, i) => (
                                              <SelectItem value={m} key={i}>
                                                  {m}
                                              </SelectItem>
                                          ))
                                        : annee.map((a, i) => (
                                              <SelectItem value={a} key={i}>
                                                  {a}
                                              </SelectItem>
                                          ))}
                                </SelectContent>
                            </Select>
                        )}
                    </div>
                    <Link
                        className="bg-main w-full flex justify-center items-center gap-2 px-3 py-1 rounded-md text-white font-semibold border border-main hover:bg-white hover:text-main "
                        // href={route("absences.rapport", {
                        //     // employee: employee.id,
                        // })}
                    >
                        Générer le rapport
                    </Link>
                </div>
            </PopoverContent>
        </Popover>
    );
}
