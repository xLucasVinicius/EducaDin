// Seleciona todos os links da navbar
const navLinks = document.querySelectorAll('.nav-lateral ul li a');

// Função para ativar o link correto após a recarga da página
function setActiveLink() {
    const currentPage = new URLSearchParams(window.location.search).get('page');
    navLinks.forEach(link => {
        if (link.getAttribute('href') === `?page=${currentPage}`) {
            link.parentElement.classList.add('active');
        } else {
            link.parentElement.classList.remove('active');
        }
    });
}

// Adiciona o listener de evento para cada link
navLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        // Previne o comportamento padrão do link
        event.preventDefault();

        // Remove a classe "active" de todos os itens li
        navLinks.forEach(item => item.parentElement.classList.remove('active'));

        // Adiciona a classe "active" ao li do link clicado
        this.parentElement.classList.add('active');

        // Redireciona para a nova página
        window.location.href = this.href;
    });
});

// Configura o link ativo na carga da página
window.onload = setActiveLink;

// Seleciona o botão e a div nav-lateral
const btnFechar = document.querySelector('.btn-fechar');
const navLateral = document.querySelector('.nav-lateral');
const conteudo = document.querySelector('.conteudo');
const navTopo = document.querySelector('.nav-topo');
const imgNav = document.querySelector('.img-logo-nav');



btnFechar.addEventListener('click', function() {

    navLateral.classList.toggle('fechado');

        if (navLateral.classList.contains('fechado')) {
            conteudo.style.width = 'calc(100vw - 60px)'; 
            navTopo.style.width = 'calc(100vw - 60px)';
            imgNav.src = '../imagens/favicon.ico';
            imgNav.style.width = '50px';
            btnFechar.style.transform = 'scaleX(-1)';
            btnFechar.style.right = '-30px';
        } else {
            conteudo.style.width = 'calc(100% - 200px)';
            imgNav.src = '../imagens/logo.png';
            imgNav.style.width = '140px';
            btnFechar.style.transform = 'scaleX(1)';
            btnFechar.style.right = '15px';
        }
});


// fim script navbar


// script 
