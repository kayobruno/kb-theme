/* ============================================================
   VEXNET TELECOM — Interações
   - Menu hamburguer (mobile)
   - Carrosséis com rolagem nativa + scroll-snap
     (swipe no touch; setas, pontos e autoplay via JS)
   - Animação de entrada na viewport (fade + translateY)
   ============================================================ */

(function () {
  "use strict";

  /* ------------------------- Menu mobile ------------------------- */
  const toggle = document.querySelector(".header__toggle");
  const nav = document.querySelector(".header__nav");

  if (toggle && nav) {
    toggle.addEventListener("click", function () {
      const aberto = nav.classList.toggle("header__nav--aberto");
      toggle.setAttribute("aria-expanded", String(aberto));
      toggle.setAttribute("aria-label", aberto ? "Fechar menu" : "Abrir menu");
    });

    // Fecha o menu ao clicar em um link
    nav.addEventListener("click", function (evento) {
      if (evento.target.closest("a")) {
        nav.classList.remove("header__nav--aberto");
        toggle.setAttribute("aria-expanded", "false");
      }
    });
  }

  /* ------------------------- Carrosséis ------------------------- */
  /**
   * Carrossel sobre um scroller nativo (overflow-x + scroll-snap).
   * O swipe no touch funciona sozinho; aqui ligamos setas, pontos
   * de navegação e autoplay opcional (data-autoplay="<ms>" no trilho).
   */
  function criarCarrossel(nome) {
    const trilho = document.querySelector('[data-carrossel="' + nome + '"]');
    if (!trilho) return;

    const janela = trilho.parentElement;
    const anterior = document.querySelector('[data-carrossel-anterior="' + nome + '"]');
    const proxima = document.querySelector('[data-carrossel-proxima="' + nome + '"]');
    const pontosWrap = document.querySelector('[data-carrossel-pontos="' + nome + '"]');

    function passo() {
      const item = trilho.children[0];
      if (!item) return 1;
      const gap = parseFloat(getComputedStyle(trilho).gap) || 0;
      return item.getBoundingClientRect().width + gap;
    }

    function fim() {
      return Math.max(0, Math.round((janela.scrollWidth - janela.clientWidth) / passo()));
    }

    function indiceAtual() {
      return Math.round(janela.scrollLeft / passo());
    }

    function irPara(indice) {
      janela.scrollTo({ left: indice * passo(), behavior: "smooth" });
    }

    function ir(delta) {
      let indice = indiceAtual() + delta;
      if (indice < 0) indice = fim();
      if (indice > fim()) indice = 0;
      irPara(indice);
    }

    if (anterior) anterior.addEventListener("click", function () { ir(-1); });
    if (proxima) proxima.addEventListener("click", function () { ir(1); });

    // Pontos de navegação (opcionais); recriados no resize,
    // pois a quantidade de posições muda com a largura da tela
    function montarPontos() {
      if (!pontosWrap) return;
      pontosWrap.innerHTML = "";
      const total = fim() + 1;
      for (let i = 0; i < total; i++) {
        const ponto = document.createElement("button");
        ponto.type = "button";
        ponto.className = "carrossel__ponto";
        ponto.setAttribute("aria-label", "Ir para o slide " + (i + 1));
        ponto.addEventListener("click", function () { irPara(i); });
        pontosWrap.appendChild(ponto);
      }
      atualizarPontos();
    }

    function atualizarPontos() {
      if (!pontosWrap) return;
      const atual = indiceAtual();
      Array.prototype.forEach.call(pontosWrap.children, function (ponto, i) {
        ponto.classList.toggle("carrossel__ponto--ativo", i === atual);
      });
    }

    let quadro = null;
    janela.addEventListener("scroll", function () {
      if (quadro) return;
      quadro = requestAnimationFrame(function () {
        quadro = null;
        atualizarPontos();
      });
    }, { passive: true });

    let atrasoResize = null;
    window.addEventListener("resize", function () {
      clearTimeout(atrasoResize);
      atrasoResize = setTimeout(montarPontos, 150);
    });

    montarPontos();

    // Autoplay opcional; pausa enquanto o usuário interage
    const autoplayMs = parseInt(trilho.dataset.autoplay || "0", 10);
    const reduzMovimento = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (autoplayMs > 0 && !reduzMovimento) {
      let timer = setInterval(function () { ir(1); }, autoplayMs);
      function pausar() { clearInterval(timer); }
      function retomar() {
        clearInterval(timer);
        timer = setInterval(function () { ir(1); }, autoplayMs);
      }
      janela.addEventListener("mouseenter", pausar);
      janela.addEventListener("mouseleave", retomar);
      janela.addEventListener("touchstart", pausar, { passive: true });
      janela.addEventListener("touchend", retomar, { passive: true });
    }
  }

  criarCarrossel("hero");
  criarCarrossel("empresas");
  criarCarrossel("depoimentos");

  /* -------- Slide automático das imagens "Incluso no plano" -------- */
  const reduzMovimentoPlano = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  document.querySelectorAll("[data-plano-slide]").forEach(function (slide) {
    const itens = slide.querySelectorAll(".plano__slide-item");
    if (itens.length < 2 || reduzMovimentoPlano) return;

    const intervalo = parseInt(slide.dataset.autoplay || "3500", 10);
    let atual = 0;
    let timer = null;

    function mostrar(indice) {
      itens[atual].classList.remove("plano__slide-item--ativo");
      atual = (indice + itens.length) % itens.length;
      itens[atual].classList.add("plano__slide-item--ativo");
    }

    function iniciar() {
      timer = setInterval(function () { mostrar(atual + 1); }, intervalo);
    }

    function parar() { clearInterval(timer); }

    iniciar();
    slide.addEventListener("mouseenter", parar);
    slide.addEventListener("mouseleave", iniciar);
  });

  /* ----------- Modal "Condições e mais detalhes" ----------- */
  let modalAberto = null;

  function fecharModalCondicoes() {
    if (!modalAberto) return;
    modalAberto.hidden = true;
    document.body.classList.remove("plano-modal-aberto");
    modalAberto = null;
  }

  document.querySelectorAll("[data-plano-condicoes]").forEach(function (botao) {
    const modal = document.getElementById(botao.getAttribute("aria-controls"));
    if (!modal) return;

    botao.addEventListener("click", function () {
      fecharModalCondicoes();
      modal.hidden = false;
      document.body.classList.add("plano-modal-aberto");
      modalAberto = modal;
    });

    modal.querySelectorAll("[data-plano-modal-fechar]").forEach(function (elemento) {
      elemento.addEventListener("click", fecharModalCondicoes);
    });
  });

  document.addEventListener("keydown", function (evento) {
    if (evento.key === "Escape") fecharModalCondicoes();
  });

  /* ---------------- Animação de entrada na viewport ---------------- */
  const elementos = document.querySelectorAll(".reveal");

  if ("IntersectionObserver" in window) {
    const observador = new IntersectionObserver(
      function (entradas) {
        entradas.forEach(function (entrada) {
          if (entrada.isIntersecting) {
            entrada.target.classList.add("reveal--visivel");
            observador.unobserve(entrada.target);
          }
        });
      },
      { threshold: 0.12 }
    );

    elementos.forEach(function (el) { observador.observe(el); });
  } else {
    // Fallback: mostra tudo imediatamente
    elementos.forEach(function (el) { el.classList.add("reveal--visivel"); });
  }
})();
