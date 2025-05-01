<template>
  <footer class="bg-preto tamanho-rodape d-flex align-center py-5 mt-16">
    <v-container>
      <v-row>
        <v-col cols="12" md="4" class="d-md-none mb-6 d-flex justify-center align-start">
          <v-img 
          src="../../assets/votre1.png"
          contain
          max-height="200"
          max-width="200"
          class="align-center"/>
        </v-col>
        <v-col class=" d-flex flex-column align-center py-0 pa-md-0" cols="6" md="4">
          <div>
            <p class="text-h5 mb-4">Limpeza</p>
            <div class="d-flex text-start">
              <div class="d-flex flex-column mr-4">
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Alvejante</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Lava Louças</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Água Sanitária</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Sabão</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Escovas</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Vassouras</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Lava Roupas</a>
              </div>
              <div class="d-flex flex-column py-0 pa-md-0">
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Alvejante</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Lava Louças</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Água Sanitária</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Sabão</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Escovas</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Vassouras</a>
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Lava Roupas</a>
              </div>
            </div>
          </div>  
        </v-col>
        <v-col class=" d-flex flex-column align-center pa-0" cols="6" md="4">
          <div>
            <p class="text-h5 mb-4">Higiene Pessoal</p>
            <div class="d-flex align-center">
              <div class="d-flex flex-column mr-4">
                <a href="#" class="link-rodape text-body-2 text-md-subtitle-2">Sabonete Maran Suave</a>
              </div>
            </div>
          </div>
        </v-col>
        <v-col cols="12" md="4" class="d-none d-md-flex align-start justify-center">
          <v-img 
          src="../../assets/votre1.png"
          contain
          max-height="200"
          max-width="200"
          class="align-center"/>
        </v-col>
      </v-row>
    </v-container>
  </footer>
</template>

<script setup>
</script>

<style>
.tamanho-rodape {
  min-height: 300px;
}

.link-rodape {
  color: white;
  text-decoration: none;
  font-size: 14px;
  margin-bottom: 5px;
}

.link-rodape:hover {
  text-decoration: underline;
  color: #c9c9c9;
}
</style>