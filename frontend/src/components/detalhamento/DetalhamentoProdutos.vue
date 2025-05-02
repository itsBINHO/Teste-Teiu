<template>
  <v-container class="padding-listagem py-16" v-if="!produto">
      <div class="d-flex justify-center align-center border pa-16">
        <p>Não foi possível encontrar esse produto no banco</p>
      </div>
  </v-container>
  <v-container class="padding-listagem py-16" v-if="produto">
    <v-row>
      <v-col cols="12" md="5">
        <p class="text-body-2 text-grey">Categoria | {{ produto.categoria }}</p>
        <p class="text-h6 font-weight-bold mb-3">{{ produto.nome }}</p>
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
          <p class="text-red text-subtitle-1">{{ formatarReais(desconto) }}</p>
          <p class=" font-weight-bold text-h5">{{ formatarReais(total) }}</p>
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
            <p><span>Frete: </span>{{ formatarReais(produto.frete) }}</p>
          </div>
          <div class="mt-3">
            <p class="text-h6">Na compra de 3 Produtos Receba:</p>
            <p class="text-green text-h3 my-1">5%</p>
            <p class="text-h6">de Desconto</p>
          </div>
          <div class="mt-5">
            <p class="text-h6 font-weight-bold mb-3">Descrição do Produto</p>
            <p>{{ produto.descricao }}</p>
          </div>
          <v-row class="mt-5">
            <v-col cols="12" md="6">
              <v-btn color="red" block @click="deletarProduto(produto.id)">Apagar Produto</v-btn>
            </v-col>
            <v-col cols="12" md="6">
              <v-btn color="preto" block>Editar Produto</v-btn>
            </v-col>
          </v-row>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { produtoService } from '@/services';
import { formatarReais } from '@/utils/formatar-reais.js';
import { useRouter, useRoute } from "vue-router";

const contador = ref(1);
const router = useRouter();
const route = useRoute();
const id = ref(null);
const produto = ref(null);
const total = ref(0);
const desconto = ref(0);

const irPara = (path) => {
  router.push({ path: path });
};

const calcularTotais = () => {
  const precoUnitario = Number(produto.value.preco) || 0;
  const qtd = contador.value;

  total.value = precoUnitario * qtd;

  if (qtd >= 3) {
    desconto.value = total.value * 0.05;
  } else {
    desconto.value = 0;
  }
};

const mudarContador = (indicador) => {
  if (indicador === 'incrementar') {
    contador.value += 1;
  } else if (contador.value > 1) {
    contador.value -= 1;
  }
  calcularTotais();
};

const getProdutoId = async (id) => {
  try {
    const response = await produtoService.getProdutoId(id);
    produto.value = response.data;
    calcularTotais();
  } catch (error) {
    console.error('Erro ao buscar produto:', error);
  }
};

const deletarProduto = async (id) => {
  try {
    const response = await produtoService.deletarProduto(id);
    alert('Produto deletado com sucesso!');
    setTimeout(() => {
      irPara('/');
    }, 1000);
  } catch (error) {
    console.error('Erro ao deletar produto:', error);
  }
};

onMounted(() => {
  id.value = route.params.id;
  getProdutoId(id.value);
});
</script>

<style>
.tamanho-incrementador {
  width: 100px;
  height: 30px;
  background-color: #f0f0f0;
}
</style>