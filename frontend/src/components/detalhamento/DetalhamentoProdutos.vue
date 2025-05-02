<template>
  <v-container class="padding-listagem py-16">
    <v-row>
      <v-col cols="12" md="5">
        <p class="text-h6 font-weight-bold mb-3">Texto Detalhamento</p>
        <v-img
          height="200px"
          src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
          cover
        >
        </v-img>
      </v-col>
      <v-col cols="1"></v-col>
      <v-col cols="12" md="6">
        <div>
          <p class="text-red text-subtitle-1">Desconto</p>
          <p class="text-h6 font-weight-bold">Valor do produto</p>
          <div class="d-flex justify-center align-center tamanho-incrementador ml-n2">
            <v-card class="border px-1">
              <v-icon size="15" @click="mudarContador('decrementar')">mdi-minus</v-icon>
            </v-card>
            <v-card class="border px-3">
              <p>{{ contador }}</p>
            </v-card>
            <v-card class="border px-1">
              <v-icon size="15" @click="mudarContador('incrementar')">mdi-plus</v-icon>
            </v-card>
          </div>
          <v-btn class="mt-5" color="preto">Colocar no carrinho</v-btn>
          <div class="d-flex align-center mt-4">
            <v-icon class="mr-3">mdi-truck-fast</v-icon>
            <p><span>Frete: </span>X reais</p>
          </div>
          <div class="mt-3">
            <p class="text-h6">Na compra de 3 Produtos Receba:</p>
            <p class="text-green text-h3 my-1">5%</p>
            <p class="text-h6">de Desconto</p>
          </div>
          <div class="mt-5">
            <p class="text-h6 font-weight-bold mb-3">Descrição do Produto</p>
            <p>Lorem Ipsuadipiscing elit. Nullam ac mi eleifend, tempor nibh ut, porttitor nulla. Duis sapien magna, venenatis non fringilla et, viverra vestibulum metus. Vivamus rhoncus tincidunt leo, consectetur ultricies elit. Proin in est et mauris rhoncus dictum. Donec elementum vel dui eget sollicitudin. Praesent pulvinar molestie odio vel pulvinar. Donec turpis leo, mattis et magna quis, ullamcorper sodales nunc. Donec viverra velit eu justo viverra, sit amet condimentum enim hendrerit. Pellentesque tempor, magna quis interdum imperdiet, lorem dolorm Dolor.</p>
          </div>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup>
import { ref } from 'vue';
const contador = ref(1);

const mudarContador = (indicador) => {
  if (indicador === 'incrementar') {
    contador.value += 1;
  } else {
    contador.value -= 1;
  }
};
</script>

<style>
.tamanho-incrementador {
  width: 100px;
  height: 30px;
  background-color: #f0f0f0;
}
</style>