import ApplicationLogo from "@/Components/ApplicationLogo";
import { Link } from "@inertiajs/react";

export default function Guest({ children }) {
    return (
        <div className="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div className="w-60 flex justify-center">
                <Link
                    href="/"
                    className="flex justify-content items-center gap-10"
                >
                    <ApplicationLogo className="md:w-full w-48 h-full fill-current text-gray-500" />
                </Link>
            </div>

            <div className="w-[90%] sm:w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
                {children}
            </div>
        </div>
    );
}
