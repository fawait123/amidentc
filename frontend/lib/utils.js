import { clsx } from "clsx";
import { twMerge } from "tailwind-merge";

export function cn(...inputs) {
    return twMerge(clsx(inputs));
}

export function capitalizeFirstLetterOfEachWord(text) {
    return text
        .split(' ')  // Pisahkan kalimat berdasarkan spasi
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))  // Ubah huruf pertama jadi kapital
        .join(' ');  // Gabungkan kembali menjadi satu string
}
