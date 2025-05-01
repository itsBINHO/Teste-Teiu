<template>
  <v-main class="pa-0 ma-0">
    <v-carousel
      hide-delimiter-background
      :show-arrows="false"
      delimiter-icon="mdi-square"
      height="400"
      cycle
      interval="5000"
      class="d-none d-md-block"
    >
      <v-carousel-item
        src="../../assets/banner/banner-azul.png"
        cover
      ></v-carousel-item>

      <v-carousel-item
        src="../../assets/banner/banner-roxo.png"
        cover
      ></v-carousel-item>
      <v-carousel-item
        src="../../assets/banner/banner-ocean.png"
        cover
      ></v-carousel-item>
    </v-carousel>
    <v-carousel
      hide-delimiter-background
      :show-arrows="false"
      delimiter-icon="mdi-square"
      height="400"
      cycle
      interval="5000"
      class="d-md-none"
    >
      <v-carousel-item
        src="../../assets/banner/banner-azul-mobile.png"
        contain
      ></v-carousel-item>

      <v-carousel-item
        src="../../assets/banner/banner-roxo-mobile.png"
        contain
      ></v-carousel-item>
      <v-carousel-item
        src="../../assets/banner/banner-ocean-mobile.png"
        contain
      ></v-carousel-item>
    </v-carousel>
  </v-main>
</template>


<script setup>
</script>