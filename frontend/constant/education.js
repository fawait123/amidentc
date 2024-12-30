import PostFive from "@/Pages/Education/Partials/PostFive.vue";
import PostFour from "@/Pages/Education/Partials/PostFour.vue";
import PostKomik from "@/Pages/Education/Partials/PostKomik.vue";
import PostOne from "@/Pages/Education/Partials/PostOne.vue";
import PostThree from "@/Pages/Education/Partials/PostThree.vue";
import PostTwo from "@/Pages/Education/Partials/PostTwo.vue";
import PostYoutube from "@/Pages/Education/Partials/PostYoutube.vue";
import { Banknote, BookOpenText, TvMinimalPlay } from "lucide-vue-next";

export const educationData = [
    {
        title: "Kebersihan dan kesehatan gigi dan mulut",
        component: PostOne,
        showCaraousel: true,
        icon: BookOpenText,
    },
    {
        title: "Makanan yang menyehatkan untuk gigi",
        component: PostTwo,
        showCaraousel: true,
        icon: BookOpenText,
    },
    {
        title: "Makanan yang bisa menyebabkan gigi berlubang",
        component: PostThree,
        showCaraousel: true,
        icon: BookOpenText,
    },
    {
        title: "Penyakit Gigi dan Mulut",
        component: PostFour,
        showCaraousel: true,
        icon: BookOpenText,
    },
    {
        title: "Teknik Mengggosok gigi",
        component: PostFive,
        showCaraousel: true,
        icon: BookOpenText,
    },
    {
        title: "Komik Edukasi",
        component: PostKomik,
        showCaraousel: false,
        icon: Banknote,
    },
    {
        title: "Video Edukasi kesehatan Gigi dan Mulut",
        component: PostYoutube,
        showCaraousel: false,
        icon: TvMinimalPlay,
        src: "https://www.youtube.com/embed/I-vZjuhEgNw?si=6VK-OjhtRdIW2xkU",
    },
    {
        title: "Video Cara Menggosok Gigi",
        component: PostYoutube,
        showCaraousel: false,
        icon: TvMinimalPlay,
        src: "https://www.youtube.com/embed/p5ByLOXaUPI?si=zi0_Q8Cr0PG2eQ9z",
    },
    {
        title: "Video Kesehatan Gigi dan Mulut Remaja",
        component: PostYoutube,
        showCaraousel: false,
        icon: TvMinimalPlay,
        src: "https://www.youtube.com/embed/lKEdugiW6us?si=tfO0ehupI_L-EbY6",
    },
];
