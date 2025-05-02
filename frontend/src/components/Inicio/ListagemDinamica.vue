<template>
  <v-container class="padding-listagem">
    <div class="pa-2 mt-8">
      <p class="text-h6 mb-2">Produtos e Detalhamento</p>
      <v-row class="d-flex" wrap>
        <v-col cols="12" md="2" v-for="produto in produtos" :key="produto.id">
          <v-card
          max-width="344"
          >
            <v-img
              height="200px"
              src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
              cover
            ></v-img>

            <v-card-title>
              {{ produto.categoria }}
            </v-card-title>

            <v-card-subtitle>
              {{ produto.descricao}}
            </v-card-subtitle>

            <v-card-actions>
              <p class="ml-2">{{ produto.preco }}</p>
            </v-card-actions>
          </v-card>
        </v-col>     
      </v-row>
    </div>
  </v-container>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { produtoService } from '@/services';

const produtos = ref([]);

const getProdutos = async () => {
  try {
    const response = await produtoService.getProdutos();
    produtos.value = response.data;
  } catch (error) {
    console.error('Erro ao buscar produtos:', error);
  }
};

onMounted(() => {
  getProdutos();
});
</script>
