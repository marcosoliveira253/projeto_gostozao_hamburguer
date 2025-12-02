

<p align="center">
  <img src="https://raw.githubusercontent.com/marcosoliveira253/projeto_gostozao_hamburguer/main/img/localhost_hanburgueria_4_painel.php.png" width="50%" />
  <img src="https://raw.githubusercontent.com/marcosoliveira253/projeto_gostozao_hamburguer/main/img/localhost_hanburgueria_4_admin_sistemaProd.php.png" width="45%" />
  <img src="https://raw.githubusercontent.com/marcosoliveira253/projeto_gostozao_hamburguer/main/img/localhost_hanburgueria_4_admin_sistemaUser.php.png" width="45%" />
</p>


# Gostozão Hamburguer 🍔

Bem-vindo ao **Gostozão Hamburguer** — um site de e-commerce para pedidos online de hambúrgueres, refrigerantes e sucos.  
Este projeto foi criado do zero com tecnologias web clássicas (HTML, CSS, JavaScript e PHP) para oferecer uma experiência completa de compra, além de um painel administrativo para gestão de produtos e usuários.

---

## ⚙️ Tecnologias utilizadas

- HTML — estrutura e marcação das páginas  
- CSS — estilos visuais e responsividade  
- JavaScript — interatividade no front-end (carrinho, botões de compra etc.)  
- PHP — back-end para lógica de negócio, controle de pedidos e autenticação  
- (Opcional) MySQL / banco de dados — se estiver usando persistência para produtos/usuários (adeque conforme seu setup)  

---

## 🧰 Funcionalidades principais

- Listagem de produtos (hambúrgueres, bebidas etc.) com nome, descrição, preço e imagem  
- Adição ao “carrinho de compras”  
- Sistema de cadastro/login de usuários  
- Painel administrativo para:  
  - Cadastrar, editar e excluir produtos  
  - Gerenciar usuários (nível de acesso, dados, permissões)  
- Interface responsiva — compatível com dispositivos móveis e desktop  

---

## 📥 Como executar o projeto localmente

1. Clone o repositório:  
   ```bash
   git clone https://github.com/marcosoliveira253/projeto_gostozao_hamburguer.git

2. Copie os arquivos para o seu servidor local (XAMPP, WAMP, MAMP etc.) ou configure um servidor PHP + MySQL.

3. (Se houver banco de dados) Importe o schema SQL ou crie as tabelas necessárias.

4. Acesse via navegador (ex: http://localhost/projeto_gostozao_hamburguer/index.php)

    ⚠️ Se for necessário ajustar variáveis de conexão, edite o arquivo conexao.php com os dados corretos de host, usuário, senha e nome do banco.

📝 Estrutura de pastas (resumo)

/ (raiz do projeto)
  ├── img/           # imagens dos produtos, logos etc.
  ├── index.php      # página principal / front-end
  ├── registrar.php  # cadastro de usuário
  ├── painel.php     # painel administrativo
  ├── script.js      # scripts JavaScript para interações
  ├── conexao.php    # conexão com banco de dados (se aplicável)
  └── … outros arquivos de lógica/back-end

Adapte esta estrutura conforme alterações e novas pastas que você adicionar.
💡 Possíveis melhorias futuras

   * Implementar sistema de pedidos/pagamentos

   * Adicionar carrinho persistente por usuário (no banco de dados)

   * Melhorar design e usabilidade com CSS frameworks ou responsividade avançada

   * Validar formulários no back-end para maior segurança

   * Adicionar logs ou histórico de pedidos

👨‍💻 Autor

Marcos Antonio Alves de Oliveira — desenvolvedor front-end / full-stack
Este projeto também serve como portfólio das minhas habilidades com HTML, CSS, JS, PHP e estruturação de apps web.
📄 Licença

Este projeto está sob a licença MIT — veja o arquivo LICENSE para detalhes.


---
