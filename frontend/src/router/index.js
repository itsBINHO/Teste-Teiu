import { createRouter, createWebHashHistory } from "vue-router";
import Default from "@/layouts/default/Default.vue";
import Inicio from "@/views/Inicio.vue";

const routes = [
  {
    path: "/",
    component: Default,
    children: [
      {
        path: "/",
        name: "Inicio",
        component: Inicio,
      },
    ],
  },
]
const router = createRouter({
  history: createWebHashHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;