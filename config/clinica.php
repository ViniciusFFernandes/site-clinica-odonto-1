<?php
/**
 * Configuração do site — Clínica Odontológica Modelo
 * Edite AQUI todos os dados e textos. O HTML (index.php) não precisa mudar.
 */
return [
  // ====== Identidade ======
  'name'    => 'Clínica Odontológica Modelo',
  'clinic'  => 'Clínica Odontológica Modelo',
  'short'   => 'Odonto Modelo',
  'sigla'   => 'OM',
  'tagline' => 'Odontologia Estética · Cidade Exemplo',
  'logo'    => 'img/logo.svg',

  // ====== Contato ======
  'phone'           => '(00) 00000-0000',
  'phone_raw'       => '+5500000000000',
  'whatsapp_numero' => '5500000000000',
  'whatsapp_msg'    => 'Olá! Vim pelo site da Clínica Odontológica Modelo e gostaria de agendar uma avaliação.',

  // ====== Endereço ======
  'building'   => 'Edifício Exemplo',
  'address'    => 'Rua Exemplo, 000 — Sala 00',
  'district'   => 'Cidade Exemplo',
  'city'       => 'Cidade Exemplo',
  'state'   => 'UF',
  'maps_query' => 'Rua Exemplo, 000, Cidade Exemplo · UF',
  'geo_lat'    => 0,
  'geo_lng'    => 0,

  // ====== Avaliações ======
  'rating'     => '5,0',
  'rating_num' => 5.0,
  'reviews'    => 78,

  // ====== Horário ======
  'horario_semana' => 'Seg a Sex · 08h às 19h',
  'horario_sabado' => 'Sábado · sob agendamento',

  // ====== Redes sociais ======
  'instagram'        => '',
  'instagram_handle' => '',

  // ====== SEO ======
  'seo_title' => 'Clínica Odontológica Modelo — Clareamento, Próteses e Implantes em Cidade Exemplo (UF)',
  'seo_desc'  => 'Clínica Odontológica Modelo em Cidade Exemplo (UF). Especialistas em clareamento dental, próteses, implantes e odontologia estética. Tratamentos personalizados com tecnologia e excelência. Nota 5,0 no Google com 78 avaliações. Agende sua avaliação pelo WhatsApp.',

  // ====== Hero ======
  'hero_eyebrow'   => 'Odontologia Estética · Cidade Exemplo · UF',
  'hero_titulo_1'  => 'Transformando sorrisos',
  'hero_titulo_2'  => 'com tecnologia, estética e excelência.',
  'hero_subtitulo' => 'Especialistas em odontologia estética, clareamento dental, próteses e implantes — oferecendo tratamentos personalizados para devolver confiança e qualidade de vida.',

  // ====== Diferenciais ======
  'diferenciais' => [
    ['icon' => 'heart-handshake',  'title' => 'Atendimento Humanizado',          'desc' => 'Escuta atenta e acolhimento em cada etapa. Você é ouvido antes de ser tratado, com tempo e cuidado de verdade.'],
    ['icon' => 'microscope',       'title' => 'Tecnologia de Última Geração',    'desc' => 'Equipamentos modernos a favor de diagnósticos precisos, procedimentos seguros e resultados naturais.'],
    ['icon' => 'sparkles',         'title' => 'Especialistas em Estética Dental','desc' => 'Foco em harmonia, proporção e naturalidade para desenhar o sorriso que combina com você.'],
    ['icon' => 'clipboard-check',  'title' => 'Planejamento Individualizado',    'desc' => 'Cada sorriso é único. O tratamento é desenhado sob medida para os seus objetivos, com clareza em cada passo.'],
    ['icon' => 'sofa',             'title' => 'Ambiente Moderno',                'desc' => 'Um espaço sofisticado, acolhedor e contemporâneo, pensado para o seu conforto do início ao fim.'],
    ['icon' => 'star',             'title' => 'Excelente Avaliação',             'desc' => 'Nota 5,0 no Google com 78 avaliações de pacientes que confiam no cuidado e no resultado.'],
  ],

  // ====== Especialidades (blocos horizontais alternados) ======
  'especialidades' => [
    [
      'key' => 'clareamento', 'icon' => 'sparkles', 'num' => '01',
      'title' => 'Clareamento Dental',
      'img' => 'img/esp-clareamento.svg',
      'desc' => 'Devolvemos o brilho natural ao seu sorriso com protocolos de clareamento seguros e supervisionados, respeitando a sensibilidade e a saúde dos seus dentes.',
      'benef' => ['Sorriso mais branco e uniforme', 'Protocolo seguro e supervisionado', 'Menor sensibilidade', 'Resultado natural e duradouro'],
    ],
    [
      'key' => 'implantes', 'icon' => 'anchor', 'num' => '02',
      'title' => 'Implantes Dentários',
      'img' => 'img/esp-implantes.svg',
      'desc' => 'Reposição de dentes perdidos com implantes planejados para devolver mastigação, fala e estética com firmeza e naturalidade, restaurando a sua confiança.',
      'benef' => ['Solução firme e duradoura', 'Estética e função restauradas', 'Planejamento cuidadoso', 'Conforto no dia a dia'],
    ],
    [
      'key' => 'proteses', 'icon' => 'tooth', 'num' => '03',
      'title' => 'Próteses Dentárias',
      'img' => 'img/esp-proteses.svg',
      'desc' => 'Próteses fixas e removíveis planejadas sob medida para devolver função e naturalidade, com conforto, acabamento delicado e um sorriso harmônico.',
      'benef' => ['Próteses fixas e removíveis', 'Estética natural', 'Ajuste sob medida', 'Conforto ao mastigar e sorrir'],
    ],
    [
      'key' => 'periodontia', 'icon' => 'shield-check', 'num' => '04',
      'title' => 'Periodontia',
      'img' => 'img/esp-periodontia.svg',
      'desc' => 'Cuidado especializado com a saúde das gengivas e dos tecidos de suporte, tratando e prevenindo problemas para uma base sólida e um sorriso saudável.',
      'benef' => ['Gengivas mais saudáveis', 'Tratamento e prevenção', 'Base sólida para o sorriso', 'Acompanhamento próximo'],
    ],
    [
      'key' => 'ortodontia', 'icon' => 'align', 'num' => '05',
      'title' => 'Ortodontia',
      'img' => 'img/esp-ortodontia.svg',
      'desc' => 'Alinhamento dos dentes e equilíbrio da mordida com opções convencionais e estéticas, acompanhadas de perto em cada fase do tratamento.',
      'benef' => ['Alinhamento dos dentes', 'Correção da mordida', 'Opções estéticas', 'Acompanhamento próximo'],
    ],
    [
      'key' => 'cirurgias', 'icon' => 'activity', 'num' => '06',
      'title' => 'Cirurgias Odontológicas',
      'img' => 'img/esp-cirurgias.svg',
      'desc' => 'Procedimentos cirúrgicos conduzidos com técnica, segurança e cuidado, com orientação clara em cada etapa para uma recuperação tranquila.',
      'benef' => ['Técnica e segurança', 'Orientação em cada etapa', 'Ambiente controlado', 'Recuperação orientada'],
    ],
  ],

  // ====== Processo (linha do tempo) ======
  'jornada' => [
    ['n' => '01', 'icon' => 'message-circle',  'title' => 'Contato',      'desc' => 'Você fala com a gente pelo WhatsApp, tira dúvidas e agenda no melhor horário para você.'],
    ['n' => '02', 'icon' => 'stethoscope',     'title' => 'Avaliação',    'desc' => 'Fazemos um exame cuidadoso, ouvindo suas queixas, desejos e objetivos com atenção.'],
    ['n' => '03', 'icon' => 'clipboard-check', 'title' => 'Planejamento', 'desc' => 'Apresentamos um plano claro, sob medida, com prioridades, etapas e orçamento transparente.'],
    ['n' => '04', 'icon' => 'tooth',           'title' => 'Tratamento',   'desc' => 'Conduzimos cada etapa com técnica, delicadeza e o seu conforto sempre em primeiro lugar.'],
    ['n' => '05', 'icon' => 'sparkles',        'title' => 'Novo sorriso', 'desc' => 'Você celebra um sorriso mais bonito, saudável e cheio de confiança para viver sem receios.'],
  ],

  // ====== Galeria (placeholders editáveis) ======
  'galeria' => [
    ['img' => 'img/galeria-recepcao.svg',     'alt' => 'Recepção da Clínica Odontológica Modelo', 'label' => 'Recepção',    'span' => 'lg:col-span-2 lg:row-span-2'],
    ['img' => 'img/galeria-consultorio.svg',  'alt' => 'Consultório moderno',                 'label' => 'Consultórios','span' => ''],
    ['img' => 'img/galeria-equipamentos.svg', 'alt' => 'Equipamentos de última geração',      'label' => 'Equipamentos','span' => ''],
    ['img' => 'img/galeria-equipe.svg',       'alt' => 'Equipe especializada',                'label' => 'Equipe',      'span' => ''],
    ['img' => 'img/galeria-atendimento.svg',  'alt' => 'Atendimento humanizado',              'label' => 'Atendimento', 'span' => ''],
  ],

  // ====== Antes e Depois (placeholders editáveis) ======
  'antes_depois_titulo' => 'Resultados que transformam sorrisos.',
  'antes_depois_sub'    => 'Cada tratamento é planejado individualmente. Em breve, casos reais de pacientes atendidos na clínica.',
  'antes_depois_aviso'  => 'Os resultados variam de acordo com cada paciente, o diagnóstico e o plano de tratamento. As imagens têm caráter ilustrativo.',
  'antes_depois'        => [
    ['antes' => 'img/ad-antes-1.svg', 'depois' => 'img/ad-depois-1.svg', 'label' => 'Clareamento Dental'],
    ['antes' => 'img/ad-antes-2.svg', 'depois' => 'img/ad-depois-2.svg', 'label' => 'Próteses e Estética'],
  ],

  // ====== Depoimentos ======
  'depoimentos' => [
    ['name' => 'Fernanda Lopes',   'role' => 'Clareamento Dental', 'initials' => 'FL', 'text' => 'Clínica impecável do início ao fim. Ambiente sofisticado, atendimento atencioso e um clareamento que ficou lindo e sem sensibilidade. Me sinto muito mais confiante.'],
    ['name' => 'Rafael Menezes',   'role' => 'Implante',           'initials' => 'RM', 'text' => 'Fui muito bem recebido e senti confiança em cada consulta. O implante ficou firme e natural, idêntico aos meus outros dentes. Profissionalismo e humanidade juntos.'],
    ['name' => 'Beatriz Nogueira', 'role' => 'Prótese',            'initials' => 'BN', 'text' => 'Minha prótese ficou muito confortável e natural. Cada detalhe foi pensado com cuidado. Um atendimento de altíssimo nível, do acolhimento ao resultado final.'],
    ['name' => 'Larissa Costa',    'role' => 'Ortodontia',         'initials' => 'LC', 'text' => 'Estou no tratamento ortodôntico e me sinto acolhida em todas as consultas. Equipe atenciosa, pontual e que tira todas as dúvidas. Recomendo de olhos fechados.'],
    ['name' => 'Paulo Andrade',    'role' => 'Odontologia Estética','initials' => 'PA','text' => 'Fizeram um verdadeiro planejamento do meu sorriso. O resultado ficou natural e harmônico, exatamente como eu queria. Estrutura moderna e profissionais excelentes.'],
    ['name' => 'Camila Teixeira',  'role' => 'Periodontia',        'initials' => 'CT', 'text' => 'Sempre tive receio de dentista e aqui isso mudou. Atendimento humano de verdade, sem pressa e muito cuidadoso. Hoje cuido do meu sorriso com tranquilidade.'],
  ],

  // ====== Sobre / Institucional ======
  'sobre_eyebrow' => 'Sobre a Clínica',
  'sobre_titulo'  => 'Uma clínica pensada para transformar sorrisos.',
  'sobre_p1' => 'Na Clínica Odontológica Modelo, cada paciente é único e merece atenção individual. Nosso compromisso é com a qualidade em cada detalhe — do primeiro contato ao resultado final — unindo técnica, tecnologia e sensibilidade em um ambiente moderno e acolhedor.',
  'sobre_p2' => 'O atendimento começa pela escuta: entender a sua história, os seus receios e os seus objetivos para então construir um planejamento personalizado. Tudo com transparência, segurança e foco total na sua satisfação e no seu bem-estar.',
  'sobre_stats' => [
    ['v' => '5,0',  'l' => 'nota no Google'],
    ['v' => '78',   'l' => 'avaliações de pacientes'],
    ['v' => '100%', 'l' => 'foco em você'],
  ],
  'sobre_valores' => [
    'Compromisso com a qualidade',
    'Atendimento personalizado',
    'Tecnologia e planejamento',
    'Foco na satisfação dos pacientes',
  ],

  // ====== CTA final ======
  'cta_titulo' => 'Está na hora de transformar o seu sorriso.',
  'cta_sub'    => 'Agende uma avaliação e conheça o tratamento ideal para você. Fale agora pelo WhatsApp e dê o primeiro passo.',
];
