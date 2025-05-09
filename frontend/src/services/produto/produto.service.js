import { api } from "@/api";

class ProdutoService {
  async getProdutos(){
    return await api.get("/get.php")
  }
  async cadastrarProduto(data){
    return await api.post("/create.php", data)
  }
  async getProdutoId(id) {
    return await api.post('getById.php', { id });
  }
  async deletarProduto(id) {
    return await api.delete(`/delete.php?id=${id}`);
  }
  async editarProduto(data) {
    return await api.post(`/update.php`, data);
  }
}

const produtoService = new ProdutoService();

export { produtoService };