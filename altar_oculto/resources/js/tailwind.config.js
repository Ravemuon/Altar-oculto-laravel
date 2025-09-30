// CONFIGURAÇÃO DO TAILWIND
module.exports = {
  // ARQUIVOS QUE O TAILWIND VAI ANALISAR
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./storage/framework/views/*.php",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],

  // TEMAS E EXTENSÕES
  theme: {
    extend: {
      fontFamily: {
        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'], // fonte principal
      },
    },
  },

  // PLUGINS ADICIONAIS (nenhum por enquanto)
  plugins: [],
}
