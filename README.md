# Clínica Odontológica Modelo — Site institucional

Site institucional de alto padrão para a **Clínica Odontológica Modelo** (Cidade Exemplo · UF), especializada em
clareamento dental, próteses dentárias, implantes e odontologia estética. Foco em conversão de
agendamentos via WhatsApp.

## Stack

- **PHP** (renderização de template — sem dependências externas)
- **Tailwind CSS v4** (build estático, sem runtime)
- **Vanilla JS** (header inteligente, menu responsivo, reveal on scroll, scrollspy, slider antes/depois)
- SVG inline (ícones Lucide) e placeholders SVG editáveis

## Edição de conteúdo

**Todo o conteúdo é editável em um único arquivo:** [`config/clinica.php`](config/clinica.php).
Textos, especialidades, diferenciais, depoimentos, dados de contato, SEO e horários ficam ali —
o `index.php` não precisa ser alterado.

As imagens ficam em [`img/`](img/) como placeholders SVG. Basta substituir pelos arquivos reais
mantendo os mesmos nomes (ex.: `hero-sorriso.svg`, `esp-clareamento.svg`, `galeria-recepcao.svg`,
`ad-antes-1.svg` / `ad-depois-1.svg`).

## Desenvolvimento

```bash
npm install
npm run build      # gera css/main.css (minificado)
npm run watch      # rebuild automático durante a edição
```

O CSS compilado (`css/main.css`) já está versionado — só é necessário rodar o build ao alterar
classes no `index.php` ou no `js/app.js`.

## Deploy

### Docker

```bash
docker build -t ic-odontologia .
docker run -p 8080:80 ic-odontologia
```

Acesse http://localhost:8080

### Hospedagem Apache (PHP)

Envie os arquivos para o servidor. O [`.htaccess`](.htaccess) já configura compressão gzip,
cache de estáticos e cabeçalhos de segurança.

## SEO

Title, meta description, Open Graph, Twitter Cards e JSON-LD (Schema.org `Dentist` +
`MedicalBusiness` + `LocalBusiness`) são gerados automaticamente a partir de `config/clinica.php`.
