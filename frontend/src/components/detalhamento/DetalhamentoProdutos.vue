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
          <p class="text-red text-subtitle-1">{{ formatarReais("-" + desconto) }}</p>
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
              <v-btn color="preto" block @click="abrirFecharModal">Editar Produto</v-btn>
            </v-col>
          </v-row>
        </div>
      </v-col>
    </v-row>
  </v-container>

  <v-dialog v-model="modalEditarProduto" max-width="1200px">
    <v-container class="py-16">
      <v-card class="pa-5 tamanho-modal">
        <v-row>
          <v-col cols="12" class="d-flex justify-center">
            <v-img 
              src="@/assets/votre-comercial.png"
              contain
              max-height="60"
              max-width="150"
              class="align-center"
            />
          </v-col>
        </v-row>
        <v-row class="my-4">
          <v-col cols="12" class="d-flex justify-center">
            <p class="text-h5 font-weight-bold">Editar Produto</p>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-form ref="formContain" v-model="formValido" lazy-validation>
              <v-row class="px-2">

                <v-col cols="12" md="6">
                  <label class="w-100 mb-2 font-weight-bold">
                    Nome do Produto:
                  </label>
                  <v-text-field
                    variant="outlined"
                    density="comfortable"
                    :placeholder="produto.nome"
                    :rules="nomeRules"
                    v-model="dadosEditarFormulario.nome"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" md="6">
                  <label class="w-100 mb-2 font-weight-bold">
                    Categoria:
                  </label>
                  <v-select
                    variant="outlined"
                    density="comfortable"
                    :placeholder="produto.categoria"
                    :items="categorias"
                    :rules="categoriaRules"
                    v-model="dadosEditarFormulario.categoria"
                  ></v-select>
                </v-col>

                <v-col cols="12" md="6">
                  <label class="w-100 mb-2 font-weight-bold">
                    Fornecedor:
                  </label>
                  <v-text-field
                    variant="outlined"
                    density="comfortable"
                    :placeholder="produto.fornecedor"
                    :rules="fornecedorRules"
                    v-model="dadosEditarFormulario.fornecedor"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" md="3">
                  <label class="w-100 mb-2 font-weight-bold">
                    Preço:
                  </label>
                  <v-text-field
                    variant="outlined"
                    density="comfortable"
                    :placeholder="produto.preco"
                    :rules="precoRules"
                    v-model="dadosEditarFormulario.preco"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" md="3">
                  <label class="w-100 mb-2 font-weight-bold">
                    Frete:
                  </label>
                  <v-text-field
                    variant="outlined"
                    density="comfortable"
                    :placeholder="produto.frete"
                    :rules="freteRules"
                    v-model="dadosEditarFormulario.frete"
                  ></v-text-field>
                </v-col>

                <v-col cols="12">
                  <label class="w-100 mb-2 font-weight-bold">
                    Descrição:
                  </label>
                  <v-textarea
                    variant="outlined"
                    :placeholder="produto.descricao"
                    :rules="descricaoRules"
                    v-model="dadosEditarFormulario.descricao"
                  ></v-textarea>
                </v-col>

                <v-col cols="12" class="d-flex justify-center align-center mt-4">
                  <v-btn color="preto" :disabled="!formValido" @click="editarProduto">Editar</v-btn>
                </v-col>
              </v-row>
            </v-form>
          </v-col>
        </v-row>
      </v-card>
    </v-container>
  </v-dialog>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { produtoService } from '@/services';
import { formatarReais } from '@/utils/formatar-reais.js';
import { useRouter, useRoute } from "vue-router";

const nomeRules = ref([(v) => !!v || "Nome é obrigatória."]);
const categoriaRules = ref([(v) => !!v || "Categoria é obrigatória."]);
const fornecedorRules = ref([(v) => !!v || "Fornecedor é obrigatório."]);
const precoRules = ref([
  (v) => !!v || "Preço é obrigatório.",
  (v) => !isNaN(parseFloat(v)) || "Preço deve ser numérico.",
]);
const freteRules = ref([
  (v) => !!v || "Frete é obrigatório.",
  (v) => !isNaN(parseFloat(v)) || "Frete deve ser numérico.",
]);
const descricaoRules = ref([(v) => !!v || "Descrição é obrigatório."]);

const contador = ref(1);
const router = useRouter();
const route = useRoute();
const id = ref(null);
const produto = ref(null);
const total = ref(0);
const desconto = ref(0);
const modalEditarProduto = ref(false);
const formValido = ref(false);
const categorias = ref(['Limpeza Doméstica', 'Limpeza Pessoal']);

const dadosEditarFormulario = ref({
  nome: '',
  categoria: null,
  fornecedor: '',
  preco: null,
  frete: null,
  descricao: '',
  id: null
});

const irPara = (path) => {
  router.push({ path: path });
};

const abrirFecharModal = () => {
  modalEditarProduto.value = !modalEditarProduto.value;
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

const editarProduto = async () => {
  try {
    dadosEditarFormulario.value.id = id.value;
    const response = await produtoService.editarProduto(dadosEditarFormulario.value);
    alert(response.data.mensagem);
    getProdutoId(id.value);
    modalEditarProduto.value = false;
  } catch (error) {
    console.error('Erro ao editar produto:', error);
    alert('Erro ao editar produto. Tente novamente.');
  } finally {
    dadosEditarFormulario.value = {
      nome: '',
      categoria: null,
      fornecedor: '',
      preco: null,
      frete: null,
      descricao: ''
    };
  }
}

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

@media (max-width: 959px) {
  .tamanho-modal {
    overflow-y: auto !important;
    max-height: 500px;
  }
}

</style>