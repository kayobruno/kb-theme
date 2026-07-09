# KB Theme — Vexnet Telecom

Tema WordPress totalmente gerenciável. Todo o conteúdo do site é editado pelo painel do WordPress, sem tocar em código. Este documento explica **onde** cada conteúdo é gerenciado e **como** funciona.

## Requisitos

- Plugin **Advanced Custom Fields (ACF)** ativo (com os add-ons Repeater e Options Page, já incluídos no tema em `plugins/`).
- Após ativar o tema ou criar novos conteúdos, visite **Configurações → Links Permanentes** uma vez para atualizar as rewrite rules.

## Configurações gerais — Theme Options

Menu **Theme Options** no admin (página de opções do ACF). Vale para o site inteiro:

| Aba | Campo | Onde aparece |
|---|---|---|
| Mídia | Logo Principal | Logo do header |
| Mídia | Logo do Rodapé | Logo do footer (usa a principal se vazio) |
| Mídia | Imagem de Placeholder | Usada quando um post não tem imagem destacada |
| Mídia | Redes Sociais | Repeater de ícone + link |
| Contato | Telefone / E-mail / Endereço | Dados de contato |
| Contato | **WhatsApp** | Número usado em **todos os botões de WhatsApp** do site (Assine fácil, Assine já, Chame no Whatsapp, Contrate já etc.) |
| Contato | **Cidade** | Cidade exibida no topo do site, ao lado do menu |
| Google | **Place ID** e **API Key** | Integração com as avaliações do Google (ver seção Depoimentos) |
| Métricas | Analytics / Facebook Pixel | Códigos de rastreamento no `<head>` |

## Header

- **Logo**: Theme Options → Mídia → Logo Principal.
- **Menu**: **Aparência → Menus**, atribua um menu à location **Principal**. Itens com submenu ganham a setinha (chevron) automaticamente.
- **Botão "Assine fácil"**: abre o WhatsApp cadastrado em Theme Options → Contato.
- **Cidade**: Theme Options → Contato → Cidade (se vazio, não é exibida).

## Página Inicial

A home usa o template **Página Inicial** (`page-home.php`). Ao editar a página no admin, aparece o grupo **Seções da Página Inicial** com uma aba por seção. Os blocos funcionam assim:

### Hero (carrossel do topo)

- Gerenciado no menu **Banners** do admin (página de opções própria).
- Cada banner tem: **plano em destaque** (opcional), link, imagem desktop e imagem mobile. O título e a descrição agora fazem parte da própria imagem, então não há mais campos de texto. Banners do tipo "Vídeo" não são exibidos no hero.
- **Card de oferta** (megas + logo do streaming + preço): aparece apenas quando um **plano** é selecionado naquele banner, exibindo os dados do plano escolhido. Banner sem plano mostra só a imagem.
- O botão "Assine já" usa o link do banner; se vazio, abre o WhatsApp.

### Planos

- Cadastrados no menu **Planos** (custom post type). Cada plano tem: título (tag do card), megas, imagem dos benefícios, lista de benefícios, preço, destaque (sim/não) e selo do destaque.
- O plano com **destaque** ganha o selo no card. O card de oferta do Hero é definido por banner (ver Hero acima).
- Título e subtítulo da seção: campos **titulo_planos** / **descricao_planos** na edição da Página Inicial.
- A home exibe os 5 primeiros planos (ordem de criação).

No box **Informações complementares do Plano** (abaixo dos campos originais) há ainda:

- **Galeria "Incluso no plano"**: várias imagens para o campo "Incluso no seu plano". Com duas ou mais, elas passam automaticamente em slide dentro do card. Se ficar vazia, é usada a imagem única antiga.
- **Preço de oferta**: opcional, no mesmo formato do preço normal (ex.: `79,90`). Quando preenchido, o card mostra *"de R$ [preço] por apenas R$ [oferta]"*, com a oferta em destaque e o preço antigo pequeno e riscado. (Observação: o card de oferta do **Hero** continua exibindo o preço normal do plano selecionado no banner, não a oferta.)
- **Cor da tag de destaque**: cor de fundo do selo do plano em destaque. Vazio = cor padrão do tema.
- **Condições e mais detalhes**: texto jurídico/condições. Quando preenchido, aparece o link "Condições e mais detalhes" que abre um modal (janela) com esse texto. Vazio = o link não aparece.

