<template>
  <v-app-bar color="preto" height="100" >
    <v-container class="d-none d-md-block">
      <v-row no-gutters class="px-4 py-2 d-flex align-center border-b border-branco">
        <v-col cols="3">
          <v-toolbar-title class="text-h6">Minha Plataforma</v-toolbar-title>
        </v-col>

        <v-col cols="6" class="d-flex justify-center">
          <v-text-field
            density="compact"
            hide-details
            placeholder="Buscar..."
            prepend-inner-icon="mdi-magnify"
            variant="solo"
            flats
            class="w-100"
          />
        </v-col>

        <v-col cols="3"></v-col>
      </v-row>

      <v-row no-gutters class="px-4">
        <v-col class="d-flex justify-center border">
          <v-btn variant="text" class="text-white">Categoria 1</v-btn>
          <v-btn variant="text" class="text-white">Categoria 2</v-btn>
          <v-btn variant="text" class="text-white">Categoria 3</v-btn>
          <v-btn variant="text" class="text-white">Categoria 4</v-btn>
        </v-col>
      </v-row>
    </v-container>

    <v-container class="d-flex d-md-none align-center justify-space-between px-4">
      <v-toolbar-title class="text-h6">Minha Plataforma</v-toolbar-title>

      <v-btn icon @click="drawer = !drawer">
        <v-icon>mdi-menu</v-icon>
      </v-btn>
    </v-container>
  </v-app-bar>

  <v-navigation-drawer v-model="drawer" temporary class="d-md-none">
    <v-list>
      <v-list-item>
        <v-text-field
          density="compact"
          hide-details
          placeholder="Buscar..."
          prepend-inner-icon="mdi-magnify"
          variant="outlined"
          flat
        />
      </v-list-item>

      <v-list-item @click="">
        <v-list-item-title>Categoria 1</v-list-item-title>
      </v-list-item>
      <v-list-item @click="">
        <v-list-item-title>Categoria 2</v-list-item-title>
      </v-list-item>
      <v-list-item @click="">
        <v-list-item-title>Categoria 3</v-list-item-title>
      </v-list-item>
      <v-list-item @click="">
        <v-list-item-title>Categoria 4</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script setup>
import { ref } from 'vue'
const drawer = ref(false)
</script>
