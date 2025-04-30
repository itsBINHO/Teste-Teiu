<template>
  <v-app>
    <cabecalho />
    <default-view />
    <rodape />
  </v-app>
</template>

<style scoped>

</style>
<script setup>
import DefaultView from "./View.vue";
import Cabecalho from "@/components/default/Cabecalho.vue";
import Rodape from "@/components/default/Rodape.vue";
</script>