### Por que escolher

- Aba **Por que escolher** na edição da Página Inicial: título e subtítulo da seção, frase de apoio, título do banner (parte verde + parte branca), texto, texto do botão e imagens desktop/mobile.
- O botão abre o WhatsApp das Theme Options.

### Nossos Diferenciais

- Cadastrados no menu **Diferenciais** (custom post type). Cada diferencial usa:
  - **Imagem destacada** → ícone do card;
  - **Conteúdo** do post → texto do card (quebras de linha são respeitadas);
  - Campo **Link** → destino do botão "+" do card.
- Título da seção: aba **Diferenciais** na edição da Página Inicial.
- A home exibe os 5 primeiros (a grade do layout comporta 5).

### Empresas parceiras

- Cadastradas no menu **Empresas** (custom post type). Cada empresa usa:
  - **Imagem destacada** → logo no carrossel;
  - Campo **Link** → destino do card.
- Título da seção: aba **Empresas** na edição da Página Inicial.
- O carrossel exibe todas as empresas cadastradas.

### Depoimentos (avaliações do Google)

- **Integração automática**: o tema busca as avaliações reais da empresa na **Google Places API**, mantém apenas as com **4 estrelas ou mais** e salva as mais recentes (até 10) no banco do WordPress — nenhuma requisição ao Google é feita quando o visitante carrega a página.
- **Atualização**: 1x por semana via WP-Cron, e também imediatamente sempre que a página **Theme Options** é salva no admin.
- **Configuração**: preencha **Theme Options → Google** com o *Place ID* da empresa (obtenha em [Place ID Finder](https://developers.google.com/maps/documentation/places/web-service/place-id)) e uma *API Key* do Google Cloud com a **Places API** habilitada. Salve — a primeira sincronização roda na hora.
- A nota geral (ex: 4.9) e o total de estrelas também vêm do Google.
- A seção só aparece depois da primeira sincronização bem-sucedida.
- Textos da coluna esquerda (título, observação, texto do botão): aba **Depoimentos** na edição da Página Inicial.
- ⚠️ Limitação do Google: a Places API retorna **no máximo 5 avaliações** por consulta. Para exibir mais seria necessário migrar para a Google Business Profile API (exige OAuth com a conta dona do perfil).

### Vitrine

- Aba **Vitrine** na edição da Página Inicial: frase de apoio, título, subtítulo, imagem da mascote e o repeater **Cards** (logo, texto de canais opcional e link de cada card).

### Atendimento

- Aba **Atendimento** na edição da Página Inicial:
  - Frase de apoio, título e subtítulo da seção;
  - Repeater **Canais**: ícone, texto e link de cada canal (ex: 2ª via do boleto, Central do cliente);
  - Banner do app: tag, título, texto, imagem da mascote e links das lojas (Google Play / App Store — o badge só aparece se o link estiver preenchido).
- O botão "Contrate já" abre o WhatsApp das Theme Options.

## Footer

- **Logo**: Theme Options → Mídia → Logo do Rodapé (usa a Logo Principal se vazio).
- **Colunas de links**: **Aparência → Menus**. Crie até 3 menus e atribua às locations **Rodapé - Coluna 1/2/3**. O **título da coluna é o nome do menu** (ex: um menu chamado "A Vexnet" vira a coluna "A Vexnet"). Colunas sem menu atribuído não são exibidas.

## Estrutura técnica (para devs)

- `functions.php` — registro dos custom post types (`plano`, `diferencial`, `empresa`).
- `includes/kb-theme-acf.class.php` — todos os grupos de campos ACF registrados em código (versionados no git).
- `includes/kb-theme-google-reviews.class.php` — sincronização das avaliações do Google (cron hook `kb_theme_google_reviews_sync`, option `kb_theme_google_reviews`).
- `includes/kb-theme-utils.class.php` — helpers de template (menus, WhatsApp, estrelas, preço, thumbnail com placeholder).
- `header.php` / `footer.php` — header e footer compartilhados por todas as páginas.
- `page-home.php` — template da Página Inicial.
