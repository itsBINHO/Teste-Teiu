<template>
  <v-container class="padding-cadastro py-16">
    <v-card class="pa-5">
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
          <p class="text-h5 font-weight-bold">Cadastrar Produto</p>
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
                  placeholder="Digite o nome do produto"
                  :rules="nomeRules"
                  v-model="dadosFormulario.nome"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label class="w-100 mb-2 font-weight-bold">
                  Categoria:
                </label>
                <v-select
                  variant="outlined"
                  density="comfortable"
                  placeholder="Selecione a categoria"
                  :items="categorias"
                  :rules="categoriaRules"
                  v-model="dadosFormulario.categoria"
                ></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label class="w-100 mb-2 font-weight-bold">
                  Fornecedor:
                </label>
                <v-text-field
                  variant="outlined"
                  density="comfortable"
                  placeholder="Digite o nome do fornecedor"
                  :rules="fornecedorRules"
                  v-model="dadosFormulario.fornecedor"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="3">
                <label class="w-100 mb-2 font-weight-bold">
                  Preço:
                </label>
                <v-text-field
                  variant="outlined"
                  density="comfortable"
                  placeholder="Digite o preço do produto"
                  :rules="precoRules"
                  v-model="dadosFormulario.preco"
                ></v-text-field>
              </v-col>

              <v-col cols="12" md="3">
                <label class="w-100 mb-2 font-weight-bold">
                  Frete:
                </label>
                <v-text-field
                  variant="outlined"
                  density="comfortable"
                  placeholder="Digite o valor do frete"
                  :rules="freteRules"
                  v-model="dadosFormulario.frete"
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <label class="w-100 mb-2 font-weight-bold">
                  Descrição:
                </label>
                <v-textarea
                  variant="outlined"
                  placeholder="Digite A descrição do produto"
                  :rules="descricaoRules"
                  v-model="dadosFormulario.descricao"
                ></v-textarea>
              </v-col>

              <v-col cols="12" class="d-flex justify-center align-center mt-4">
                <v-btn color="preto" :disabled="!formValido" @click="enviarForm">Cadastrar</v-btn>
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script setup>
import { ref } from 'vue'
const formValido = ref(false);
const categorias = ref(['Limpeza Doméstica', 'Limpeza Pessoal']);
const dadosFormulario = ref({
  nome: '',
  categoria: null,
  fornecedor: '',
  preco: null,
  frete: null,
  descricao: ''
});

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
</script>