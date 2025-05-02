import { createRouter, createWebHashHistory } from "vue-router";
import Default from "@/layouts/default/Default.vue";
import Inicio from "@/views/Inicio.vue";
import Detalhamento from "@/views/Detalhamento.vue";
import Cadastro from "@/views/Cadastro.vue";

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
      {
        path: "/detalhamento/:id",
        name: "Detalhamento",
        component: Detalhamento,
      },
      {
        path: "/cadastrar-produto",
        name: "Cadastro",
        component: Cadastro,
      },
    ],
  },
]
const router = createRouter({
  history: createWebHashHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;