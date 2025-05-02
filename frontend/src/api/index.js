import axios from "axios";
const baseURL = "http://localhost/teste-cadastro-produtos/backend";

export const api = axios.create({
  baseURL: baseURL,
  headers: {
    "Content-Type": "application/json",
  },
});