import { useState, useEffect } from "react";
function useTime() {
    const [currentTime, setCurrentTime] = useState(() => {
        const currentDate = new Date();
        return {
            hours: currentDate.getHours(),
            minutes: currentDate.getMinutes(),
            seconds: currentDate.getSeconds(),
        };
    });
    useEffect(() => {
        const interval = setInterval(() => {
            getCurrentTime();
        }, 1000);
        return () => clearInterval(interval);
    }, []);
    const getCurrentTime = () => {
        const currentDate = new Date();
        const timestamp = {
            hours: currentDate.getHours(),
            minutes: currentDate.getMinutes(),
            seconds: currentDate.getSeconds(),
        };
        setCurrentTime(timestamp);
    };
    return currentTime;
}

export default useTime;
