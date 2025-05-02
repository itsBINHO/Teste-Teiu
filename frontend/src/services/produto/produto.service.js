import { api } from "@/api";

class ProdutoService {
  async getProdutos(){
    return await api.get("/get.php")
  }
}

const produtoService = new ProdutoService();

export { produtoService };