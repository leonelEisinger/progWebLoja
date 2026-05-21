function buscar(palavra, tipo, alvo) {

    const dados = document.getElementById(alvo);

    fetch('func/busca_ajax.php', {
        method: "POST",
        headers: {
            "Content-type": "application/json; charset=UTF-8"
        },
        body: JSON.stringify({
            palavra: palavra,
            tipo: tipo
        })
    })
    .then(r => r.text())
    .then(html => {
        dados.innerHTML = html;
    });
}

document.addEventListener("DOMContentLoaded", () => {

    const tipo = document.body.dataset.tipo;

    const input = document.getElementById("palavra");
    const botao = document.getElementById("buscar");
    const alvo = "dados";

    if (!input || !botao) return;

    buscar("", tipo, alvo);

    botao.addEventListener("click", () => {
        buscar(input.value, tipo, alvo);
    });

    input.addEventListener("input", (e) => {
        buscar(e.target.value, tipo, alvo);
    });
});