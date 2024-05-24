var carrinho = [];

// Evento de clique para os botões "Comprar"
document.querySelectorAll(".comprar").forEach(function (botao) {
    botao.addEventListener("click", function () {
        // Pegar os dados do produto
        var nome = this.getAttribute("data-nome");
        var valor = this.getAttribute("data-valor");

        // Verificar se o produto já está no carrinho
        var produtoExistente = carrinho.find(function (produto) {
            return produto.nome === nome;
        });

        if (produtoExistente) {
            // Se o produto já está no carrinho, aumentar a quantidade
            produtoExistente.quantidade++;

        } else {
            // Se o produto não está no carrinho, adicionar com quantidade 1

            carrinho.push({ nome: nome, valor: parseFloat(valor), quantidade: 1 });
        }

        // Atualizar o carrinho
        atualizarCarrinho();
    });
});

// Função para atualizar o carrinho
function atualizarCarrinho() {
    // Calcular total
    var total = 0;
    carrinho.forEach(function (produto) {
        total += produto.valor * produto.quantidade;
    });

    // Gerar o HTML do carrinho
    var html = "";
    carrinho.forEach(function (produto, index) {
        html += "<div class='item'>";
        html += "<p>" + produto.nome + " (quant: " + produto.quantidade + "): R$ " + (produto.valor * produto.quantidade).toFixed(2) + "</p>";
        html += "<div class='item-btn'>";
        html += "<button class='add' data-index='" + index + "'>+</button>";
        html += "<button class='remove' data-index='" + index + "'>-</button>";
        html += "</div>";
        html += "</div>";
    });
    html += '<div class="total"> Total: R$ ' + total.toFixed(2) + "</div>";

    // Mostrar carrinho
    document.getElementById("carrinho").innerHTML = html;

    // Adicionar eventos de clique aos botões
    document.querySelectorAll('.add').forEach(function(botao) 
    {
        botao.addEventListener('click', function() {
            var index = this.getAttribute('data-index');
            carrinho[index].quantidade++;
            atualizarCarrinho();
        });
    });

    document.querySelectorAll('.remove').forEach(function(botao) 
    {
        botao.addEventListener('click', function() {
            var index = this.getAttribute('data-index');
            carrinho[index].quantidade--;
            if (carrinho[index].quantidade <= 0) {
                carrinho.splice(index, 1);
                if (carrinho.length == 0) {

                    document.getElementById("carrinhoModal").style.display = "none";
                }
            }
            atualizarCarrinho();
        });
    });
}

function abrirCarrinho() {
    document.getElementById("carrinhoModal").style.display = "block";
}

window.onclick = function (event) {
    var modal = document.getElementById("carrinhoModal");

    if (event.target == modal) {
        modal.style.display = "none";
    }
};
