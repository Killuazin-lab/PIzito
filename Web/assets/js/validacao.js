function validarSenha() {
  const senha = document.querySelector('input[name="senha"]').value;
  const confirmar = document.querySelector('input[name="confirmar_senha"]').value;
  if (senha !== confirmar) {
    alert("As senhas não coincidem.");
    return false;
  }
  return true;
}


