import { api } from "@/api";

class ProdutoService {
  async getProdutos(){
    return await api.get("/get.php")
  }
  async cadastrarProduto(data){
    return await api.post("/create.php", data)
  }
}

const produtoService = new ProdutoService();

export { produtoService };