import { useState } from "react";
import ApplicationLogo from "@/Components/ApplicationLogo";
import Dropdown from "@/Components/Dropdown";
import NavLink from "@/Components/NavLink";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink";
import { Link, router, usePage } from "@inertiajs/react";
import { Bell, Cross, UserRound, X } from "lucide-react";
export default function Authenticated({ user, header, children }) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] =
        useState(false);
    const notifications = usePage().props.notifications;

    return (
        <div className="min-h-screen bg-custom">
            <nav className="bg-white border-b border-gray-100">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-16">
                        <div className="flex">
                            <div className="shrink-0 flex items-center">
                                <Link href="/">
                                    <ApplicationLogo className="block h-7 md:h-10 w-28 md:w-auto fill-current text-gray-800" />
                                </Link>
                            </div>

                            <div className="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                {user.status === "employee" && (
                                    <>
                                        <NavLink
                                            href={route("/")}
                                            active={route().current("/")}
                                        >
                                            Calendrier
                                        </NavLink>
                                        <NavLink
                                            href={route("demande-conge")}
                                            active={route().current(
                                                "demande-conge"
                                            )}
                                        >
                                            Solde de Congé
                                        </NavLink>
                                    </>
                                )}
                                {(user.status === "chef" ||
                                    user.status === "admin") && (
                                    <>
                                        <NavLink
                                            href={route("horaires")}
                                            active={route().current("horaires")}
                                        >
                                            Gérer Les Horaires
                                        </NavLink>
                                        <NavLink
                                            href={route("demande-conge-chef")}
                                            active={route().current(
                                                "demande-conge-chef"
                                            )}
                                        >
                                            Les Demandes de Congé
                                        </NavLink>
                                        <NavLink
                                            href={route("absences")}
                                            active={
                                                route().current("absences") ||
                                                route().current(
                                                    "absences.employee"
                                                )
                                            }
                                        >
                                            Consulter les absences
                                        </NavLink>
                                    </>
                                )}
                                {user.status === "admin" && (
                                    <>
                                        <NavLink
                                            href={route("demandes-inscription")}
                                            active={route().current(
                                                "demandes-inscription"
                                            )}
                                        >
                                            Demandes d'inscriptions
                                        </NavLink>
                                        <NavLink
                                            href={route("employees")}
                                            active={route().current(
                                                "employees"
                                            )}
                                        >
                                            Gérer les comptes
                                        </NavLink>
                                    </>
                                )}
                            </div>
                        </div>

                        <div className="hidden sm:flex sm:items-center sm:ms-6">
                            <div className="ms-3 relative flex">
                                {notifications && (
                                    <Dropdown className="">
                                        <Dropdown.Trigger>
                                            <span className="inline-flex rounded-md">
                                                <button
                                                    type="button"
                                                    className="relative inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md  bg-white hover:text-gray-700 focus:outline-none focus:text-gray-700 transition ease-in-out duration-150 text-gray-500"
                                                >
                                                    <Bell className=" w-10 h-7" />
                                                    {notifications.length >
                                                        0 && (
                                                        <div className="absolute top-2 right-5 bg-red-500 size-3 rounded-full"></div>
                                                    )}
                                                </button>
                                            </span>
                                        </Dropdown.Trigger>

                                        <Dropdown.Content>
                                            <div className="font-medium text-sm pl-4 text-gray-500">
                                                {user.status === "employee"
                                                    ? "Notifications de Congés"
                                                    : "Notifications d'absences"}
                                            </div>
                                            {notifications.map(
                                                (notification) => (
                                                    <div
                                                        key={notification.id}
                                                        className="flex items-center justify-between"
                                                    >
                                                        {notification
                                                            .demande_conge
                                                            .status ===
                                                        "refuse" ? (
                                                            <div className="block text-red-400 font-semibold w-full px-4 py-2 text-start text-base  leading-5 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out ">
                                                                {
                                                                    notification.message
                                                                }
                                                            </div>
                                                        ) : (
                                                            <a
                                                                href={
                                                                    user.status ===
                                                                    "employee"
                                                                        ? route(
                                                                              "demander-conge.pdf",
                                                                              {
                                                                                  demande:
                                                                                      notification.demande_conge_id,
                                                                              }
                                                                          )
                                                                        : route(
                                                                              "absences.employee",
                                                                              {
                                                                                  employee:
                                                                                      notification.user_id,
                                                                              }
                                                                          )
                                                                }
                                                                className="block text-green-400 font-semibold w-full px-4 py-2 text-start text-base  leading-5 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out "
                                                            >
                                                                <div>
                                                                    {
                                                                        notification.message
                                                                    }
                                                                </div>
                                                            </a>
                                                        )}

                                                        {!(
                                                            user.status ===
                                                            "employee"
                                                        ) && (
                                                            <X
                                                                onClick={() => {
                                                                    router.delete(
                                                                        "/notifications/" +
                                                                            notification.id
                                                                    );
                                                                }}
                                                                className="block px-4 py-2 size-14 text-red-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out "
                                                            />
                                                        )}
                                                    </div>
                                                )
                                            )}
                                        </Dropdown.Content>
                                    </Dropdown>
                                )}
                                <Dropdown>
                                    <Dropdown.Trigger>
                                        <span className="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                className="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md  bg-white hover:text-gray-700 focus:outline-none focus:text-gray-700 transition ease-in-out duration-150 text-gray-500"
                                            >
                                                <UserRound className=" w-10 h-7" />
                                            </button>
                                        </span>
                                    </Dropdown.Trigger>

                                    <Dropdown.Content>
                                        <div className="font-medium text-sm pl-4 text-gray-500">
                                            {user.nom}
                                        </div>
                                        <Dropdown.Link
                                            href={route("profile.edit")}
                                        >
                                            Profile
                                        </Dropdown.Link>
                                        <Dropdown.Link
                                            href={route("logout")}
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </Dropdown.Link>
                                    </Dropdown.Content>
                                </Dropdown>
                            </div>
                        </div>

                        <div className="-me-2 flex items-center sm:hidden">
                            <button
                                onClick={() =>
                                    setShowingNavigationDropdown(
                                        (previousState) => !previousState
                                    )
                                }
                                className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg
                                    className="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        className={
                                            !showingNavigationDropdown
                                                ? "inline-flex"
                                                : "hidden"
                                        }
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        className={
                                            showingNavigationDropdown
                                                ? "inline-flex"
                                                : "hidden"
                                        }
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div
                    className={
                        (showingNavigationDropdown ? "block" : "hidden") +
                        " sm:hidden"
                    }
                >
                    {user.status === "employee" && (
                        <div className="pt-2 pb-3 space-y-1">
                            <ResponsiveNavLink
                                href={route("/")}
                                active={route().current("/")}
                            >
                                Calendrier
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                href={route("demande-conge")}
                                active={route().current("demande-conge")}
                            >
                                Solde congé
                            </ResponsiveNavLink>
                        </div>
                    )}

                    <div className="pt-4 pb-1 border-t border-gray-200">
                        <div className="px-4">
                            <div className="font-medium text-base text-gray-800">
                                {user.name}
                            </div>
                            <div className="font-medium text-sm text-gray-500">
                                {user.email}
                            </div>
                        </div>

                        <div className="mt-3 space-y-1">
                            <ResponsiveNavLink href={route("profile.edit")}>
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                method="post"
                                href={route("logout")}
                                as="button"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            {header && (
                <header className="bg-white shadow">
                    <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {header}
                    </div>
                </header>
            )}

            <main>{children}</main>
        </div>
    );
}
