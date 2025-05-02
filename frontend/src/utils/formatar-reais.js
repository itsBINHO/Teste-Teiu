export function formatarReais(value) {
  const numericValue = parseFloat(value) || 0;
  return numericValue.toLocaleString("pt-BR", {
    style: "currency",
    currency: "BRL",
  });
}
