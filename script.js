


let carrinho = []; 


function ToggleCarrinho(){
    const carrinhoDiv = document.getElementById('carrinho');
    if (carrinhoDiv.style.display === 'none' || carrinhoDiv.style.display === '') {
        carrinhoDiv.style.display = 'block';
    } else {
        carrinhoDiv.style.display = 'none';
    }
}


function adicionarProduto(nome, preco, imagem) {
    carrinho.push({ nome, preco, imagem });
    atualizarCarrinho();
}


function removerProduto(index) {
    carrinho.splice(index, 1);
    atualizarCarrinho();
}

function removerTudo(index){
    const carrinhoDiv = document.getElementById('carrinho');
    const alerta = document.getElementById('alerta')

    if(carrinhoDiv.style.display = carrinho.length == 0){

        const alerta = `
                <div class="alert alert-warning alert-dismissible fade show fixed-top text-center mb-0" role="alert" id="alerta">
                    <strong>Aviso!</strong> Nenhum produto no carrinho. 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            `;
            document.body.insertAdjacentHTML('afterbegin', alerta);
    }else{
        carrinho.splice(index);
        atualizarCarrinho();
        if (!document.getElementById('alerta')) {
            const alerta = `
                <div class="alert alert-warning alert-dismissible fade show fixed-top text-center mb-0" role="alert" id="alerta">
                    <strong>Aviso!</strong> Todos os produtos foram removidos. 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            `;
            document.body.insertAdjacentHTML('afterbegin', alerta);
        }

       
    }
    
}





function atualizarCarrinho() {
    const listaCarrinho = document.getElementById("lista-carrinho");
    listaCarrinho.innerHTML = "";

    carrinho.forEach((produto, index) => {
        const li = document.createElement("li");
        li.innerHTML = `
            <img src="${produto.imagem}" alt="${produto.nome}" style="width: 50px; height: 50px;">
            <span>x1 - ${produto.nome}</span>
            <span>R$ ${produto.preco.toFixed(2).replace('.', ',')}</span>
            <button class="btn btn-danger" onclick="removerProduto(${index})">Remover</button>
      
        `;
        listaCarrinho.appendChild(li);
    });

    const totalCarrinho = document.getElementById("total-carrinho");
    const total = carrinho.reduce((total, produto) => total + produto.preco, 0); 
    totalCarrinho.innerText = total.toFixed(2).replace('.', ','); 

    const carrinhoDiv = document.getElementById('carrinho');
    carrinhoDiv.style.display = carrinho.length > 0 ? 'block' : 'none'; 
}



function finalizarCompra() {
    const modal = document.getElementById("modal");

    modal.innerHTML = "";

    const conteudo = document.createElement("div");
    conteudo.className = "modal-dialog"; 

    conteudo.innerHTML = `

                
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-dark">QR Code para Pagamento</h5>
                
            </div>
            <div class="modal-body text-center text-dark">
                <h6>Total: R$ <span id="total-modal"></span></h6>
                <img src="./img/qrcode.png" alt="QR Code" style="width: 200px; height: 200px;">
                <p class="mt-3" style="color: black;">Escaneie o QR Code para concluir o pagamento.</p>
                <p class="mt-3" style="color: black;">Aperte fora do modal para sair.</p>

            </div>
            <div class="modal-footer">
               
            </div>
        </div>
        </div>
 


        
    `;


    modal.appendChild(conteudo);


    const totalCarrinho = document.getElementById("total-carrinho").textContent;
    document.getElementById("total-modal").textContent = totalCarrinho;

    const bootstrapModal = new bootstrap.Modal(modal);
    bootstrapModal.show();
}


function maps() {
    const streetIframe = document.getElementById('street');
    const mapsIframe = document.getElementById('maps'); 

    if (mapsIframe.style.display === 'none' || mapsIframe.style.display === '') {
        mapsIframe.style.display = 'block';  
        streetIframe.style.display = 'none';  
        mapsIframe.style.zIndex = 99;  
    } else {
        mapsIframe.style.display = 'none'; 
        streetIframe.style.display = 'block'; 
    }
}

