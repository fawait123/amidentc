import PostFive from "@/Pages/Education/Partials/PostFive.vue";
import PostFour from "@/Pages/Education/Partials/PostFour.vue";
import PostOne from "@/Pages/Education/Partials/PostOne.vue";
import PostThree from "@/Pages/Education/Partials/PostThree.vue";
import PostTwo from "@/Pages/Education/Partials/PostTwo.vue";

export const educationData = [
    {
        title: 'Kebersihan dan kesehatan gigi dan mulut',
        component: PostOne
    },
    {
        title: 'Makanan yang menyehatkan untuk gigi',
        component: PostTwo
    },
    {
        title: 'Makanan yang bisa menyebabkan gigi berlubang',
        component: PostThree
    },
    {
        title: 'Penyakit Gigi dan Mulut',
        component: PostFour
    },
    {
        title: 'Teknik Mengggosok gigi',
        component: PostFive
    }
];
