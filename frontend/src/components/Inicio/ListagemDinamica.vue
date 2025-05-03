<template>
  <v-container class="padding-listagem">
    <div class="d-flex justify-center align-center border pa-16 mt-8" v-if="produtos.length <= 0">
      <p class="font-weight-bold text-h6">Nenhum produto dinâmico cadastrado</p>
    </div>
    <div class="pa-2 mt-8" v-if="produtos.length > 0">
      <p class="text-h6 mb-2">Produtos e Detalhamento Dinâmico</p>
      <v-row class="d-flex" wrap>
        <v-col cols="12" md="2" class="cursor-pointer" v-for="produto in produtos" :key="produto.id" @click="irPara('/detalhamento', produto.id)">
          <v-card
          max-width="344"
          >
            <v-img
              height="200px"
              src="../../assets/produtos/teiugelpinho.jpg"
            ></v-img>

            <v-card-title>
              {{ produto.nome }}
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
import { useRouter, useRoute } from "vue-router";

const produtos = ref([]);

const router = useRouter();
const route = useRoute();
const drawer = ref(false);

const irPara = (path, id) => {
  router.push({ path: `${path}/${id}` });
};

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
